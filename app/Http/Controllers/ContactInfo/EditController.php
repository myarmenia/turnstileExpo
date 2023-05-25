<?php

namespace App\Http\Controllers\ContactInfo;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use App\Models\ContactInfoLinks;
use App\Services\DeleteItemService;
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

        $contact_info = ContactInfo::find($id);

        $delete_image = $contact_info->map_image;

        $requestData = $request->all();

        $validate = [
            "email" => "required|email",
            "address.*" => "required",
            "phone" => "required",
            "links.*.logo" => "required",
            "links.*.link" => "required",
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

        $contact_info->update($requestData);

        foreach ($request->address as $key => $item) {

            $contact_info_translations = $contact_info->contact_info_translations;
            $contact_info_translations = $contact_info_translations->where('language_id', $key)->first();

            $contact_info_translations->update([
                'address' => $item
            ]);
        }

        $current_contact_links = ContactInfoLinks::all();

        if ($current_contact_links != null) {
            foreach ($current_contact_links as $item) {
                $delete_contact_links = ContactInfoLinks::find($item->id);

                $delete_contact_links->delete();
                $item->logo != null ? Storage::delete($item->logo) : null;
            }
        }

        foreach ($request['links'] as $item) {

            $f_extension = $item['logo']->getClientOriginalExtension();
            $f_path = FileUploadService::upload($item['logo'], 'contact-info-links/' . $contact_info->id);

            ContactInfoLinks::create([
                'contact_info_id' => $contact_info->id,
                'logo' => $f_path,
                'link' => $item['link']
            ]);
        }

        return redirect()->back();
    }
}
