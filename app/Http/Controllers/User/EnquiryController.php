<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ProductEnquiry;
use App\Models\ContactEnquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Product Enquiry
    |--------------------------------------------------------------------------
    */

    public function productForm()
    {
        return view('user.enquiries.product');
    }

    public function submitProduct(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255'
            ],

            'mobile_number' => [
                'required',
                'string',
                'max:20'
            ],

            'project_location' => [
                'required',
                'string',
                'max:255'
            ],

            'email' => [
                'nullable',
                'email',
                'max:255'
            ],

            'product_portfolio' => [
                'required',
                'string',
                'max:255'
            ],

            'requirements' => [
                'nullable',
                'string'
            ],
        ]);

        ProductEnquiry::create([
            'name' => $validated['name'],
            'mobile_number' => $validated['mobile_number'],
            'project_location' =>
                $validated['project_location'],
            'email' =>
                $validated['email'] ?? null,
            'product_portfolio' =>
                $validated['product_portfolio'],
            'requirements' =>
                $validated['requirements'] ?? null,
            'status' => 'new',
        ]);

        return back()->with(
            'success',
            'Product enquiry submitted successfully.'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Contact / Callback
    |--------------------------------------------------------------------------
    */

    public function contactForm()
    {
        return view('user.enquiries.contact');
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255'
            ],

            'mobile_number' => [
                'required',
                'string',
                'max:20'
            ],

            'location' => [
                'required',
                'string',
                'max:255'
            ],

            'email' => [
                'nullable',
                'email',
                'max:255'
            ],

            'product_enquiry' => [
                'required',
                'string',
                'max:255'
            ],

            'message' => [
                'nullable',
                'string'
            ],
        ]);

        ContactEnquiry::create([
            'name' => $validated['name'],
            'mobile_number' =>
                $validated['mobile_number'],
            'location' =>
                $validated['location'],
            'email' =>
                $validated['email'] ?? null,
            'product_enquiry' =>
                $validated['product_enquiry'],
            'message' =>
                $validated['message'] ?? null,
        ]);

        return back()->with(
            'success',
            'Contact request submitted successfully.'
        );
    }
}