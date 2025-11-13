<?php

namespace App\Http\Controllers;

use App\Facades\Cart;
use App\Models\alamat;
use App\Models\Order;
use App\Models\order_item;
use App\Models\paket;
use App\Models\Pendaftaran;
use App\Models\TransaksiProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Midtrans\Config;
use Midtrans\Snap;

class TransaksiProdukController extends Controller
{
    //

    public function place_order(request $request)
    {
        $user_id = Auth::user()->id;
        $alamat = alamat::where('user_id', Auth::user()->id)->where('isdefault', true)->first();
        $cart = Cart::get()['produk'];
        // if (!$alamat) {
        //     $request->validate([
        //         'nama' => 'required|max:100',
        //         'nomer' => 'required|numeric',
        //         'provinsi' => 'required',
        //         'kota' => 'required',
        //         'alamat' => 'required',
        //         'patokan' => 'required',
        //     ]);
        //     $alamat = new Alamat();
        //     $alamat->nama = $request->nama;
        //     $alamat->nomer = $request->nomer;
        //     $alamat->provinsi = $request->provinsi;
        //     $alamat->kota = $request->kota;
        //     $alamat->alamat = $request->alamat;
        //     $alamat->patokan = $request->patokan;
        //     $alamat->user_id = $user_id;
        //     $alamat->isdefault = $request->has('isdefault');
        //     $alamat->save();
        // }


        $result = $this->setAmountForCheckout();
        if ($result instanceof \Illuminate\Http\RedirectResponse) {
            return $result;
        }
        
        $order = new Order();
        $order->user_id = $user_id;
        $checkout = session()->get('checkout', []);
        // dd($checkout);
        $order->subtotal = $checkout['subtotal'] ?? 0;
        $order->total = $checkout['total'] ?? 0;
        $order->nama = $alamat->nama;
        $order->nomer = $alamat->nomer;
        $order->alamat = $alamat->alamat;
        $order->kota = $alamat->kota;
        $order->provinsi = $alamat->provinsi;
        $order->patokan = $alamat->patokan;
        $order->save();

        foreach ($cart as $item) {
            $orderItem = new order_item();
            $orderItem->produk_id = $item[0]['id'];
            $orderItem->order_id = $order->id;
            $orderItem->harga = $item[0]['harga'];
            $orderItem->quantity = $item['qty'];
            $orderItem->save();
        }

        if ($request->mode == "transfer") {
            Config::$serverKey = config('midtrans.serverKey');
            Config::$isProduction = config('midtrans.isProduction');
            Config::$isSanitized = true;
            Config::$is3ds = true;
            $payload = [
                'transaction_details' => [
                    'order_id' => $order->id . '-' . time(),
                    'gross_amount' => $order->total,
                ],
                'customer_details' => [
                    'name' => Auth::user()->name  ?? 'nama tidak diketahui ',
                    'phone' => $order->nomer,
                    'email' => Auth::user()->email ?? 'customer@mail.com',
                    // 'first_name' => $pendaftaran->nama_anak ?? 'nama tidak diketahui ',
                    // 'email'      => 'noemail@exemple.com',
                    // 'phone'      => $pendaftaran->no_whatsapp,
                    'billing_address' => [
                        'address' => $alamat->alamat,
                    ],
                ],
                'item_details' => [],
            ];

            foreach ($cart as $id => $item) {
                $payload['item_details'][] = [
                    'id' => $id,
                    'price' => $item[0]['harga'],
                    'quantity' => $item['qty'],
                    'name' => 'Product-' . $id, // Bisa diganti dengan nama produk
                ];
            }
            $snapToken = Snap::getSnapToken($payload);
            $transaction = new TransaksiProduk();
            $transaction->user_id = $user_id;
            $transaction->order_id = $order->id;
            $transaction->mode = $request->mode;
            $transaction->status = "menunggu";
            $transaction->snap_token = $snapToken;
            $transaction->save();
            Cart::clear();
            session::put('order_id', $order->id);
            return view('user.checkout', compact('snapToken', 'alamat','cart'));
        } elseif ($request->mode == "cod") {
            $transaction = new TransaksiProduk();
            $transaction->user_id = $user_id;
            $transaction->order_id = $order->id;
            $transaction->mode = $request->mode;
            $transaction->snap_token = null;
            $transaction->status = "menunggu";
            $transaction->save();
        }
        // session()->forget('cart');
        Cart::clear();
        session()->forget('checkout');
        Session::put('order_id', $order->id);
        return redirect()->route('belanja');
    }

