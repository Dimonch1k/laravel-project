<?php

namespace App\Http\Controllers;

use App\Models\MyFeedback;
use Illuminate\Http\Request;

class MyFeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $myFeedbacks = MyFeedback::all();
        return view('admin.myFeedbacks.index', compact('myFeedbacks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.myFeedbacks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'sender_name' => 'required|string|max:255',
            'sender_email' => 'required|string|email|max:255',
            'message' => 'required|string|max:2000',
            'rating' => 'required|integer|between:1,5',
        ]);

        MyFeedback::create($request->all());
        return $this->redirectToIndex('created');
    }

    /**
     * Display the specified resource.
     */
    public function show(MyFeedback $myFeedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MyFeedback $myFeedback)
    {
        return view('admin.myFeedbacks.edit', ['feedback' => $myFeedback]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MyFeedback $myFeedback)
    {
        $request->validate([
            'sender_name' => 'required|string|max:255',
            'sender_email' => 'required|string|email|max:255',
            'message' => 'required|string|max:2000',
            'rating' => 'required|integer|between:1,5',
        ]);

        $myFeedback->update($request->all());
        return $this->redirectToIndex('updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MyFeedback $myFeedback)
    {
        $myFeedback->delete();
        return $this->redirectToIndex('deleted');
    }

    /**
     * Redirect to the feedback index.
     */
    private function redirectToIndex($action)
    {
        return redirect()->route('my-feedbacks.index')->with([
            'success' => "Your feedback has been {$action} successfully!",
        ]);
    }
}