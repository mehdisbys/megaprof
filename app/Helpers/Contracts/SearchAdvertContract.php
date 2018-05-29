<?php
namespace App\Helpers\Contracts;


use App\Search\SearchArguments;
use Illuminate\Support\Collection;

Interface SearchAdvertContract
{
    public function search(SearchArguments $data, array $exceptAdverts = []);
}
