@auth
    @permission('event', $event)
        <h3>Booking Stages</h3>
        <x-cards.card-list justify-content="start">
            @foreach($eventBookingStages as $eventBookingStage)
                <div class="card bg-light col m-2 w-25">
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{ route('event-booking-stages.show', [$event->id, $eventBookingStage->id]) }}">{{ $eventBookingStage->name }}</a></h5>
                        <h6 class="card-text">{{ $eventBookingStage->type->key }}</h6>
                </div>
            </div>
            @endforeach
            <div class="card bg-light col m-2 w-25">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('event-booking-stages.create', $event->id) }}">Add Stage</a></h5>
                </div>
            </div>
        </x-cards.card-list>
    @endpermission
@endauth