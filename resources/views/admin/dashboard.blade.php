@extends('admin.layout')

@section('title', 'Admin dashboard')

@section('content')
    <h1>Coaches</h1>
    <p style="color:var(--muted);margin-bottom:24px;font-size:14px;">
        Read-only view. Approve or decline a coach by editing the <strong>Status</strong>
        column in the Google Sheet; changes land here on the next
        <code>php artisan coaches:sync</code>.
    </p>

    <div class="stat-grid">
        <div class="stat"><b>{{ $counts['total'] }}</b><span>Total</span></div>
        <div class="stat"><b>{{ $counts['pending'] }}</b><span>Pending</span></div>
        <div class="stat"><b>{{ $counts['active'] }}</b><span>Active</span></div>
        <div class="stat"><b>{{ $counts['declined'] }}</b><span>Declined</span></div>
    </div>

    <div class="admin-card">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Primary style</th>
                    <th>Rate</th>
                    <th>Topics</th>
                    <th>Updated</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($coaches as $coach)
                    <tr>
                        <td>
                            <a href="{{ route('admin.show', $coach) }}" class="row-link">{{ $coach->full_name }}</a>
                        </td>
                        <td><span class="status status-{{ $coach->status }}">{{ $coach->status }}</span></td>
                        <td>{{ $coach->primary_style_label ?? '—' }}</td>
                        <td>${{ $coach->session_rate }} / ${{ $coach->client_price }}</td>
                        <td>{{ implode(', ', array_slice($coach->topics ?? [], 0, 3)) }}</td>
                        <td>{{ $coach->updated_at?->diffForHumans() }}</td>
                    </tr>
                @empty
                    <tr><td colspan="6" style="text-align:center;color:var(--muted);padding:40px;">No coaches yet — run <code>php artisan coaches:sync</code>.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
