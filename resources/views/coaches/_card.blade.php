<div class="coach" data-tags="{{ implode(' ', $coach->topics ?? []) }}">
    <div class="ch-photo" style="background:linear-gradient(150deg,#3A4E7E,#1E2B4D);">
        <span class="mono">{{ strtoupper(substr($coach->first_name, 0, 1)) }}</span>
        <div class="ch-overlay">
            <div class="n">{{ $coach->full_name }}</div>
            @if ($coach->primary_style_label)
                <div class="t">{{ $coach->primary_style_label }}</div>
            @endif
        </div>
    </div>
    <div class="ch-body">
        <div class="ch-meta">
            <span class="ch-stars" style="color:var(--berry);font-weight:600;font-size:14px;">
                @foreach (array_slice($coach->specializations ?? [], 0, 1) as $spec){{ $spec }}@endforeach
            </span>
            <span class="ch-price">${{ $coach->client_price }}</span>
        </div>
        <div class="ch-tagrow">
            @foreach (array_slice($coach->topics ?? [], 0, 2) as $topic)
                <span>{{ $topic }}</span>
            @endforeach
        </div>
        <a href="{{ route('coaches.show', $coach->slug) }}" class="ch-book">See profile</a>
    </div>
</div>
