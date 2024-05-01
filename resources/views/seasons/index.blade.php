<x-layout title="temporadas de {!! $series->nome !!}">
    <ul class="list-group custom-list">
        @foreach ($seasons as $season)
            <li class="list-group-item d-flex justify-content-between align-item-center">
                <a href="{{ route('episodes.index', $season->id) }}">
                    temporada {{ $season->number}}
                </a>

                <span class="badge bg-dark text-white">
                    Episodios: {{ $season->episodes->count() }}
                </span>

            </li>
        @endforeach
    </ul>

</x-layout>