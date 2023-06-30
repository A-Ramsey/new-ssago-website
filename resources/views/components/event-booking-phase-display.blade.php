<div class="d-flex justify-content-left">
    <div class="list-group">
        <div class="list-group-item">
            <h4>Booking Phases</h4>
        </div>
        @foreach ($eventBookingPhases as $eventBookingPhase)
            <div class="list-group-item">
                <h4>{{ $eventBookingPhase->title }}</h4>
                <p>Start: {{ date_format(date_create($eventBookingPhase->start), 'd/m/Y H:i') }}<br>
                End: {{ date_format(date_create($eventBookingPhase->end), 'd/m/Y H:i') }}<br>
                Cost: £{{ $eventBookingPhase->cost }}</p>

                <x-button name="edit" title="Edit" link="{{ route('event-booking-phases.edit', ['eventId' => $event->id, 'eventBookingPhaseId' => $eventBookingPhase->id]) }}" />
                <x-button name="delete" title="Delete" link="{{ route('event-booking-phases.delete', ['eventId' => $event->id, 'eventBookingPhaseId' => $eventBookingPhase->id]) }}" is-danger="true" />

            </div>
        @endforeach
        @auth
            @permission('event', $event)
                <div class="list-group-item">
                    <a href="{{ route('event-booking-phases.create', [$event->id]) }}"><i class="fa-solid fa-plus"></i> Create</a>
                </div>
            @endpermission
        @endauth
    </div>
</div>