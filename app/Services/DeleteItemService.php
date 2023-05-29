<?php

namespace App\Services;

use App\Models\PressRelease;
use Dotenv\Util\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeleteItemService
{

    public function delete_item($id, $table, $type = null){

        $item = DB::table($table)->where('id', $id);

        if($type == 'file'){
            // Storage::delete($item->first()->path);
        }
        $deleted = $item->delete();
        return $deleted ? true : false;
    }


    public static function deleteRowFromDb($id, $data, $folder_path = null){

        $dir = Storage::disk('public')->path($folder_path);

        if($data->logo){
            Storage::delete($data->logo);
        }


        if($data->files->count() > 0){
            foreach ($data->files as $key => $value) {
                Storage::delete($value->path);
            }
        }
        if($data->links->count() > 0){
            $data->links()->delete();
            $data->links()->detach();
        }

        if($data->files->count() > 0){
            $data->files()->delete();
            $data->files()->detach();
        }

        if(count(glob("$dir/*")) === 0){
            Storage::disk('public')->deleteDirectory($folder_path);
        }

        $deleted = $data->delete();

        return $deleted ? true : false;
    }

}
