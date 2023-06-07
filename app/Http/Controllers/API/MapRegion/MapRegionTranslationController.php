<?php

namespace App\Http\Controllers\API\MapRegion;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\MapRegionTranslation;
use Illuminate\Http\Request;

class MapRegionTranslationController extends Controller
{
    public function __construct(Request $request)
    {
        $lng = 'en';

        if ($request->lng) {
            $lng = $request->lng;
        }

        $lng_id = Language::where('name', $lng)->first()->id;
        $request['lng_id'] = $lng_id;
    }

    public function index(Request $request)
    {        
        $data = [
            [
                "id" => 1,
                "width" => "30.48px",
                "height" => "50.21px",
                "left" => "235.67px",
                "top" => "146.97px",
            ],

            [
                "id" => 2,
                "width" => "22.77px",
                "height" => "22.55px",
                "left" => "242.13px",
                "top" => "119.47px",
            ],

            [
                "id" => 3,
                "width" => "44.62px",
                "height" => "48.22px",
                "left" => "679.26px",
                "top" => "139.88px",
            ],

            [
                "id" => 4,
                "width" => "82.09px",
                "height" => "40.59px",
                "left" => "788.98px",
                "top" => "153.07px",
            ],

            [
                "id" => 5,
                "width" => "72.3px",
                "height" => "60.29px",
                "left" => "1095.46px",
                "top" => "97.15px",
            ],

            [
                "id" => 6,
                "width" => "66.68px",
                "height" => "47.41px",
                "left" => "817.46px",
                "top" => "193.66px",
            ],
            
            [
                "id" => 7,
                "width" => "54.56px",
                "height" => "48.79px",
                "left" => "1106.42px",
                "top" => "163.18px",
            ],

            [
                "id" => 8,
                "width" => "29.28px",
                "height" => "63.09px",
                "left" => "986.43px",
                "top" => "269.28px",
            ],

            [
                "id" => 9,
                "width" => "21.91px",
                "height" => "24.51px",
                "left" => "1084.5px",
                "top" => "225.28px",
            ],

            [
                "id" => 10,
                "width" => "86.05px",
                "height" => "54.17px",
                "left" => "586.14px",
                "top" => "151.16px",
            ],

            [
                "id" => 11,
                "width" => "38.99px",
                "height" => "27.18px",
                "left" => "1012.91px",
                "top" => "331.37px",
            ],

            [
                "id" => 12,
                "width" => "38.99px",
                "height" => "17.71px",
                "left" => "1046.05px",
                "top" => "360.88px",
            ],

            [
                "id" => 13,
                "width" => "23.42px",
                "height" => "36.94px",
                "left" => "770.07px",
                "top" => "393.72px",
            ],

            [
                "id" => 14,
                "width" => "34.75px",
                "height" => "17.4px",
                "left" => "1129.02px",
                "top" => "73.75px",
            ],

            [
                "id" => 15,
                "width" => "39.66px",
                "height" => "24.56px",
                "left" => "765.58px",
                "top" => "134.95px",
            ],
          
            [
                "id" => 16,
                "width" => "30.34px",
                "height" => "48.12px",
                "left" => "890.04px",
                "top" => "190.47px",
            ],

            [
                "id" => 17,
                "width" => "105.58px",
                "height" => "67.06px",
                "left" => "926.27px",
                "top" => "171.53px",
            ],
            
            [
                "id" => 18,
                "width" => "52.39px",
                "height" => "37.19px",
                "left" => "974.45px",
                "top" => "225.28px",
            ],

            [
                "id" => 19,
                "width" => "37.57px",
                "height" => "37.79px",
                "left" => "1041.98px",
                "top" => "161.77px",
            ],

            [
                "id" => 20,
                "width" => "27px",
                "height" => "35.35px",
                "left" => "763.49p",
                "top" => "197.12px",
            ],

            [
                "id" => 21,
                "width" => "36.17px",
                "height" => "33.34px",
                "left" => "335.92px",
                "top" => "166.52px",
            ],

            [
                "id" => 22,
                "width" => "14.06px",
                "height" => "14.38px",
                "left" => "740.38px",
                "top" => "141.52px",
            ],

            [
                "id" => 23,
                "width" => "37.33px",
                "height" => "19.21px",
                "left" => "377.04px",
                "top" => "247.16px",
            ],

            [
                "id" => 24,
                "width" => "47.05px",
                "height" => "36.94px",
                "left" => "754.53px",
                "top" => "349.26px",
            ],

            [
                "id" => 25,
                "width" => "44px",
                "height" => "115.43px",
                "left" => "398.03p",
                "top" => "407.4px",
            ],
          
            [
                "id" => 26,
                "width" => "17.34px",
                "height" => "19.21px",
                "left" => "420.32px",
                "top" => "247.16px",
            ],

            [
                "id" => 27,
                "width" => "27.9px",
                "height" => "40.09px",
                "left" => "247.66px",
                "top" => "202.13px",
            ],
            
            [
                "id" => 28,
                "width" => "38.16px",
                "height" => "18.46px",
                "left" => "333.93px",
                "top" => "257.14px",
            ],

            [
                "id" => 29,
                "width" => "64.03px",
                "height" => "52.52px",
                "left" => "354.56px",
                "top" => "349.72px",
            ],

            [
                "id" => 30,
                "width" => "48.2px",
                "height" => "31.04px",
                "left" => "270.37px",
                "top" => "246.06px",
            ],

            [
                "id" => 31,
                "width" => "44.07px",
                "height" => "36.02px",
                "left" => "876.31px",
                "top" => "148.23px",
            ],

            [
                "id" => 32,
                "width" => "48.33px",
                "height" => "48.55px",
                "left" => "926.27px",
                "top" => "116.04px",
            ],

            [
                "id" => 33,
                "width" => "48.56px",
                "height" => "48.17px",
                "left" => "981.03px",
                "top" => "88.76px",
            ],

            [
                "id" => 34,
                "width" => "24.31px",
                "height" => "15.5px",
                "left" => "1036.02px",
                "top" => "105.86px",
            ],
          
            [
                "id" => 35,
                "width" => "50.98px",
                "height" => "20.94px",
                "left" => "730.94px",
                "top" => "167.15px",
            ],
           
            [
                "id" => 36,
                "width" => "40px",
                "height" => "58px",
                "left" => "1088.7px",
                "top" => "254.78px",
            ],
            
            [
                "id" => 37,
                "width" => "76px",
                "height" => "60px",
                "left" => "1200.7px",
                "top" => "475.78px",
            ],
           
       
        ];

        $map_region_info_translations = MapRegionTranslation::where('language_id', $request->lng_id)->get();

        foreach ($data as $key => $el) {
            $data[$key]['title'] = $map_region_info_translations[$key]->title;
        }

        return response()->json($data, 200);
    }
}
