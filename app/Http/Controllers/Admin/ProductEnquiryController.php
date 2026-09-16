<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductEnquiryRequest;
use App\Models\ProductEnquiry;
use Illuminate\Http\Request;

class ProductEnquiryController extends Controller
{
    /**
     * Display product enquiries.
     */
    public function index(Request $request)
    {
        $query = ProductEnquiry::query();

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
                    ->orWhere('project_location', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('product_portfolio', 'like', "%{$search}%");
            });
        }

        /*
        |--------------------------------------------------------------------------
        | Status Filter
        |--------------------------------------------------------------------------
        */
        if ($request->filled('status')) {
            $query->where('status', $request->status);
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
            'admin.product-enquiries.index',
            compact('enquiries')
        );
    }

    /**
     * Show enquiry details.
     */
    public function show(ProductEnquiry $productEnquiry)
    {
        return view(
            'admin.product-enquiries.show',
            compact('productEnquiry')
        );
    }

    /**
     * Edit enquiry.
     */
    public function edit(ProductEnquiry $productEnquiry)
    {
        return view(
            'admin.product-enquiries.edit',
            compact('productEnquiry')
        );
    }

    /**
     * Update enquiry.
     */
    public function update(
        ProductEnquiryRequest $request,
        ProductEnquiry $productEnquiry
    ) {
        $productEnquiry->update(
            $request->validated()
        );

        return redirect()
            ->route('admin.product-enquiries.index')
            ->with(
                'success',
                'Product enquiry updated successfully.'
            );
    }

    /**
     * Delete enquiry.
     */
    public function destroy(ProductEnquiry $productEnquiry)
    {
        $productEnquiry->delete();

        return redirect()
            ->route('admin.product-enquiries.index')
            ->with(
                'success',
                'Product enquiry deleted successfully.'
            );
    }
}