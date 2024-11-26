@props(['value'])

<label for="{{ $value }}" {{ $attributes->merge(['class' => 'block font-medium text-sm text-black mb-2']) }}>
    {{ ucwords($value ?? $slot) }}
</label>
