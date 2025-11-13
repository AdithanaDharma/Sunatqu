<x-layouts.guest :title="__('checkout')">
    @livewire('user.belanja.checkout')

    @push('scripts')
        @if(isset($snapToken))
            <script src="https://app.sandbox.midtrans.com/snap/snap.js"
                data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
            <script type="text/javascript">

                window.onload = function (e) {
                    snap.pay('{{ $snapToken }}', {
                        onSuccess: function (result) {
                            // Redirect setelah sukses

                            window.location.href = "{{ route('home') }}";
                        },
                        onPending: function (result) {
                            // Redirect juga jika pending
                            window.location.href = "{{ route('user.riwayat') }}";

                        },
                        onError: function (result) {
                            alert("Pembayaran gagal. Silakan coba lagi.");
                            window.location.href = "{{ route('belanja') }}";
                        }
                    });
                };
            </script>
        @endif
    @endpush
</x-layouts.guest>