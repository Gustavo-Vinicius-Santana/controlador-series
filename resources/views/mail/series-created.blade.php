@component('mail::message')
    # {{ $nomeSerie }} criada

    A serie {{ $nomeSerie }} com {{ $qtdTemporadas }} temporadas e {{ $episodiosPorTemporada }} episodios por temporada foi criada.

    acesse aqui:

    @component('mail::button', ['url' => route('series.index')])
        Ver serie
    @endcomponent
@endcomponent