@props(['value', 'required' => false])

<label for="{{ $value }}" {{ $attributes->merge(['class' => 'block font-medium text-sm text-black mb-2']) }}>
    {{ ucwords($value ?? $slot) }}
    @if($required)
        <span class="text-red-500">*</span>
    @endif
</label>
