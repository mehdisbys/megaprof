<?php namespace App\Helpers;

use App\Helpers\Contracts\SearchAdvertContract;
use App\Models\Advert;
use App\Models\SubjectsPerAdvert;
use Illuminate\Support\Facades\Input;

class SearchAdvert implements SearchAdvertContract
{

    public function search(\stdClass $data)
    {
        $rawResults = null;
        $distances  = null;

        if (isset($data->subjectId) and !empty($data->subjectId)) {
            $advert_ids = SubjectsPerAdvert::getAllAdvertIdsForSubject($data->subjectId);
            $rawResults = Advert::searchAdvertIdsByGender($advert_ids, $data->gender ?? 'both');
            $advert_ids = array_pluck($rawResults, 'id');
            $byLocation = $data->lgn ?? null;

            if ($byLocation) {
                $rawResults = Advert::radiusSearch($advert_ids, $data->lat, $data->lgn, $data->radius ?? null, $data->sortBy ?? 'distance');
                $distances  = array_pluck($rawResults, 'distance', 'id');
            }

            return [$rawResults, $distances];
        }
        return [null, null];
    }
}
