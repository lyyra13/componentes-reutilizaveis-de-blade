@props(['title' => 'Confirmar ação'])

<div class="card p-5 text-center shadow-sm">
    <div class="mb-3">
        <i class="fa-solid fa-triangle-exclamation
                  text-warning fa-3x"></i>
    </div>

    <h4 class="text-info mb-3">
        {{ $title }}
    </h4>

    <div class="text-secondary mb-3">
        {{ $slot }}
    </div>

    {{ $footer ?? '' }}
</div>
