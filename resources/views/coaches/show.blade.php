@extends('layouts.app')

@section('title', $coach->full_name . ' — The Career Strategy Group')

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

<section class="section" style="padding-top:48px;">
    <div class="wrap">
        <div style="max-width:860px;margin:0 auto;background:#fff;border-radius:24px;overflow:hidden;box-shadow:0 20px 60px rgba(30,43,77,.08);">
            <div class="pf-top">
                <div class="pf-photo" style="background:linear-gradient(150deg,#3A4E7E,#1E2B4D);">
                    <span class="mono">{{ strtoupper(substr($coach->first_name, 0, 1)) }}</span>
                </div>
                <div class="pf-info">
                    <h3>{{ $coach->full_name }}</h3>
                    @if ($coach->primary_style_label)
                        <div class="role">{{ $coach->primary_style_label }}@if ($coach->secondary_style_label) &middot; {{ $coach->secondary_style_label }}@endif</div>
                    @endif
                    <div class="pf-price">${{ $coach->client_price }} per 60-minute session</div>
                    <div class="ch-tagrow" style="margin-top:12px;">
                        @foreach ($coach->client_levels ?? [] as $level)<span>{{ $level }}</span>@endforeach
                        @foreach ($coach->topics ?? [] as $topic)<span>{{ $topic }}</span>@endforeach
                        @foreach ($coach->specializations ?? [] as $spec)<span>{{ $spec }}</span>@endforeach
                    </div>
                </div>
            </div>

            <div class="pf-sec">
                <h4>About {{ $coach->first_name }}</h4>
                @foreach ($coach->bio_paragraphs as $paragraph)
                    <p style="font-size:17px;line-height:1.65;margin-bottom:14px;">{{ $paragraph }}</p>
                @endforeach

                @if ($coach->website || $coach->linkedin || $coach->instagram || $coach->youtube)
                    <h4>Links</h4>
                    <p style="font-size:16px;">
                        @if ($coach->website)<a href="{{ $coach->website }}" rel="noopener" style="color:var(--coral-d);text-decoration:underline;margin-right:16px;">Website</a>@endif
                        @if ($coach->linkedin)<a href="{{ $coach->linkedin }}" rel="noopener" style="color:var(--coral-d);text-decoration:underline;margin-right:16px;">LinkedIn</a>@endif
                        @if ($coach->instagram)<a href="{{ $coach->instagram }}" rel="noopener" style="color:var(--coral-d);text-decoration:underline;margin-right:16px;">Instagram</a>@endif
                        @if ($coach->youtube)<a href="{{ $coach->youtube }}" rel="noopener" style="color:var(--coral-d);text-decoration:underline;margin-right:16px;">YouTube</a>@endif
                    </p>
                @endif
            </div>

            <div class="pf-book">
                <a href="#" class="btn">Book a session</a>
            </div>

            @if (! empty($coach->certifications))
                <div class="pf-sec" style="padding-bottom:28px;">
                    <h4>Certifications</h4>
                    <p style="font-size:15px;color:var(--muted);">{{ implode(', ', $coach->certifications) }}</p>
                </div>
            @endif
        </div>
    </div>
</section>

<footer>
    <div class="wrap">&copy; {{ date('Y') }} The Career Strategy Group</div>
</footer>
@endsection
