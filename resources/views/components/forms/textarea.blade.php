@props(['name', 'value' => '', 'disabled' => false])

@php
    $class = $errors->has($name)
        ? 'border-red-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm'
        : 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm';
@endphp

<textarea id="{{ $name }}" name="{{ $name }}" rows="10" cols="10" @disabled($disabled)
    {{ $attributes->merge(['class' => $class]) }}>
    {{ $value }}
</textarea>

@error($name)
    <span class="text-red-600 text-sm mt-2">{{ $message }}</span>
@enderror
