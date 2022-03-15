<x-public>
	<x-slot name="title">Home</x-slot>

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
		                <div class="small text-muted">Published {{ $posts[0]->created_at->diffForHumans() }}</div>
		                <h2 class="card-title">{{ $posts[0]->title }}</h2>
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
		                  <div class="small text-muted">Published {{$post->created_at->diffForHumans()}}</div>
		                  <h2 class="card-title h4">{{$post->title}}</h2>
		                  <p class="fs-6 card-text">{{ $post->excerpt }}</p>
		                  <a class="btn btn-primary" href="{{route('post', ['post'=>$post->slug])}}">Read more →</a>
		                </div>
		              </div>
		            </div>
		           @endforeach
		        </div>
		        @endif
		      </div>
		    @endif
      
      <!-- Side widgets-->
      <div class="col-lg-4">
          <!-- Ad space-->
          <div class="card mb-4">
              <div class="card-header">Ad Space</div>
              <div class="card-body">You can put anything you want inside of these space. They are meant for possible ads and other contents for the website</div>
          </div>
      </div>
    </div>
  </div>

</x-public>