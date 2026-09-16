<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use App\Models\JobOpening;
use App\Models\ProductEnquiry;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $availableJobs = JobOpening::where('status', 'open')
            ->where(function ($query) {
                $query->whereNull('application_deadline')
                    ->orWhereDate(
                        'application_deadline',
                        '>=',
                        now()->toDateString()
                    );
            })
            ->count();

        $applicationCount = JobApplication::where(
            'email',
            $user->email
        )->count();

        $enquiryCount = ProductEnquiry::where(
            'email',
            $user->email
        )->count();

        $recentApplications = JobApplication::with('jobOpening')
            ->where('email', $user->email)
            ->latest()
            ->limit(5)
            ->get();

        return view('user.dashboard', compact(
            'user',
            'availableJobs',
            'applicationCount',
            'enquiryCount',
            'recentApplications'
        ));
    }
}