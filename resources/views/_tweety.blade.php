<div class="flex p-4 relative {{ $loop->last ? '' : 'border-b border-gray-300' }}">
    <div class="mx-2 flex-shrink-0">
        <a href="{{ $tweet->user->path() }}">
            <img src="{{ $tweet->user->avatar }}"
                 alt="Post's Author Image"
                 class="rounded-full mr-2"
                 width="50px"
                 height="50px"
            >
        </a>
    </div>

    <div>
        <div
             class="flex items-center"
        >
             <a href="{{ $tweet->user->path() }}" class="mr-2">
                <h5 class="font-bold">{{ $tweet->user->name }}</h5>
            </a>

            <span class="text-gray-400 text-sm" style="height: 100%">
                {{ '@' . $tweet->user->name }} :
                <time>{{ $tweet->created_at->diffInHours() < 48 ? $tweet->created_at->diffForHumans() :  $tweet->created_at->toFormattedDateString()}}</time>
            </span>
        </div>

        <p class="text-sm mb-2">
            {{ $tweet->body }}
        </p>

        @if($tweet->images)
            <img src="{{ $tweet->images }}" alt="tweet images"
                 style="height: 260px; max-height: 260px; max-width: 500px; width: 500px"
                 class="overflow-hidden object-cover rounded-3xl mb-2"
            >
        @endif

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
