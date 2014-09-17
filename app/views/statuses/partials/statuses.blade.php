@forelse($statuses as $status)
    @include('statuses.partials.status')
@empty
    <p>This user has no status messages.</p>
@endforelse