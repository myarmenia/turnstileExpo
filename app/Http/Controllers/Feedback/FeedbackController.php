<?php

namespace App\Http\Controllers\Feedback;

use App\Http\Controllers\Controller;
use App\Mail\FeedbackMail;
use App\Models\Feedbacks;
use App\Models\User;
use App\Notifications\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $started_status = '';
        $user_role_status = Auth::user()->isAdmin();

        if (!$user_role_status) {
            $started_status = 'draft';
        }

        $feedbacks = Feedbacks::where('status', '!=', $started_status)->OrderBy('id', 'desc');

        if ($request->full_name) {
            $feedbacks = $feedbacks->where('full_name', 'like', '%' . $request->full_name . '%');
        }

        if ($request->email) {
            $feedbacks = $feedbacks->where('email', $request->email);
        }

        if ($request->type) {
            $feedbacks = $feedbacks->where('type', $request->type);
        }

        if ($request->status) {
            $feedbacks = $feedbacks->where('status', $request->status);
        }

        $feedbacks = $feedbacks->paginate(6);

        return view("feedback.index", compact('feedbacks'))->with('i', ($request->input('page', 1) - 1) * 6);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feedback = Feedbacks::where('id', $id)->first();

        if ($feedback->status == 'new') {
            $feedback->update(['status' => 'read']);
        }

        return view("feedback.read", compact('feedback'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validate = [
            "answer_content" => "required",
        ];

        $validator = Validator::make($request->all(), $validate);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $user_role_status = Auth::user()->isAdmin();

        $feedback = Feedbacks::find($id);

        $editor_id = 0;

        if ($user_role_status) {

            if ($feedback->editor_id != null) {
                $editor_id = $feedback->editor_id;
            } else {
                $editor_id = Auth::id();
            }

            $feedback_updated = $feedback->update([
                'editor_id' => $editor_id,
                'answer_content' => $request->answer_content,
                'status' => 'answerd'
            ]);

            if ($feedback_updated) {
                Mail::to('kirakosyan.suren@inbox.ru')->send(new FeedbackMail($feedback->type, $request->answer_content));
            }
        } else {
            $feedback->update([
                'editor_id' => Auth::id(),
                'answer_content' => $request->answer_content,
                'status' => 'draft'
            ]);
        }

        return redirect('feedback');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
