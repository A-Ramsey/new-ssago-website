<div class="card bg-light col m-2 w-25">
    {{-- <img src="..." class="card-img-top" alt="..."> --}}
    <div class="card-body">
      <h5 class="card-title">{{ $club->name }}</h5>
      <h6 class="card-text">{{ $club->short_name }} - {{ $club->location }}</h6>
      <hr>
      <p class="card-text">{{ $club->description }}</p>
      <a href="{{ route('clubs.show', ['id' => $club->id]) }}" class="btn btn-primary">Find out more!</a>
    </div>
  </div>