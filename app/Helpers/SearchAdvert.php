<?php namespace App\Helpers;

use App\Helpers\Contracts\SearchAdvertContract;
use App\Models\Advert;
use App\Models\SubjectsPerAdvert;
use Illuminate\Support\Facades\Input;

class SearchAdvert implements SearchAdvertContract
{

    public function search($data)
    {
        $rawResults = null;
        $distances  = null;

        $rawResults = Advert::radiusSearch($data->lat ?? null, $data->lgn ?? null, $data->radius ?? null, $data->sortBy ?? 'distance', $data->gender ?? 'both', $data->subjectId, $data->exceptAdvertIds ?? []);

        $distances  = array_pluck($rawResults, 'distance', 'id');

        return [$rawResults, $distances];
    }

}
