<div class="card mb-4">
  <div class="card-header"><h2>Search</h2></div>
  <div class="card-body">
    <div class="row">
      <div class="col-12">
        <form method="GET" action="{{route('home')}}">
          <div class="input-group">
            <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" name="search" value="{{request()->search}}" />
            <button class="btn btn-primary" id="button-search" type="submit">Go!</button>
            <a class="btn btn-danger" href="{{route('home')}}">Clear</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>