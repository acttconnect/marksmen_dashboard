<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\ContactEnquiry;
use App\Models\Gallery;
use App\Models\JobApplication;
use App\Models\JobOpening;
use App\Models\ProductEnquiry;

class DashboardController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | Dashboard Statistics
        |--------------------------------------------------------------------------
        */

        $stats = [
            'categories' => Category::count(),
            'gallery' => Gallery::count(),
            'blogs' => Blog::count(),
            'contact_enquiries' => ContactEnquiry::count(),
            'product_enquiries' => ProductEnquiry::count(),
            'job_openings' => JobOpening::count(),
            'job_applications' => JobApplication::count(),
        ];


        /*
        |--------------------------------------------------------------------------
        | Recent Product Enquiries
        |--------------------------------------------------------------------------
        */

        $recentProductEnquiries = ProductEnquiry::latest()
            ->take(5)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Recent Contact Enquiries
        |--------------------------------------------------------------------------
        */

        $recentContactEnquiries = ContactEnquiry::latest()
            ->take(5)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Recent Job Applications
        |--------------------------------------------------------------------------
        */

        $recentApplications = JobApplication::with('jobOpening')
            ->latest()
            ->take(5)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Recent Blogs
        |--------------------------------------------------------------------------
        */

        $recentBlogs = Blog::latest()
            ->take(5)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Recent Gallery
        |--------------------------------------------------------------------------
        */

        $recentGallery = Gallery::with('category')
            ->latest()
            ->take(5)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Return Dashboard
        |--------------------------------------------------------------------------
        */

        return view(
            'admin.dashboard',
            compact(
                'stats',
                'recentProductEnquiries',
                'recentContactEnquiries',
                'recentApplications',
                'recentBlogs',
                'recentGallery'
            )
        );
    }
}