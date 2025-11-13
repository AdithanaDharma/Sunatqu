<?php

namespace App\Http\Controllers;

use App\Models\paket;
use App\Models\Pendaftaran;
use App\Models\Transaksi_sunat;
use Illuminate\Http\Request;
use Livewire\Attributes\Validate;
use Midtrans\Config;
use Midtrans\Snap;
use PhpParser\Node\Expr\New_;
use Symfony\Contracts\Service\Attribute\Required;
use Termwind\Components\Dd;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('daftar');
    }
    public function paketview()
    {
        $data = session('daftar');
        if (!empty($data)){
            $paket = paket::all();
            return view('paket', compact('paket'));
        }
        return redirect()->route('daftar-sunat')->with('error','silahkan isi data pendaftaran');
    }
    public function chackout_sunat()
    {
        $data = session('daftar');
        $paket_id = $data['paket_id'];
        $paket = paket::find($paket_id);
        return view('chackout-sunat', compact('data', 'paket'));
    }
    public function konfirmasi_pendaftaran()
    {
        $data = session('pendaftaran');
        if (!empty($data)) {
            session()->forget('daftar');
            $pendaftaran_id = $data['id'];
            $paket_id = $data['paket_id'];
            $paket = paket::find($paket_id);
            $pendaftaran = Pendaftaran::find($pendaftaran_id);
            $transaction = Transaksi_sunat::where('pendaftaran_id', $pendaftaran_id)->first();
            // dd($transaction, $pendaftaran, $paket);
            return view('konfirmasi-pendaftaran', compact('pendaftaran', 'paket', 'transaction'));
        }
        return redirect()->route('daftar-sunat');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function daftar(Request $request)
    {

        $data = $request->validate([
            'nama_anak' => 'required|string|max:255',
            'umur' => 'required|integer|min:0',
            'berat_badan' => 'nullable|numeric|min:0',
            'nama_orang_tua' => 'required|string|max:255',
            'no_whatsapp' => [
                'required',
                'regex:/^(\+62|62|0)8[1-9][0-9]{6,12}$/'
            ],
            'alamat' => 'required|string',
            'jadwal_khitan' => 'required|date|after_or_equal:today',
            'waktu' => 'required|date_format:H:i',
            // 'paket_id' => 'required|exists:pakets,id',
        ]);
        session(['daftar' => $data]);
        return redirect()->route('paket')->with('success', 'data berhasil ditamabah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function pilih_paket(Request $request)
    {
        $request->validate([
            'paket_id' => 'required|integer|exists:pakets,id'
        ]);
        $data = session('daftar');
        $data['paket_id'] = $request->paket_id;
        session(['daftar' => $data]);
        return redirect()->route('chackout-sunat');
    }
    public function bayar(Request $request)
    {
        $data = session('daftar');
        $paket_id = $data['paket_id'];
        $paket = paket::find($paket_id);
        $pendaftaran = new Pendaftaran();
        $pendaftaran->nama_anak = $data['nama_anak'];
        $pendaftaran->umur = $data['umur'];
        $pendaftaran->berat_badan = $data['berat_badan'];
        $pendaftaran->nama_orang_tua = $data['nama_orang_tua'];
        $pendaftaran->no_whatsapp = $data['no_whatsapp'];
        $pendaftaran->alamat = $data['alamat'];
        $pendaftaran->jadwal_khitan = $data['jadwal_khitan'];
        $pendaftaran->waktu = $data['waktu'];
        $pendaftaran->paket_id = $data['paket_id'];
        $pendaftaran->save();
        if ($request->mode == "transfer") {
            if (empty($paket->harga) || (float)$paket->harga <= 0) {
                abort(400, 'Harga paket tidak valid');
            }
            Config::$serverKey = config('midtrans.serverKey');
            Config::$isProduction = config('midtrans.isProduction');
            Config::$isSanitized = true;
            Config::$is3ds = true;
            $payload = [
                'transaction_details' => [
                    'order_id' => $pendaftaran->id . '-' . time(),
                    'gross_amount' => (float)$paket->harga,
                ],
                'customer_details' => [
                    'first_name' => $pendaftaran->nama_anak ?? 'nama tidak diketahui ',
                    'email'      => 'noemail@exemple.com',
                    'phone'      => $pendaftaran->no_whatsapp,
                    'billing_address' => [
                        'address' => $pendaftaran->alamat,
                    ],
                ],
                'item_details' => [
                    [
                        'id' => $paket->id,
                        'price' => (float)$paket->harga,
                        'quantity' => 1,
                        'name' => 'Paket Sunat' . $paket->tipe_paket,
                    ]
                ],
            ];
            $snapToken = Snap::getSnapToken($payload);
            $transaction = new Transaksi_sunat();
            $transaction->pendaftaran_id = $pendaftaran->id;
            $transaction->mode = $request->mode;
            // $transaction->status = "disetujui";
            $transaction->snap_token = $snapToken;
            $transaction->save();
            session(['pendaftaran' => $pendaftaran]);
            return view('chackout-sunat', compact('snapToken', 'data', 'paket'));
        } elseif ($request->mode == "cash") {
            $transaction = new Transaksi_sunat();
            $transaction->pendaftaran_id = $pendaftaran->id;
            $transaction->mode = $request->mode;
            $transaction->status = "menunggu";
            $transaction->snap_token = null;
            $transaction->save();
        }
        session(['pendaftaran' => $pendaftaran]);
        return redirect()->route('konfirmasi-pendaftaran');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pendaftaran $pendaftaran)
    {
        //
    }
}
