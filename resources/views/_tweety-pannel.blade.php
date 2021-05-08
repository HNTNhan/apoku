<div class="border border-blue-400 rounded-2xl p-6">
    <form method="POST" action="/tweets">
        @csrf

        <textarea
            name="new_tweet"
            id="new_tweet"
            class="w-full border-none rounded-lg"
            placeholder="What's up?"
            rows="3"
            maxlength="255"
            required
            autofocus
        ></textarea>

        <hr class="my-2">

        <footer class="flex justify-between items-center">
            <img
                src="{{ auth()->user()->avatar }}"
                alt="User Image"
                class="rounded-full mr-2"
                width="40px"
            >

            <div id="count" class="text-sm">
                <span id="current_count">0</span>
                <span id="maximum_count">/ 255</span>
            </div>

            <button
                type="submit"
                class="bg-blue-500 rounded-lg shadow p-2 text-white text-sm hover:bg-blue-600"
            >
                Tweet-a-roo!
            </button>
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
</script>
