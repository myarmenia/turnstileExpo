<?php

namespace App\Http\Controllers\ContactInfo;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use App\Services\FileUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EditController extends Controller
{
    public function edit()
    {
        $contact_info = ContactInfo::first();

        // dd($contact_info);
        return view('contact-info.edit', compact('contact_info'));
    }

    public function update($id, Request $request)
    {

        dd($request->aLL());

        $contact_info = ContactInfo::find($id);

        $delete_image = $contact_info->map_image;

        $requestData = $request->all();

        $validate = [
            "email" => "required|email",
            "address.*" => "required",
            "phone" => "required",
        ];

        if ($request->map_iframe == null && $request->map_image == null) {
            if ($contact_info->map_image == null) {
                $validate['map_iframe_image'] = 'required';
            }
        }

        $validator = Validator::make($request->all(), $validate);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->map_image) {

            $delete_image != null ? Storage::delete($delete_image) : null;

            $f_extension = $request->map_image->getClientOriginalExtension();
            $f_path = FileUploadService::upload($request->map_image, 'contact-info/' . $contact_info->id);

            unset($requestData['map_image']);
            $requestData['map_image'] = $f_path;
        }


        // dd($requestData);

        $contact_info->update($requestData);

        foreach ($request->address as $key => $item) {

            $contact_info_translations = $contact_info->contact_info_translations;
            $contact_info_translations = $contact_info_translations->where('language_id', $key)->first();

            $contact_info_translations->update([
                'address' => $item
            ]);
        }

        return redirect()->back();
    }
}
