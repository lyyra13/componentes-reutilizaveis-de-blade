@props([
    'href' => null,
    'icon' => null,
    'variant' => 'secondary',
    'type' => 'button',
])

@php
    $variants = [
        'primary',
        'secondary',
        'success',
        'danger',
        'warning',
        'info',
        'light',
        'dark',
        'outline-secondary',
        'outline-danger',
    ];

    $variant = in_array($variant, $variants)
        ? $variant
        : 'secondary';
@endphp

@if ($href)
    <a href="{{ $href }}"
       {{ $attributes->merge([
           'class' => "btn btn-$variant"
       ]) }}>
        @if ($icon)
            <i class="{{ $icon }} me-2"></i>
        @endif

        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}"
            {{ $attributes->merge([
                'class' => "btn btn-$variant"
            ]) }}>
        @if ($icon)
            <i class="{{ $icon }} me-2"></i>
        @endif

        {{ $slot }}
    </button>
@endif