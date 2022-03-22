<x-public>
	<x-slot name="title">{{$post->title}}</x-slot>
  <x-slot name="description">{{$post->excerpt}}</x-slot>

  <!-- Under construction header -->
  @include('layouts.under-construction')

  <!-- Page content-->
  <div class="container mt-5">
    <div class="row">
      <div class="col-lg-8">
        <!-- Go back home -->
        <nav class="nav ustify-content-start">
          <div class="row">
            <div class="col-12 mb-4">
              @php
                $routeName = Route::currentRouteName();
                $nav_message = $routeName == 'preview-post' ? 'Back to Admin' : 'Go back Home';
              @endphp

              @if($routeName == 'preview-post')
                <a class="page-link" href="{{route('admin')}}">
              @else
                <a class="page-link" href="{{route('home')}}">
              @endif
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>
                {{$nav_message}}
              </a>
            </div>
          </div>
        </nav>

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
         <section class="mb-4">{!! $post->body !!}</section>
       </article>

       <!-- Next and Previous post -->
       <nav class="pagination justify-content-between mb-4">
        <div>
          @if($previous_post != null)
          <a class="page-link" href="{{route('post', ['post'=>$previous_post->slug])}}" rel="prev">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
            </svg>
            <span class="fw-bold">Previous</span>
          </a>
          @endif
        </div>
        <div>
          @if($next_post != null)
          <a class="page-link" href="{{route('post', ['post'=>$next_post->slug])}}" rel="next">
            <span class="fw-bold">Next</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
            </svg>
          </a>
          @endif
        </div>
      </nav>
    </div>

    <!-- Side widgets-->
    <div class="col-lg-4">
      <!-- Most recent posts-->
      <x-recent-post :posts="$recent_posts"/>
    </div>
  </div>
</div>
</x-public>
