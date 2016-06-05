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
            $byLocation = $data->lgn ?? null;

            if ($byLocation) {
                $rawResults = Advert::radiusSearch($advert_ids, $data->lat, $data->lgn, $data->radius);
                $distances  = array_pluck($rawResults, 'distance', 'id');
            }

            return [$rawResults, $distances];
        }
        return [null, null];
    }

    public function dataFromInput()
    {
        $data               = new \stdClass();
        $data->type         = Input::get('type');
        $data->time         = Input::get('time');
        $data->keywords     = Input::get('keywords');
        $data->location     = Input::get('location');
        $data->company      = Input::get('company');
        $data->industry     = $this->__ifNotArrayMakeArray(Input::get('industry'));
        $data->experience   = $this->__ifNotArrayMakeArray(Input::get('experience'));
        $data->education    = $this->__ifNotArrayMakeArray(Input::get('education'));
        $data->inputChecked = ['industry' => $data->industry, 'experience' => $data->experience, 'education' => $data->education];

        return $data;
    }

    public function dataFromInputDecorated()
    {
        $data = $this->dataFromInput();

        $data->includeAlreadyApplied = Input::has('alreadyApplied');

        return $data;

    }

    private function __ifNotArrayMakeArray($value)
    {
        if (is_array($value)) return $value;

        if (is_numeric($value)) return [$value];

        if (empty($value)) return [];

        throw new \InvalidArgumentException("value '$value' should be an integer.");
    }

}
