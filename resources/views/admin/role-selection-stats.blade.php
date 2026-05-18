@php
    $stats  = $widget['stats'] ?? [];
    $labels = ['researcher' => 'Researcher', 'advisor' => 'Advisor', 'policymaker' => 'Policy-Maker', 'farmer_forester' => 'Farmer', 'other' => 'Other'];
    $total  = array_sum(array_column($stats, 'count'));
@endphp

<div class="row mb-4">
    @foreach($stats as $stat)
        @php
            $roleKey  = $stat['_id'] ?? 'unknown';
            $label    = $labels[$roleKey] ?? ucfirst($roleKey);
            $count    = $stat['count'];
            $percent  = $total > 0 ? round(($count / $total) * 100) : 0;
        @endphp
        <div class="col-sm-6 col-md-4 col-xl-2 mb-3">
            <div class="card text-center h-100">
                <div class="card-body">
                    <h2 class="mb-0 fw-bold text-primary">{{ $count }}</h2>
                    <p class="mb-1 text-muted small">{{ $label }}</p>
                    <div class="progress" style="height:6px;">
                        <div class="progress-bar bg-success" style="width:{{ $percent }}%;"></div>
                    </div>
                    <small class="text-muted">{{ $percent }}% of total</small>
                </div>
            </div>
        </div>
    @endforeach

    @if($total > 0)
        <div class="col-sm-6 col-md-4 col-xl-2 mb-3">
            <div class="card text-center h-100 border-secondary">
                <div class="card-body">
                    <h2 class="mb-0 fw-bold text-secondary">{{ $total }}</h2>
                    <p class="mb-1 text-muted small">Total Submissions</p>
                </div>
            </div>
        </div>
    @else
        <div class="col-12">
            <div class="alert alert-info">No role selections recorded yet.</div>
        </div>
    @endif
</div>
