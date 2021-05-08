<div class="flex p-4 relative {{ $loop->last ? '' : 'border-b border-gray-300' }}">
    <div class="mx-2 flex-shrink-0">
        <a href="{{ $tweet->user->path() }}">
            <img src="{{ $tweet->user->avatar }}"
                 alt="Post's Author Image"
                 class="rounded-full mr-2"
                 width="50px"
            >
        </a>
    </div>

    <div>
        <div style="width: fit-content; max-width: 200px">
            <a href="{{ $tweet->user->path() }}">
                <h5 class="font-bold mb-4">{{ $tweet->user->name }}</h5>
            </a>
        </div>

        <p class="text-sm mb-2">
            {{ $tweet->body }}
        </p>

        <x-like-dislike-buttons :tweet="$tweet" />
    </div>

    @can('edit', $tweet->user)
        <form method="POST" action="/tweets/{{ $tweet->id }}">
            @csrf
            @method('DELETE')

            <button class="absolute text-red-500"
                    style="top: 5px; right: 10px">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </form>
    @endcan
</div>
