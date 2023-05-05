<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DeleteItemController extends Controller
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
