<x-layout title="Séries" mensagem-sucesso="{{ $mensagemSucesso }}">
    <ul class="list-group custom-list">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between justify-content-center  align-item-center">
                <div class="d-flex flex-row justify-content-between align-items-center">
                    <img src="{{ asset('storage/' . $serie->cover_path) }}" class="img-fluid" width="50" alt=""/>

                    @auth
                        <a href="{{ route('seasons.index', $serie->id) }}">
                    @endauth
                        {{ $serie->nome}}
                    @auth
                        </a>
                    @endauth
                </div>


                @auth
                    <span class="d-flex pt-2">
                        <div>
                            <a href="{{ route('series.edit', $serie->id) }}" class="btn btn-primary btn-sm">
                                EDIT
                            </a>
                        </div>

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