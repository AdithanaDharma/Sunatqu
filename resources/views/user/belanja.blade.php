<x-layouts.guest :title="__('Belanja')">
    {{-- <div x-data="{ show: false, message: '' }" x-on:toast.window="
        show = true;
        message = $event.detail.message;
        setTimeout(() => show = false, 2500);
     " x-show="show" x-transition:enter="transition ease-out duration-400"
        x-transition:enter-start="opacity-0 translate-y-3 scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 translate-y-3 scale-95" class="fixed bottom-10 left-1/2 -translate-x-1/2 z-50 flex items-center gap-2 
     backdrop-blur-xl bg-white/70 border border-white/40 
     shadow-[0_4px_20px_rgba(0,0,0,0.10)] 
     px-5 py-3 rounded-2xl text-gray-800 font-medium text-sm" style="min-width: 240px; max-width: 90%;">

        <div class="text-green-600 text-lg">✔️</div>
        <div x-text="message"></div>
    </div> --}}


    @livewire('user.belanja.index')
    @push('scripts')
        {{--
        <script defer src="//unpkg.com/alpinejs"></script> --}}
        {{--
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

        {{-- <script>
            document.addEventListener('livewire:load', () => {
                Livewire.on('toast', message => {
                    window.dispatchEvent(new CustomEvent('toast', { detail: { message } }));
                });
            });
        </script> --}}
    @endpush
</x-layouts.guest>