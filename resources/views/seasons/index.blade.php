<x-layout title="temporadas de {!! $series->nome !!}">

    <div class="d-flex justify-content-center">
        <img src="{{ asset('storage/' . $series->cover_path) }}" alt="capa da serie" class="img-fluid" width="400" />
    </div>

    <ul class="list-group custom-list">
        @foreach ($seasons as $season)
            <li class="list-group-item d-flex justify-content-between align-item-center">
                <a href="{{ route('episodes.index', $season->id) }}">
                    temporada {{ $season->number}}
                </a>

                <span class="badge bg-dark text-white">
                    Episodios:
                    {{ $season->numberOfWatchedEpisodes()}} / {{$season->episodes->count() }}
                </span>

            </li>
        @endforeach
    </ul>

</x-layout>