@props(['method' => 'GET', 'action' => ''])

@php
    $spoofMethod = '';
    $method = str($method)->upper();

    if ($method == 'PUT' || $method == 'PATCH' || $method == 'DELETE') {
        $spoofMethod = $method;
        $method = 'POST';
    }
@endphp

<div>
    <form method="{{ $method }}" action="{{ $action }}">
        @if ($spoofMethod)
            @method($spoofMethod)
        @endif
        @csrf
        {{ $slot }}
    </form>
</div>
