@props(['type' => 'info'])

@php
    $classes = [
        'success' => 'alert-success',
        'error' => 'alert-danger',
        'warning' => 'alert-warning',
        'info' => 'alert-info',
    ];

    $class = $classes[$type] ?? $classes['info'];
@endphp

<div {{ $attributes->merge(['class' => "alert $class"]) }}
     role="alert">
    {{ $slot }}
</div>

