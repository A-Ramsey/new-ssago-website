<div class="col">
    <div class="bg-light p-4 rounded row @if($small) w-50 @else @endif mx-auto">
        <h1>{{ $title }}</h1>
        <form method="{{ $method }}" action="{{ $action }}" class="form" id="{{ $name }}">
            @csrf
            {{ $slot }}
        </form>
    </div>
</div>