<div class="card bg-light col m-2 w-25">
    {{-- <img src="..." class="card-img-top" alt="..."> --}}
    <div class="card-body">
      <h5 class="card-title">{{ $event->name }}</h5>
      <h6 class="card-text">{{ date('d/m/Y H:i', strtotime($event->start)) }} - {{ $event->location}}</h6>
      <hr>
      <p class="card-text">{{ $event->description }}</p>
      <a href="{{ route('events.show', ['eventId' => $event->id]) }}" class="btn btn-primary">Find out more!</a>
    </div>
  </div>