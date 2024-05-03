<x-layout title="Séries" mensagem-sucesso="{{ $mensagemSucesso }}">
    <ul class="list-group custom-list">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-item-center">
                @auth
                    <a href="{{ route('seasons.index', $serie->id) }}">
                @endauth
                    {{ $serie->nome}}
                @auth
                    </a>
                @endauth

                @auth
                    <span class="d-flex">
                        <a href="{{ route('series.edit', $serie->id) }}" class="btn btn-primary btn-sm">
                            EDIT
                        </a>

                        <form action="{{ route('series.destroy', $serie->id) }}" method="post" class="ms-2">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"> X </button>
                        </form>
                    </span>
                @endauth
            </li>
        @endforeach
    </ul>
</x-layout>