<?php

namespace App\Http\Controllers\API\MapRegion;

use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\MapRegionInfoResource;
use App\Http\Resources\MapRegionResource;
use App\Models\Language;
use App\Models\MapRegion;
use App\Models\MapRegionInfo;
use App\Models\Region;
use Illuminate\Http\Request;

class MapRegionController extends BaseController
{
    public function __construct(Request $request)
    {
        $lng = 'en';

        if($request->lng){
            $lng = $request->lng;
        }

        $lng_id = Language::where('name', $lng)->first()->id;
        $request['lng_id'] = $lng_id;
    }
    public function mapRegionInfo(Request $request,$id){

        // $map_regions = MapRegion::where('id',$request->id)->with('map_region_infos')->first();
        // if($request->type=="region"){
        //     $arr=[];
        //     foreach($map_regions->regions as $data){

        //         array_push($arr,$data->pivot->region_id);
        //     }
        //     $region=Region::whereIn('id',$arr)->get();

        //     return is_null($region) ? $this->sendError('error message'):
        //     $this->sendResponse(MapRegionResource::collection($region), 'success');
        // }

        // if($request->type=="region_info"){

            $map_region_info = MapRegionInfo::where('map_region_id', $id)->first();

            return is_null($map_region_info) ? $this->sendError('error message'):
            $this->sendResponse( new MapRegionInfoResource($map_region_info), 'success');
        // }



    }
    public function regionInfo(Request $request,$id){
        $region=Region::where('id',$id)->first();
        $map_region_id=$region->map_regions[0]->pivot->map_region_id;

        $map_region_info=MapRegionInfo::where('map_region_id',$map_region_id)->first();
        return is_null($map_region_info) ? $this->sendError('error message'):
            $this->sendResponse( new MapRegionInfoResource($map_region_info), 'success');
    }

}
