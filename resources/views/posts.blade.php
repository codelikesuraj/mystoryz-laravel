<x-public>
	<x-slot name="title">Home</x-slot>

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
		                <div class="small text-muted">{{ $posts[0]->created_at->diffForHumans() }}</div>
		                <h2 class="card-title">{{ $posts[0]->title }}</h2>
		                <p class="card-text">{!! $posts[0]->excerpt !!}</p>
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
		                  <div class="small text-muted">{{$post->created_at->diffForHumans()}}</div>
		                  <h2 class="card-title h4">{{$post->title}}</h2>
		                  <p class="card-text">{{ $post->excerpt }}</p>
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
          <!-- Search widget-->
          <div class="card mb-4">
              <div class="card-header">Search</div>
              <div class="card-body">
                  <div class="input-group">
                      <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                      <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                  </div>
              </div>
          </div>
          <!-- Categories widget-->
          <div class="card mb-4">
              <div class="card-header">Categories</div>
              <div class="card-body">
                  <div class="row">
                      <div class="col-sm-6">
                          <ul class="list-unstyled mb-0">
                              <li><a href="#!">Web Design</a></li>
                              <li><a href="#!">HTML</a></li>
                              <li><a href="#!">Freebies</a></li>
                          </ul>
                      </div>
                      <div class="col-sm-6">
                          <ul class="list-unstyled mb-0">
                              <li><a href="#!">JavaScript</a></li>
                              <li><a href="#!">CSS</a></li>
                              <li><a href="#!">Tutorials</a></li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
          <!-- Side widget-->
          <div class="card mb-4">
              <div class="card-header">Side Widget</div>
              <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
          </div>
      </div>
    </div>
  </div>

</x-public>