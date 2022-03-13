<x-admin>
    <x-slot name="title">Create</x-slot>

    <h1>Create Post</h1>
    
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('save-post') }}">
        @csrf
        <!-- title -->
        <div class="my-4">
            <label for="title">
                <h5>Title</h5>
                <input id="title" class="block mt-1 w-full" type="text" name="title" value="{{old('title')}}" required autofocus />
            </label>
        </div>

        <!-- excerpt -->
        <div class="my-4">
            <label for="excerpt">
                <h5>Excerpt</h5>
                <input id="excerpt" class="block mt-1 w-full" type="text" name="excerpt" value="{{old('excerpt')}}" required autofocus />
            </label>
        </div>

        <!-- body -->
        <div class="my-4">
            <label for="summernote">
                <h5>Body</h5>
                <textarea id="summernote" name="body">{{old('body')}}</textarea>
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
        <button class="btn btn-success" type="submit">Save</button>
    </form>
    
</x-admin>