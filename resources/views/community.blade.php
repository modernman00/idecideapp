@extends('base')

@section('title', 'Community Reality Check')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold">Community <span class="text-primary">Reality Check</span></h1>
        <p class="lead text-muted">See what others are debating. All data is anonymized for privacy.</p>
    </div>

    @if(empty($decisions))
        <div class="text-center py-5">
            <div class="mb-4 text-muted">
                <i class="fas fa-users-slash display-1"></i>
            </div>
            <h3>No public decisions yet</h3>
            <p class="text-muted">Be the first to share a rational debate with the community!</p>
            <a href="/" class="btn btn-primary mt-3">Start Evaluation</a>
        </div>
    @else
        <div class="row g-4">
            @foreach($decisions as $decision)
                @php $data = json_decode($decision['decision_json'], true); @endphp
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden border-start border-4 border-{{ $data['color'] ?? 'primary' }}">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted small"><i class="far fa-clock me-1"></i> {{ date('M d, Y', strtotime($decision['created_at'])) }}</span>
                                <div class="badge bg-light text-dark rounded-pill border">
                                    <i class="fas fa-chart-simple text-primary me-1"></i> {{ round($decision['score']) }}%
                                </div>
                            </div>
                            <h5 class="fw-bold mb-3">Should I buy: {{ $decision['item_to_buy'] }}?</h5>
                            <p class="small text-muted mb-4">"{{ $data['comment'] ?? 'No comment provided.' }}"</p>
                            
                            <div class="d-flex gap-2">
                                <button class="btn btn-sm btn-outline-success flex-grow-1 rounded-pill vote-btn" data-type="rational">
                                    <i class="far fa-thumbs-up me-1"></i> Rational
                                </button>
                                <button class="btn btn-sm btn-outline-danger flex-grow-1 rounded-pill vote-btn" data-type="impulsive">
                                    <i class="far fa-thumbs-down me-1"></i> Impulsive
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <div class="mt-5 p-5 bg-dark text-white rounded-5 text-center shadow-lg">
        <h2 class="fw-bold mb-3">Your Privacy Matters</h2>
        <p class="text-light opacity-75 mb-4">Only the item name and the resulting score are shared. No personal notes, identity, or financial details are ever made public unless you explicitly toggle it.</p>
        <div class="d-flex justify-content-center gap-3">
            <a href="/#questions" class="btn btn-primary px-4 py-2 rounded-pill fw-bold">Join the Debate</a>
        </div>
    </div>
</div>

<script>
document.querySelectorAll('.vote-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        // Toggle active state
        const isRational = this.dataset.type === 'rational';
        const parent = this.parentElement;
        
        // Remove active from both
        parent.querySelectorAll('.vote-btn').forEach(b => {
            b.classList.remove('btn-success', 'btn-danger', 'text-white');
            b.classList.add('btn-outline-success', 'btn-outline-danger');
        });

        // Add active to clicked
        this.classList.remove('btn-outline-success', 'btn-outline-danger');
        this.classList.add(isRational ? 'btn-success' : 'btn-danger', 'text-white');
        
        // Optional: In a real app, you'd send an AJAX call here to save the vote
        console.log(`Voted ${this.dataset.type} on this decision`);
    });
});
</script>
@endsection
