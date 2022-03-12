<x-admin>
    <x-slot name="title">Admin</x-slot>
        
    <h1>Dashboard</h1>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="card my-4">
        <div class="card-header">
            <span class="fs-4"><i class="fas fa-table me-1"></i> <strong>POSTS</strong></span>
        </div>
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Published</th>
                    <th>Last modified</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Published</th>
                    <th>Last modified</th>
                    <th colspan="2">Action</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{ucfirst($post->visibility)}}</td>
                        <td>{{$post->created_at}}</td>
                        <td>{{$post->updated_at}}</td>
                        <td>
                            <a href="{{route('edit-post', ['post'=>$post->slug])}}">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        </td>
                        <td><a href="#"><i class="fas fa-trash"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin>