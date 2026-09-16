<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Category;
use App\Models\JobOpening;
use Illuminate\Http\Request;
class FrontendController extends Controller
{

    public function index()
    {
        return view('frontend.index');
    }


    public function about()
    {
        return view('frontend.about');
    }


    public function products()
    {
        return view('frontend.products');
    }


    public function services()
    {
        return view('frontend.services');
    }

    public function clients()
    {


        return view('frontend.clients');
    }

public function careers()
{
    $jobs = JobOpening::where('status', 'open')
        ->orderBy('id', 'desc')
        ->get();

    return view('frontend.careers', ['jobs'=>$jobs]);
}


    public function contact()
    {
        return view('frontend.contact');
    }


public function gallery(Request $request)
{
    $categories = Category::where('status', 'active')
        ->orderBy('name')
        ->get();

    $query = Gallery::with('category')
        ->where('status', 'active');

    if ($request->filled('category')) {

        $query->whereHas('category', function ($q) use ($request) {
            $q->where('slug', $request->category);
        });

    }

    $data = $query
        ->latest()
        ->get();

    return view('frontend.gallery', compact(
        'categories',
        'data'
    ));
}



}