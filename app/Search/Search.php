<?php


namespace App\Search;


use App\Events\UserDidASearch;
use App\Helpers\Contracts\SearchAdvertContract;
use App\Models\Advert;

class Search implements SearchAdvertContract
{

    public function search(SearchArguments $data, array $exceptAdverts = [])
    {
        $rawResults = null;
        $distances  = null;

        $rawResults = Advert::radiusSearch($data->getLat() ?? null, $data->getLgn() ?? null, $data->getRadius() ?? null, $data->getSortBy() ?? 'distance', $data->getGender() ?? 'both', $data->getSubjectId(), $exceptAdverts);

        $distances  = array_pluck($rawResults, 'distance', 'id');

        event(new UserDidASearch(count($rawResults), $data->getSubjectId(), $data->getSubjectName(), $data->getCity()));

        return [$rawResults, $distances];
    }

}