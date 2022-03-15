<x-admin>
    <x-slot name="head"></x-slot>
    <x-slot name="title">Admin</x-slot>
        
    <h1>Dashboard</h1>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="card my-4">
        <div class="card-header">
            <span class="fs-4"><i class="fas fa-table me-1"></i> <strong>POSTS</strong></span>
        </div>
        <table id="datatablesPosts">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Author</th>
                    <th>Published</th>
                    <th>Last modified</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>S/N</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Author</th>
                    <th>Published</th>
                    <th>Last modified</th>
                    <th colspan="2">Action</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{ucfirst($post->visibility)}}</td>
                        <td>{{ucwords($post->author->firstName.' '.$post->author->lastName)}}</td>
                        <td>{{$post->created_at}}</td>
                        <td>{{$post->updated_at}}</td>
                        <td>
                            <a href="{{route('edit-post', ['post'=>$post->slug])}}">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        </td>
                        <td>
                            <a data-toggle="modal" href="#delete_{{$post->slug}}">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <div id="delete_{{$post->slug}}" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Delete Post</h4>
                              </div>
                              <div class="modal-body">
                                <p>Are you sure you want to delete <strong>"{{$post->title}}"</strong> ?</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn" data-dismiss="modal">Cancel</button>
                                <form method="POST" action="{{route('delete-post')}}">
                                    @csrf
                                    <input type="hidden" name="slug" value="{{$post->slug}}"/>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                              </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </tbody>
        </table>
    </div>

    <div class="card my-4" id="users">
        <div class="card-header">
            <span class="fs-4"><i class="fas fa-user me-1"></i> <strong>USERS</strong></span>
        </div>
        <table id="datatablesUsers">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Created</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>S/N</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Created</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ucwords($user->firstName.' '.$user->lastName)}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{ucfirst($user->role)}}</td>
                        <td>{{$user->created_at}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin>