<x-admin>
    <x-slot name="title">Edit</x-slot>
    
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('update-post') }}">
        @csrf
        <input type="hidden" name="post_id" value="{{$post->id}}">
        <!-- title -->
        <div class="my-4">
            <label for="title">
                <h5>Title</h5>
                <input id="title" class="block mt-1 w-full" type="text" name="title" value="{{null !== old('title') ? old('title') :  $post->title}}" required autofocus readonly />
            </label>
        </div>

        <!-- excerpt -->
        <div class="my-4">
            <label for="excerpt">
                <h5>Excerpt</h5>
                <input id="excerpt" class="block mt-1 w-full" type="text" name="excerpt" value="{{null !== old('excerpt') ? old('excerpt') : $post->excerpt}}" required autofocus />
            </label>
        </div>

        <!-- body -->
        <div class="my-4">
            <label for="summernote">
                <h5>Body</h5>
                <textarea id="summernote" name="body">{{null !== old('body') ? old('body') : $post->body}}</textarea>
                <script>
                  $('#summernote').summernote({
                    tabsize: 2,
                    height: 400
                  });
                </script>
            </label>
        </div>

        <!-- visibility -->
        <div class="my-4">
            <h5>Visibility</h5>
            <label for="v-public">
                <input id="v-public" type="radio" name="visibility" value="public"> Published
            </label>&nbsp;&nbsp;
            <label for="v-hidden">
                <input id="v-hidden" type="radio" name="visibility" value="hidden" checked> Hidden
            </label>
        </div>

        <!-- submit -->
        <button class="btn btn-success" type="submit">Update</button>
    </form>
</x-admin>