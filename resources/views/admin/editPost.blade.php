<x-admin>
    <x-slot name="head">
        <!--summer note WYSIWYG editor -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
        <style>
            input, textarea{
                font-weight: normal;
            }
        </style>
    </x-slot>

    <x-slot name="title">Edit</x-slot>

    <h1>Edit Post</h1>
    
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('update-post') }}">
        @csrf
        <input type="hidden" name="post_id" value="{{$post->id}}">
        <!-- title -->
        <div class="my-4 form-group">
            <label for="title">
                <h5>Title</h5>
                <input id="title" class="form-control" type="text" name="title" value="{{null !== old('title') ? old('title') :  $post->title}}" required readonly />
            </label>
        </div>

        <!-- excerpt -->
        <div class="my-4 form-group">
            <label for="excerpt">
                <h5>Excerpt</h5>
                <textarea id="excerpt" class="form-control" name="excerpt" required rows="4" cols="50" maxlength="512">{{null !== old('excerpt') ? old('excerpt') : $post->excerpt}}</textarea>
            </label>
        </div>

        <!-- body -->
        <div class="my-4 form-group">
            <label for="summernote">
                <h5>Body</h5>
                <textarea class="form-control" id="summernote" name="body">{{null !== old('body') ? old('body') : $post->body}}</textarea>
                <script>
                  $('#summernote').summernote({
                    tabsize: 2,
                    height: 400
                  });
                </script>
            </label>
        </div>

        <!-- visibility -->
        <div class="my-4 form-group">
            <h5>Visibility</h5>
            <label for="v-public">
                <input id="v-public" type="radio" name="visibility" value="public"> Published
            </label>&nbsp;&nbsp;
            <label for="v-hidden">
                <input id="v-hidden" type="radio" name="visibility" value="hidden" checked> Hidden
            </label>
        </div>

        <!-- submit -->
        <div class="form-group">
            <button class="btn btn-success" type="submit">Update</button>
        </div>
    </form>
</x-admin>