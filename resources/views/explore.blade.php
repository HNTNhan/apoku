<x-app-layout>
    <div>
        @foreach($users as $user)
            <a href="{{ $user->path() }}" class="flex items-center mb-4">
                <img src="{{ $user->avatar }}" alt="{{ $user->name }}'s avatar" width="50" class="mx-2 rounded-lg ">

                <div>
                    <h3 class="font-bold">{{ $user->name }}</h3>
                </div>
            </a>
        @endforeach

{{--        {{ $user->links() }}--}}
    </div>
</x-app-layout>
