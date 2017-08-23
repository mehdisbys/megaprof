<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class SearchResults extends Model
{
    protected $table = 'search_results_table';

    protected $guarded = ['id'];

    private static $recordSearches = true;

    public static function disableRecording()
    {
        self::$recordSearches = false;
    }

    public static function enableRecording()
    {
        self::$recordSearches = true;
    }

    public static function shouldRecord() : bool
    {
        return self::$recordSearches;
    }
}