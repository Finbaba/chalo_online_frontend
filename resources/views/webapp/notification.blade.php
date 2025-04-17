@extends('webapp.layouts.app')

@push('styles')
<!-- <link rel="stylesheet" href="../frontend/discover.css" /> -->
@endpush

@section('content')
<header class="header allhedtop">
    <div class="innerwapperbox">
        <a class="leftarrowicon" href="{{ route('home') }}"><i class="bi bi-arrow-left"></i></a>
        <span>Notifications</span>
    </div>
</header>

<div class="innerwapperbox">
    @forelse ($notifications as $notification)
        <div class="notificationbx">
            <div class="notification-title">{{ $notification->title }}</div>
            <div class="notification-msg">
                {{ $notification->body ?? 'No message available.' }}
            </div>
            <small class="text-muted d-block mt-1">
                {{ $notification->created_at ? $notification->created_at->diffForHumans() : '' }}
            </small>
        </div>
    @empty
        <div class="notificationbx">
            <div class="notification-title">No Notifications</div>
            <div class="notification-msg">You don’t have any notifications at the moment.</div>
        </div>
    @endforelse
</div>
@endsection

@push('scripts')
@endpush
