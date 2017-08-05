<?php


namespace App\Search;


use App\Helpers\Contracts\SearchAdvertContract;
use App\Models\Advert;

class Search implements SearchAdvertContract
{

    public function search($data)
    {
        $rawResults = null;
        $distances  = null;

        $rawResults = Advert::radiusSearchRefactor($data->getLat() ?? null, $data->getLgn() ?? null, $data->getRadius() ?? null, $data->getSortBy() ?? 'distance', $data->getGender() ?? 'both', $data->getSubjectId(), []);

        $distances  = array_pluck($rawResults, 'distance', 'id');

        return [$rawResults, $distances];
    }

}