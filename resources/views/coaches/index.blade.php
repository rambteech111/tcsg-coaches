@extends('layouts.app')

@section('title', 'Our Coaches')

@section('content')
<nav>
    <div class="wrap">
        <a href="{{ url('/') }}" class="logo">
            <span class="logo-text"><span class="sub">A Curated Coach Marketplace</span>The Career Strategy Group</span>
        </a>
        <div class="nav-links">
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ route('coaches.index') }}" class="cta">All coaches</a>
        </div>
    </div>
</nav>

<section class="section blush">
    <div class="wrap">
        <div class="center">
            <div class="eyebrow">Coaches in your corner</div>
            <h2>Meet our experts</h2>
            <p>Browse our vetted roster of coaches.</p>
        </div>
        <div class="coachgrid">
            @forelse ($coaches as $coach)
                @include('coaches._card', ['coach' => $coach])
            @empty
                <p class="muted" style="grid-column:1/-1;text-align:center;">No coaches available yet.</p>
            @endforelse
        </div>
    </div>
</section>

<footer>
    <div class="wrap">&copy; {{ date('Y') }} The Career Strategy Group</div>
</footer>
@endsection
