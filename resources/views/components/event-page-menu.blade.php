<div class="d-flex justify-content-left">
    <ul class="list-group">
        @foreach ($eventPages as $eventPage)
            <li class="list-group-item">
                <a href="{{ route('event-pages.show', ['eventId' => $event->id, 'eventPageId' => $eventPage->id]) }}">
                    {{ $eventPage->title }}
                </a>
            </li>
        @endforeach
    </ul>
</div>