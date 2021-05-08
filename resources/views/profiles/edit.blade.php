<x-app-layout>
    <form method="POST" action="{{ $user->path() }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="mb-6">
            <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">Name</label>
            <input class="border border-gray-500 p-2 w-full"
                   type="text" name="name" id="name" value="{{ $user->name }}" required>
            @error('name')
                <p class="text-red-600 text-sm mt-3">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="username" class="block mb-2 uppercase font-bold text-xs text-gray-700">User Name</label>
            <input class="border border-gray-500 p-2 w-full"
                   type="text" name="username" id="username" value="{{ $user->username }}" required>
            @error('username')
            <p class="text-red-600 text-sm mt-3">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="avatar" class="block mb-2 uppercase font-bold text-xs text-gray-700">Avatar</label>

            <div class="flex">
                <input class="border border-gray-500 p-2 w-full"
                       type="file" name="avatar" id="avatar">
                <img src="{{ $user->avatar }}" alt="user's avatar" width="50px">
            </div>

            @error('avatar')
            <p class="text-red-600 text-sm mt-3">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">Email</label>
            <input class="border border-gray-500 p-2 w-full"
                   type="email" name="email" id="email" value="{{ $user->email }}" required>
            @error('email')
            <p class="text-red-600 text-sm mt-3">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">Password</label>
            <input class="border border-gray-500 p-2 w-full"
                   type="password" name="password" id="password" required>
            @error('password')
            <p class="text-red-600 text-sm mt-3">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password_confirmation" class="block mb-2 uppercase font-bold text-xs text-gray-700">Password Confirmation</label>
            <input class="border border-gray-500 p-2 w-full"
                   type="password" name="password_confirmation" id="password_confirmation" required>
            @error('password_confirmation')
            <p class="text-red-600 text-sm mt-3">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button type="submit" class="bg-blue-400 text-white px-4 py-1 hover:bg-blue-600">
                Submit
            </button>

            <button class="px-4 py-1 hover:bg-gray-300">
                <a href="{{ $user->path() }}">
                    Cancel
                </a>
            </button>
        </div>
    </form>
</x-app-layout>
