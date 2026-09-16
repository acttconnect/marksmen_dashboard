@extends('admin.layouts.app')

@section('title', 'Create Job Opening')

@section('content')
<div class="mk-page">

    <div class="mk-page-header">
        <div>
            <div class="mk-eyebrow">RECRUITMENT MANAGEMENT</div>
            <h1>Create Job Opening</h1>
            <p>Add a new vacancy to the career section.</p>
        </div>

        <a href="{{ route('admin.jobs.index') }}" class="mk-secondary-btn">
            Back
        </a>
    </div>

    @if($errors->any())
        <div class="mk-alert mk-alert-danger">
            <div>
                <strong>Please fix the following errors:</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <button type="button" class="mk-alert-close" onclick="this.parentElement.remove()">×</button>
        </div>
    @endif

    <div class="mk-card">
        <div class="mk-card-head">
            <div>
                <div class="mk-section-label">NEW JOB</div>
                <h2>Job Information</h2>
                <p>Create the vacancy and add its requirements.</p>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.jobs.store') }}">
            @csrf
            @include('admin.jobs.form')
        </form>
    </div>

</div>
@endsection