    public function setAmountForCheckout()
    {
        $cart = Cart::get()['produk'];
        if (empty($cart)) {
            session()->forget('checkout');
            return redirect()->back()->with('error', 'Keranjang kosong. Tidak dapat melanjutkan pemesanan.');
        }

        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item[0]['harga'] * $item['qty'];
        }

        // $tax = $subtotal * 0.11; // misal pajak 11%
        $total = $subtotal;

        session()->put('checkout', [
            'subtotal' => $subtotal,
            'total' => $total
        ]);
    }

    // public function bayar(Request $request)
    // {
    //     $data = session('daftar');
    //     $paket_id = $data['paket_id'];
    //     $paket = paket::find($paket_id);
    //     $pendaftaran = new Pendaftaran();
    //     $pendaftaran->nama_anak = $data['nama_anak'];
    //     $pendaftaran->umur = $data['umur'];
    //     $pendaftaran->berat_badan = $data['berat_badan'];
    //     $pendaftaran->nama_orang_tua = $data['nama_orang_tua'];
    //     $pendaftaran->no_whatsapp = $data['no_whatsapp'];
    //     $pendaftaran->alamat = $data['alamat'];
    //     $pendaftaran->jadwal_khitan = $data['jadwal_khitan'];
    //     $pendaftaran->waktu = $data['waktu'];
    //     $pendaftaran->paket_id = $data['paket_id'];
    //     $pendaftaran->save();
    //     if ($request->mode == "transfer") {
    //         if (empty($paket->harga) || (float)$paket->harga <= 0) {
    //             abort(400, 'Harga paket tidak valid');
    //         }
    //         Config::$serverKey = config('midtrans.serverKey');
    //         Config::$isProduction = config('midtrans.isProduction');
    //         Config::$isSanitized = true;
    //         Config::$is3ds = true;
    //         $payload = [
    //             'transaction_details' => [
    //                 'order_id' => $pendaftaran->id . '-' . time(),
    //                 'gross_amount' => (float)$paket->harga,
    //             ],
    //             'customer_details' => [
    //                 'first_name' => $pendaftaran->nama_anak ?? 'nama tidak diketahui ',
    //                 'email'      => 'noemail@exemple.com',
    //                 'phone'      => $pendaftaran->no_whatsapp,
    //                 'billing_address' => [
    //                     'address' => $pendaftaran->alamat,
    //                 ],
    //             ],
    //             'item_details' => [
    //                 [
    //                     'id' => $paket->id,
    //                     'price' => (float)$paket->harga,
    //                     'quantity' => 1,
    //                     'name' => 'Paket Sunat' . $paket->tipe_paket,
    //                 ]
    //             ],
    //         ];
    //         $snapToken = Snap::getSnapToken($payload);
    //         $transaction = new TransaksiProduk();
    //         $transaction->pendaftaran_id = $pendaftaran->id;
    //         $transaction->mode = $request->mode;
    //         $transaction->status = "disetujui";
    //         $transaction->snap_token = $snapToken;
    //         $transaction->save();
    //         session(['pendaftaran' => $pendaftaran]);
    //         return view('chackout-sunat', compact('snapToken', 'data', 'paket'));
    //     } elseif ($request->mode == "cash") {
    //         $transaction = new TransaksiProduk();
    //         $transaction->pendaftaran_id = $pendaftaran->id;
    //         $transaction->mode = $request->mode;
    //         $transaction->status = "menunggu";
    //         $transaction->snap_token = null;
    //         $transaction->save();
    //     }
    //     session(['pendaftaran' => $pendaftaran]);
    //     return redirect()->route('konfirmasi-pendaftaran');
    // }
}
