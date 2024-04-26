<x-layout title="Séries">
    @isset($mensagemSucesso)
    <div class="alert alert-success">
        {{ $mensagemSucesso }}
    </div>
    @endisset
    <ul class="list-group custom-list">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-item-center">
                {{ $serie->nome}}

                <form action="{{ route('series.destroy', $serie->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"> X </button>
                </form>

            </li>
        @endforeach
    </ul>
</x-layout>