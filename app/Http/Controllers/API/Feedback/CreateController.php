<?php

namespace App\Http\Controllers\API\Feedback;

use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\FeedbackRequest;
use App\Models\Feedbacks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CreateController extends BaseController
{
    public function index(Request $request)
    {
        $validate = [
            "full_name" => "required",
            "email" => "required|email",
            "type" => "required",
            "content" => "required|min:20",
        ];

        $validator = Validator::make($request->all(), $validate);

        if ($validator->fails()) {
            return $this->sendError('error message', $validator->errors());
        }

        $feedback = Feedbacks::create($request->all());

    }
}
