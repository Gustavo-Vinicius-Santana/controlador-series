<x-layout title="Episodios" mensagem-sucesso="{{ $mensagemSucesso }}">

    <form method="post">
        @csrf
        <ul class="list-group custom-list">
            @foreach ($episodes as $episode)
                <li class="list-group-item d-flex justify-content-between align-item-center">
                    Episodio {{ $episode->number}}

                    <input type="checkbox" name="episodes[]" value="{{ $episode->id }}"
                    @if($episode->watched) checked @endif
                    />
                </li>
            @endforeach
        </ul>

        <div class="d-flex justify-content-center">
            <button class="btn btn-primary btn-lg mt-2 mb-2 col-2">Salvar</button>
        </div>
    </form>

</x-layout>