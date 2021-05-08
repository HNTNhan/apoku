<div class="border-t border-l border-r border-gray-300 rounded-2xl my-8">
    @forelse($tweets as $tweet)
        @include('_tweety')
    @empty
        <p class="p-4">No tweet yet.</p>
    @endforelse

    {{ $tweets->links() }}
</div>
