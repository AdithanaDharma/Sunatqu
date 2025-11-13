


<x-layouts.app :title="__('Admin Produk')">
    {{-- @livewire('admin.produk.update') --}}
    @livewire('admin.produk.update',['produk'=>$produk])


</x-layouts.app>