<x-public>
	<x-slot name="title">{{$post->title}}</x-slot>
    <x-slot name="description">{{$post->excerpt}}</x-slot>
	
    <!-- Under construction header -->
    @include('layouts.under-construction')
    
    <!-- Page content-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1">{{$post->title}}</h1>
                            <!-- Post meta content-->
                            <div class="small text-muted my-2">
                            	Published {{$post->created_at->diffForHumans()}} by 
                            	{{ ucwords($author->firstName.' '.$author->lastName) }}
                            </div>
                        </header>
                        
                        <!-- Preview image figure-->
                        <figure class="mb-4"><img class="img-fluid rounded" src="https://dummyimage.com/900x400/ced4da/6c757d.jpg" alt="..." /></figure>
                        
                        <!-- Post content-->
                        <section class="mb-5">{!! $post->body !!}</section>
                    </article>
                </div>
                
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Most recent posts-->
                    <x-recent-post :posts="$recent_posts"/>
                </div>
            </div>
        </div>
</x-public>
