<x-admin>
    <x-slot name="head">
        <!--summer note WYSIWYG editor -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
        <style>
            input{
                font-weight: normal;
            }
        </style>
    </x-slot>

    <x-slot name="title">Create</x-slot>

    <h1>Create Post</h1>
    
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('save-post') }}">
        @csrf

        <!-- title -->
        <div class="my-4 form-group">
            <label for="title">
                <h3>Title</h3>
                <input class="form-control" id="title" type="text" name="title" value="{{old('title')}}" required autofocus />
            </label>
        </div>

        <!-- excerpt -->
        <div class="my-4 form-group">
            <label for="excerpt">
                <h3>Excerpt</h3>
                <textarea class="form-control" id="excerpt" name="excerpt" required rows="4" cols="50" maxlength="512">{{old('excerpt')}}</textarea>
            </label>
        </div>

        <!-- body -->
        <div class="my-4">
            <label for="summernote">
                <h3>Body</h3>
                <textarea id="summernote" name="body">{{old('body')}}</textarea>
                <script>
                  $('#summernote').summernote({
                    tabsize: 2,
                    height: 400,
                  });
                </script>
            </label>
        </div>

        <!-- visibility -->
        <div class="my-4 form-group">
            <h3>Visibility</h3>
            <label for="v-public">
                <input id="v-public" type="radio" name="visibility" value="public"> Published
            </label>&nbsp;&nbsp;
            <label for="v-hidden">
                <input id="v-hidden" type="radio" name="visibility" value="hidden" checked> Hidden
            </label>
        </div>

        <!-- submit -->
        <div class="form-group">
            <button class="btn btn-success" type="submit">Save</button>
        </div>
    </form>
    
</x-admin>