<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Comment;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    public function welcome()
    {
        $events = Event::orderBy('dateTime', 'desc')->limit(6)->get();
        $feedbacks = Comment::orderBy('created_at', 'desc')->get();
        
        return view('welcome', compact('events', 'feedbacks'));
    }

    public function feedback(Request $request)
    {
        Validator::make($request->all(),[
            'name' => 'required',
            'text' => 'required',
        ])->validate();

        $feedback = new Comment();

        $feedback->name = $request->input('name');
        $feedback->text = $request->input('text');

        $feedback->save();

        return redirect()->route('/');
    }

    public function deletefeed($id)
    {
        $feedback = Comment::where('id', $id)->first();
        $feedback->delete();

        return redirect()->route('/'); 
    }
}
