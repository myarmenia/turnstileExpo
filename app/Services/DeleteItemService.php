<?php

namespace App\Services;

use Dotenv\Util\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeleteItemService
{

    public function delete_item($id, $table, $type = null){
        $item = DB::table($table)->where('id', $id);

        if($type == 'file'){
            Storage::delete($item->first()->path);
        }
        $deleted = $item->delete();
        return $deleted ? true : false;
    }

}
