<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function index()
    {
        $reviews = Review::all();

        return view('reviews.index', compact('reviews'));
    }


    public function create()
    {
        return view('reviews.create');
    }


    public function store(ReviewRequest $request)
    {
        // dd($request->all());
        Review::create($request->validated());

        return redirect()->route('reviews.index')->with('success', 'Review created successfully.');
    }
}
