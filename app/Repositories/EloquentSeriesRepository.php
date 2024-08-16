<?php

namespace app\Repositories;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SeriesFormRequest;
use App\Repositories\SeriesRepository;
use App\Models\Episodes;
use App\Models\Season;
use App\Models\Serie;

class EloquentSeriesRepository implements SeriesRepository
{
    public function add(SeriesFormRequest $request): Serie{
        return $serie = DB::transaction(function() use ($request){
            $serie = Serie::create([
                'nome' => $request->nome,
                'cover_path' => $request->coverPath
            ]);
            $seasons = [];
            $episodes = [];

            for($i = 1; $i <= $request->seasonQty; $i ++){
                $seasons[] = [
                    'series_id' => $serie->id,
                    'number' => $i,
                ];
            }
            Season::insert($seasons);

            foreach($serie->seasons as $season){
                for($j = 1; $j <= $request->episodesPerSeason; $j++){
                    $episodes[] = [
                        'season_id' => $season->id,
                        'number' => $j,
                    ];
                }
            }
            Episodes::insert($episodes);

            return $serie;
        });

    }
}