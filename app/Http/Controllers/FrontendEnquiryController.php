<?php

namespace App\Http\Controllers;

use App\Models\ProductEnquiry;
use App\Models\ContactEnquiry;
use Illuminate\Http\Request;

class FrontendEnquiryController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'mobile_number' => 'required|string|max:20',
            'project_location' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'product_portfolio' => 'required|string|max:255',
            'requirements' => 'nullable|string',
        ]);

        $validated['status'] = 'new';

        ProductEnquiry::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Your enquiry has been submitted successfully.'
        ]);
    }








     public function contact(Request $request)
    {
       

    
$validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],
'mobile_number' => [
                'required',
                'string',
                'max:20',
            ],

                                'location' => [
                'required',
                'string',
                'max:255',
            ],

                            'email' => [
                'nullable',
                'email',
                'max:255',
            ],

            'product_enquiry' => [
                'required',
                'string',
                'max:255',
            ],

            'message' => [
                'nullable',
                'string',
            ],
        ]);

        $contactEnquiry = ContactEnquiry::create($validated);

       return redirect()
    ->back()
    ->with('success', 'Enquiry submitted successfully.');
    
    }
}