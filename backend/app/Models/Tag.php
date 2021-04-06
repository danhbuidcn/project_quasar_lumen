<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Tag extends Model
{
    public $table = 'tags';
    public $timestamps = true;
    public $guarded = [];

    function listItem($params = [], $options = []) {
        if($options['task'] == 'default') {
            $result = self::paginate();

            return $result;
        }

        if($options['task'] == 'list-all') {
            $result = self::all();

            return $result;
        }

        if($options['task'] == 'cache') {
            $result = self::all();

            return $result;
        }
    }
}
