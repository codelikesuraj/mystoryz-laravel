<x-public>
	<x-slot name="title">MyStoryz | Home</x-slot>
	<x-slot name="description">A platform for reading comprehension passage extracts from English Textbooks</x-slot>

	<!-- Under construction header -->
	@include('layouts.under-construction')
	
	<!-- Page header with logo and tagline-->
  @include('layouts.public-header')

  <!-- Page content-->
  <div class="container">
    <div class="row">

      <!-- Blog entries-->
    	@if($posts->count() > 0)
	      <div class="col-lg-8">
	        <!-- Featured blog post-->
	        <div class="card mb-4">
	            <a href="#!"><img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg" alt="..." /></a>
	            <div class="card-body">
                <h2 class="card-title">{{ $posts[0]->title }}</h2>
	            	<div class="d-flex justify-content-between mb-2">
	                <div class="small text-muted">Published {{ $posts[0]->created_at->diffForHumans() }} </div>
	                <div class="small text-muted d-flex align-items-center">
	                	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
										  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
										  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
										</svg>
	                	&nbsp;Views: {{$posts[0]->views}}
	                </div>
	              </div>
                <p class="fs-6 card-text">{!! $posts[0]->excerpt !!}</p>
                <a class="btn btn-primary" href="{{route('post', ['post'=>$posts[0]->slug])}}">Read more →</a>
	            </div>
	        </div>
	        
	        @if($posts->count() > 1)
	        <!-- Nested row for non-featured blog posts-->
	        <div class="row">
	          @foreach($posts->skip(1) as $post)
	           	<div class="col-lg-6">
	              <!-- Blog post-->
	              <div class="card mb-4">
	                <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
	                <div class="card-body">
	                  <h2 class="card-title h4">{{$post->title}}</h2>
	                	<div class="d-flex justify-content-between mb-2">
	                  	<div class="small text-muted">Published {{$post->created_at->diffForHumans()}}</div>
	                  	<div class="small text-muted d-flex align-items-center">
			                	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
												  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
												  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
												</svg>
	                			&nbsp;Views: {{$post->views}}
	                		</div>
	                	</div>
	                  <p class="fs-6 card-text">{{ $post->excerpt }}</p>
	                  <a class="btn btn-primary" href="{{route('post', ['post'=>$post->slug])}}">Read more →</a>
	                </div>
	              </div>
	            </div>
	           @endforeach
	        </div>
	        @endif

	        <!-- Pagination -->
	        <div class="pagination justify-content-center my-3">
	        		{!! $posts->links() !!}
	        </div>
	      </div>
	    @endif


      
      <!-- Side widgets-->
      <div class="col-lg-4">
          <!-- Search post -->
          <x-search-widget />

          <!-- Most recent posts-->
          <x-recent-post :posts="$recent_posts"/>
      </div>
    </div>
  </div>

</x-public>