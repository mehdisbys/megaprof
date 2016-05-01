<?php namespace App\Helpers;

use App\Helpers\Contracts\SearchAdvertContract;
use App\Models\Advert;
use App\Models\SubjectsPerAdvert;
use Illuminate\Support\Facades\Input;

class SearchAdvert implements SearchAdvertContract
{

    public function search(\stdClass $data)
    {
        $subjects = new SubjectsPerAdvert();

        if (isset($data->subject) and !empty($data->subject)) {
            $advert_ids = $subjects->where('subject_id', $data->subject)->get()->pluck('advert_id')->toArray();
            $results    = Advert::whereIn('id', $advert_ids);

            $byLocation = $data->lgn ?? null;

            if ($byLocation) {
                $results = Advert::radiusSearch($advert_ids, $data->lat, $data->lgn, $data->radius ?? 10);
                $advert_ids = array_pluck($results, 'id');
                $results = Advert::whereIn('id', $advert_ids);
            }

            return $results;
        }

        return null;
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
