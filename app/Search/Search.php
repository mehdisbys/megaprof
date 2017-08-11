<?php


namespace App\Search;


use App\Helpers\Contracts\SearchAdvertContract;
use App\Models\Advert;

class Search implements SearchAdvertContract
{

    public function search($data, array $exceptAdverts = [])
    {
        $rawResults = null;
        $distances  = null;

        $rawResults = Advert::radiusSearch($data->getLat() ?? null, $data->getLgn() ?? null, $data->getRadius() ?? null, $data->getSortBy() ?? 'distance', $data->getGender() ?? 'both', $data->getSubjectId(), $exceptAdverts);

        $distances  = array_pluck($rawResults, 'distance', 'id');

        return [$rawResults, $distances];
    }

}