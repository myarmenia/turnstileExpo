<?php

namespace App\Services;

use Dotenv\Util\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChangeStatusService
{

    public function change_status($id, $table, $status){
        $item = DB::table($table)->where('id', $id);

        if($status == 'delete'){
            // Storage::delete($item->first()->path); der parz chi
        }
        $update = $item->update(['status' => $status]);
        return $update ? back() : false;
    }

}
