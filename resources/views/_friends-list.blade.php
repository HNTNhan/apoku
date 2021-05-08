<div class="bg-blue-200 border border-gray-300 rounded-2xl p-4">
    <h3 class="font-bold text-xl mb-4">Following</h3>
    <ul>
        @forelse(auth()->user()->follows as $user)
            <li class="{{ $loop->last ? "" : 'mb-4'}}">
                <div>
                    <a href="{{ route('profiles', $user) }}" class="flex items-center text-sm">
                        <img src="{{ $user->avatar }}" alt="" class="rounded-full mr-2" width="40px">
                        {{ $user->name }}
                    </a>
                </div>
            </li>
        @empty
            <li>No friend yet!</li>
        @endforelse
    </ul>
</div>

