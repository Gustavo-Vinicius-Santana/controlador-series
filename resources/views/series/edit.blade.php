<x-layout title="Editar serie {!! $series->nome !!}">
    <div class="container custom-container w-50 mx-auto">
        <x-series.form action="{{ route('series.update', $series) }}"
        nome="{{ $series->nome }}" id="{{ $series->id }}"/>
    </div>

</x-layout>