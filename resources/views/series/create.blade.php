<x-layout title="Nova serie">
    <div class="container custom-container w-50 mx-auto">
        <x-series.form action="{{ route('series.store')}}" nome="{{ old('nome') }}"/>
    </div>

</x-layout>