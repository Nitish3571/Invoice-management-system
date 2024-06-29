@extends('layouts/contentNavbarLayout')

@section('title', 'Account settings - Pages')

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Account Settings /</span> Notifications
    </h4>

    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                <li class="nav-item"><a class="nav-link" href="{{ url('/account-settings-account') }}"><i
                            class="bx bx-user me-1"></i> Account</a></li>
                <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-bell me-1"></i>
                        Notifications</a></li>
            </ul>
            <div class="card">
                <!-- Notifications -->
                <h5 class="card-header">Not Found</h5>

                <!-- /Notifications -->
            </div>
        </div>
    </div>
@endsection
