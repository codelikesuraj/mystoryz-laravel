<x-public>
	<x-slot name="title">Home</x-slot>
	
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
                    <!-- Ad Space-->
                    <div class="card mb-4">
                        <div class="card-header">Ad Space</div>
                        <div class="card-body">You can put anything you want inside of these space. They are meant for possible ads and   other contents for the website</div>
                    </div>
                </div>
            </div>
        </div>
</x-public>
