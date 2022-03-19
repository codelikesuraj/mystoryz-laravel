@props(['posts'])

<div class="card mb-4">
  <div class="card-header"><h2>Recent posts</h2></div>
  <div class="card-body">
    <div class="row">
      <div class="col-12">
        <ul class="list-unstyled mb-0">
          @foreach($posts as $post)
            <li class="my-2">
              <a class="fs-6 fw-bold" href="{{route('post', ['post'=>$post->slug])}}">
                {{$post->title}}
              </a>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>