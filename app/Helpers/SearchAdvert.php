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

        $advert_ids = $this->getRelevantAdvertIds($data);

        if (isset($data->exceptAdvertIds) and count($advert_ids) > 0) {

            $advert_ids = array_where($advert_ids, function ($key, $value) use ($data) {
                return in_array($value, $data->exceptAdvertIds) == false;
            });
        }

        $rawResults = Advert::radiusSearch($advert_ids, $data->lat, $data->lgn, $data->radius ?? null, $data->sortBy ?? 'distance', $data->gender ?? 'both');
        $distances  = array_pluck($rawResults, 'distance', 'id');

        return [$rawResults, $distances];
    }

    private function getRelevantAdvertIds(\stdClass $data)
    {
        if (isset($data->subjectId) and !empty($data->subjectId)) {
            return $this->selectAdvertsForSubject($data->subjectId);
        }

        if (isset($data->selectedSubject)) {
            return $this->doFullTextSearchOnAdverts($data->selectedSubject);
        }

        return [];
    }

    private function selectAdvertsForSubject(int $subjectId): array
    {
        return SubjectsPerAdvert::getAllAdvertIdsForSubject($subjectId);
    }

    private function doFullTextSearchOnAdverts(string $keyword): array
    {
        return Advert::fullTextSearch(strtolower($keyword));
    }
}
