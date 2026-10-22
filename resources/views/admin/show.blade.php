@extends('admin.layout')

@section('title', $coach->full_name)

@section('content')
    <a href="{{ route('admin.dashboard') }}" class="back-link">&larr; Back to dashboard</a>

    <div class="admin-card">
        <div style="display:flex;justify-content:space-between;align-items:start;margin-bottom:20px;">
            <div>
                <h1 style="margin-bottom:4px;">{{ $coach->full_name }}</h1>
                <span class="status status-{{ $coach->status }}">{{ $coach->status }}</span>
                @if ($coach->status === 'active')
                    <a href="{{ route('coaches.show', $coach->slug) }}" target="_blank" style="margin-left:10px;color:var(--coral-d);font-size:14px;font-weight:600;text-decoration:underline;">View public profile ↗</a>
                @endif
            </div>
            <div style="text-align:right;font-size:13px;color:var(--muted);">
                <div>Submission: {{ $coach->submission_id }}</div>
                <div>Updated: {{ $coach->updated_at?->toDayDateTimeString() }}</div>
            </div>
        </div>

        <div class="warn">
            Status is managed in the Google Sheet. Change the <strong>Status</strong>
            column there (Pending / Active / Declined) and run
            <code>php artisan coaches:sync</code>.
        </div>

        <div class="profile-section">
            <h3>Pricing</h3>
            <p>${{ $coach->session_rate }} to coach &middot; <strong>${{ $coach->client_price }}</strong> charged to client (incl. $100 marketplace fee)</p>
        </div>

        <div class="profile-section">
            <h3>Coaching style</h3>
            <p>{{ $coach->primary_style_label ?? '—' }}@if ($coach->secondary_style_label) &middot; {{ $coach->secondary_style_label }} (secondary)@endif</p>
        </div>

        <div class="profile-section">
            <h3>Client levels</h3>
            <div class="tag-list">
                @forelse ($coach->client_levels ?? [] as $level)<span>{{ $level }}</span>@empty<em style="color:var(--muted);">None</em>@endforelse
            </div>
        </div>

        <div class="profile-section">
            <h3>Topics</h3>
            <div class="tag-list">
                @forelse ($coach->topics ?? [] as $topic)<span>{{ $topic }}</span>@empty<em style="color:var(--muted);">None</em>@endforelse
            </div>
        </div>

        <div class="profile-section">
            <h3>Specializations</h3>
            <div class="tag-list">
                @forelse ($coach->specializations ?? [] as $spec)<span>{{ $spec }}</span>@empty<em style="color:var(--muted);">None</em>@endforelse
            </div>
        </div>

        <div class="profile-section">
            <h3>Certifications</h3>
            <p>{{ ! empty($coach->certifications) ? implode(', ', $coach->certifications) : '—' }}</p>
        </div>

        <div class="profile-section">
            <h3>Bio</h3>
            @foreach ($coach->bio_paragraphs as $paragraph)
                <p style="margin-bottom:12px;">{{ $paragraph }}</p>
            @endforeach
        </div>

        <div class="profile-section">
            <h3>Links (internal, hidden from public pages' PII)</h3>
            <p style="font-size:14px;">
                @if ($coach->website)Website: <a href="{{ $coach->website }}" target="_blank">{{ $coach->website }}</a><br>@endif
                @if ($coach->linkedin)LinkedIn: <a href="{{ $coach->linkedin }}" target="_blank">{{ $coach->linkedin }}</a><br>@endif
                @if ($coach->instagram)Instagram: <a href="{{ $coach->instagram }}" target="_blank">{{ $coach->instagram }}</a><br>@endif
                @if ($coach->youtube)YouTube: <a href="{{ $coach->youtube }}" target="_blank">{{ $coach->youtube }}</a>@endif
            </p>
        </div>
    </div>
@endsection
