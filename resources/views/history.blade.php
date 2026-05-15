@extends('base')

@section('title', 'Decision History')

@section('content')
<div class="container py-5">
    <div class="row mb-5">
        <div class="col-md-8">
            <h1 class="display-4 fw-bold">Decision <span class="text-primary">History</span></h1>
            <p class="lead text-muted">A history of your rational (and maybe not-so-rational) choices.</p>
        </div>
        <div class="col-md-4 text-end">
            <div class="p-4 bg-white shadow-sm rounded-4 border border-light">
                <h5 class="mb-1 text-muted small text-uppercase">Willpower Points</h5>
                <h2 class="mb-0 fw-bold text-primary">{{ $profile['points'] ?? 0 }}</h2>
                <small class="text-muted">Level {{ $profile['level'] ?? 1 }} Planner</small>
            </div>
        </div>
    </div>

    @if(empty($decisions))
        <div class="text-center py-5">
            <div class="mb-4">
                <i class="fas fa-folder-open display-1 text-light"></i>
            </div>
            <h3>Your history is empty</h3>
            <p class="text-muted">Start making decisions to see them here.</p>
            <a href="/" class="btn btn-primary mt-3">Evaluate an Item</a>
        </div>
    @else
        <div class="row g-4">
            @foreach($decisions as $decision)
                @php $data = json_decode($decision['decision_json'], true); @endphp
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden hover-lift">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <span class="badge {{ $data['badgeClass'] ?? 'bg-secondary' }}">{{ $data['badgeText'] ?? 'Unknown' }}</span>
                                <small class="text-muted">{{ date('M d, Y', strtotime($decision['created_at'])) }}</small>
                            </div>
                            <h4 class="fw-bold mb-2">{{ $decision['item_to_buy'] }}</h4>
                            <div class="d-flex align-items-center mb-3">
                                <div class="progress flex-grow-1" style="height: 6px;">
                                    <div class="progress-bar bg-{{ $data['color'] ?? 'primary' }}" style="width: {{ $decision['score'] }}%"></div>
                                </div>
                                <span class="ms-3 fw-bold">{{ round($decision['score']) }}%</span>
                            </div>
                            <p class="small text-muted mb-0">{{ $data['comment'] ?? '' }}</p>
                        </div>
                        <div class="card-footer bg-light border-0 p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <button class="btn btn-sm btn-link text-decoration-none" type="button" data-bs-toggle="collapse" data-bs-target="#advice-{{ $decision['id'] }}">
                                    View Expert Analysis <i class="fas fa-chevron-down ms-1"></i>
                                </button>
                                @if($decision['score'] < 70)
                                    <a href="/history" class="btn btn-sm btn-outline-primary rounded-pill">Set Savings Goal</a>
                                @endif
                            </div>
                            <div class="collapse mt-2" id="advice-{{ $decision['id'] }}">
                                <div class="p-3 bg-white rounded-3 small italic">
                                    {{ $data['aiAdvice'] ?? 'No analysis recorded.' }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<style>
    .hover-lift {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .hover-lift:hover {
        transform: translateY(-5px);
        box-shadow: 0 1rem 3rem rgba(0,0,0,0.1) !important;
    }
</style>
@endsection
