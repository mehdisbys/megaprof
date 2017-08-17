<?php
namespace App\Helpers\Contracts;


use App\Search\SearchArguments;

Interface SearchAdvertContract
{
    public function search(SearchArguments $data, array $exceptAdverts = []);
}
