<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function showForm()
    {
        return view('feedback');
    }

    public function submitForm(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
            'rate' => 'required|integer|between:1,5',
        ]);

        mail(
            'dmytro@gmail.com',
            'New Feedback',
            "Name: {$validated['name']}\nMessage: {$validated['message']}\nRating: {$validated['rate']}"
        );


        return redirect()->route('feedback.form')->with([
            'success' => 'Your feedback has been submitted successfully!',
        ]);
    }
}