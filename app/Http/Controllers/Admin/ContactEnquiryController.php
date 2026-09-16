<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactEnquiryRequest;
use App\Models\ContactEnquiry;
use Illuminate\Http\Request;

class ContactEnquiryController extends Controller
{
    /**
     * Display contact enquiries.
     */
    public function index(Request $request)
    {
        $query = ContactEnquiry::query();

        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        */
        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('mobile_number', 'like', "%{$search}%")
                    ->orWhere('location', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('product_enquiry', 'like', "%{$search}%")
                    ->orWhere('message', 'like', "%{$search}%");

            });
        }

        /*
        |--------------------------------------------------------------------------
        | Pagination
        |--------------------------------------------------------------------------
        */
        $enquiries = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'admin.contact-enquiries.index',
            compact('enquiries')
        );
    }

    /**
     * Display enquiry details.
     */
    public function show(ContactEnquiry $contactEnquiry)
    {
        return view(
            'admin.contact-enquiries.show',
            compact('contactEnquiry')
        );
    }

    /**
     * Show edit form.
     */
    public function edit(ContactEnquiry $contactEnquiry)
    {
        return view(
            'admin.contact-enquiries.edit',
            compact('contactEnquiry')
        );
    }

    /**
     * Update enquiry.
     */
    public function update(
        ContactEnquiryRequest $request,
        ContactEnquiry $contactEnquiry
    ) {
        $contactEnquiry->update(
            $request->validated()
        );

        return redirect()
            ->route('admin.contact-enquiries.index')
            ->with(
                'success',
                'Contact enquiry updated successfully.'
            );
    }

    /**
     * Delete enquiry.
     */
    public function destroy(ContactEnquiry $contactEnquiry)
    {
        $contactEnquiry->delete();

        return redirect()
            ->route('admin.contact-enquiries.index')
            ->with(
                'success',
                'Contact enquiry deleted successfully.'
            );
    }
}