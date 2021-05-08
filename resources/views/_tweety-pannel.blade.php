<div class="border border-blue-400 rounded-2xl p-6">
    <form method="POST" action="/tweets" enctype="multipart/form-data">
        @csrf

        <textarea
            name="new_tweet"
            id="new_tweet"
            class="min-w-full border border-gray-300 rounded-lg"
            placeholder="What's up?"
            rows="3"
            maxlength="255"
            required
            autofocus
        ></textarea>

        <div class="flex justify-center items-center">
            <div id="show_post_image_container"
                 class="hidden"
                 style="height: 130px; max-height: 130px; max-width: 250px; width: 250px">
                <img src="#" id="show_post_image" alt="post_images"
                     style="min-width: 250px; min-height: 130px"
                     class="overflow-hidden object-cover">
            </div>
        </div>

        <hr class="my-2">

        <footer class="flex justify-between items-center">
            <img
                src="{{ auth()->user()->avatar }}"
                alt="User Image"
                class="rounded-full mr-2"
                width="40px"
                height="40px"
            >

            <div id="count" class="text-sm">
                <span id="current_count">0</span>
                <span id="maximum_count">/ 255</span>
            </div>

            <div class="flex justify-center items-center">
                <input type="file" name="post_image" id="post_image" onChange="img_pathUrl(this)" hidden/>
                <label for="post_image" class="mr-4">
                    <svg class="h-10 w-10 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </label>

                <button
                    type="submit"
                    class="bg-blue-500 rounded-lg shadow p-2 text-white text-sm hover:bg-blue-600"
                >
                    Tweet-a-roo!
                </button>
            </div>

        </footer>
    </form>

    @error('body')
        <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
    @enderror
</div>

<script type="text/javascript">
    $('#new_tweet').keyup(function() {
        let characterCount = $(this).val().length,
            current_count = $('#current_count'),
            maximum_count = $('#maximum_count'),
            count = $('#count');
        current_count.text(characterCount);
    });

    function img_pathUrl(input){
        document.getElementById('show_post_image_container').className = "flex justify-center items-center";
        $('#show_post_image')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
    }
</script>
