<x-layout title="Nova serie">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('series.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 text-center">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome da série" value="{{ old('nome') }}">
                </div>

                <div class="mb-3 text-center">
                    <label for="cover" class="form-label">Capa</label>
                    <input type="file" class="form-control" id="cover" name="cover" accept="image/*">
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3 text-center">
                        <label for="seasonQty" class="form-label">Temporadas</label>
                        <input type="text" class="form-control" id="seasonQty" name="seasonQty" placeholder="Digite o número de temporadas" value="{{ old('seasonQty') }}">
                    </div>
                    <div class="col-md-6 mb-3 text-center">
                        <label for="episodesPerSeason" class="form-label">Episódios</label>
                        <input type="text" class="form-control" id="episodesPerSeason" name="episodesPerSeason" placeholder="Digite o número de episódios" value="{{ old('episodesPerSeason') }}">
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>