<form action="{{ $action }}" method="post">
    @csrf
    @isset($nome)
        @method('PUT')
    @endisset
    <div class="mb-3">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome da serie"
        @isset($nome) value="{{ $nome }}" @endisset>
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>