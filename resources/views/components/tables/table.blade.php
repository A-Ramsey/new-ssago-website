<table class="table">
    @if(count($headers) != 0)
        <thead>
            <tr>
                @foreach ($headers as $header)
                    <th scope="col">{{ $header }}</th>
                @endforeach
            </tr>
        </thead>
    @endif
    <tbody>
        {{ $slot }}
    </tbody>
</table>