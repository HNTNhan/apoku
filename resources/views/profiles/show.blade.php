<x-app-layout>
    <header class="container mx-auto relative mb-4">
        <div class="relative" style="height: 250px">
            <img src="{{ $user->banner }}"
                 alt="default profile banner"
                 width="100%"
                 style="max-height: 250px; min-height: 250px"
                 class="mb-2 overflow-hidden object-cover"
            >

            <img
                src="{{ $user->avatar }}"
                alt="User Image"
                class="rounded-full absolute bottom-0 transform -translate-x-1/2 translate-y-1/2"
                style="left: 50%"
                width="150px"
            >

            @can('edit', $user)
                @if($show_banner)
                    <div class="absolute text-center text-black bg-gray-100 rounded-lg"
                         style="top: 5px; right: 10px; width: 200px">
                        <form method="POST" action="{{ $user->path() . '/banner' }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <input class="p-2" style="width: 200px" aria-label="Choose file"
                                   type="file" name="banner" id="banner" required/>
                            @error('banner')
                                <p class="text-red-600 text-sm mt-3">{{ $message }}</p>
                            @enderror
                            <div class="py-2">
                                <button type="submit" class="px-4 py-1 hover:text-blue-700 hover:bg-blue-200 text-sm rounded-lg">
                                    Change
                                </button>
                                <a class="px-4 py-1 hover:text-blue-700 hover:bg-blue-200 text-sm rounded-lg" href="{{ $user->path()}}">Cancel</a>
                            </div>
                        </form>
                    </div>
                @else
                    <a class="absolute text-center font-bold flex text-black bg-gray-100 px-2 py-1 rounded-lg border border-gray-500"
                       style="top: 5px; right: 10px"
                       href="{{ $user->path() . '?show_banner=true' }}"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                        </svg>
                        Edit
                    </a>
                @endif
            @endcan
        </div>

        <div class="flex justify-between items-center mb-4">
            <div style="max-width: 250px; word-wrap: break-word;">
                <h2 class="font-bold text-2xl">{{ $user->name }}</h2>
                <p class="text-sm">Join {{ $user->created_at->diffForHumans() }}</p>
            </div>
            <div class="flex">
                @can('edit', $user)
                    <a href="{{ $user->path('edit') }}" class="rounded-lg border border-gray-500 p-2 text-xs mr-2">Edit Profile</a>
                @endcan
                <x-follow-button :user="$user" />

            </div>
        </div>

        <p class="text-sm">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci consectetur debitis delectus, expedita id
            illum ipsum libero molestiae nostrum perspiciatis possimus quod repudiandae sed, tenetur totam unde vel
            voluptatibus! Ducimus.
        </p>
    </header>

    @include('_timeline', [
        'tweets' => $tweets
    ])
</x-app-layout>
