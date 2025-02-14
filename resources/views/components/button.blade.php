@props([
    'label' => 'label',
    'labelClass' => '',
    'leftIcon' => '',
    'rightIcon' => '',
    'className' => '',
    'submit' => false,
    'button' => false,
    'routePath' => '',
    'closeModal' => false,
    'openModal' => false,
    'primary' => false,
    'secondary' => false,
    'tertiary' => false,
    'onClick' => '', // New: JavaScript function or event handler
    'name' => '',
    'loading' => false,
    'disabled' => false,
    'showLabel' => false,
    'big' => false,
    'params' => [],
])

@php
    $primaryClasses =
        'px-16 py-3 rounded-full relative overflow-hidden font-medium text-white flex items-center justify-center gap-2 animate-transition bg-gradient-to-r from-custom-orange via-custom-orange/70 to-custom-red hover:bg-custom-red disabled:opacity-50 lg:text-sm text-xs';
    $secondaryClasses =
        'px-16 py-3 border rounded-full hover:bg-white border-white hover:text-custom-orange animate-transition flex items-center justify-center lg:text-sm text-xs';
    $tertiaryClasses =
        'px-16 py-3 border rounded-full text-custom-orange hover:border-custom-orange animate-transition flex items-center justify-center gap-2 lg:text-sm text-xs';

    // Assign correct classes based on button type
    $buttonClass = $primary ? $primaryClasses : ($secondary ? $secondaryClasses : ($tertiary ? $tertiaryClasses : ''));

@endphp

<!-- Main Button -->
{{-- disable this button --}}
<button
    class="{{ $className }} {{ $buttonClass }} @if ($big) 'py-4 lg:text-lg sm:text-base text-sm' @endif"
    name="{{ $name }}"
    @if ($closeModal) data-pd-overlay="{{ $closeModal }}" data-modal-target="{{ $closeModal }}" @endif
    @if ($openModal) data-pd-overlay="# . {{ $openModal }}" data-modal-target="{{ $openModal }}" data-modal-toggle="{{ $openModal }}" @endif
    @if ($submit) type="submit" @elseif ($button) type="button" @endif
    @if ($onClick) onclick="{{ $onClick }}" @endif
    @if ($routePath) onclick="window.location.href='{{ route($routePath, $params) }}'" @endif>

    @if ($leftIcon)
        <span class="{{ $leftIcon }}"></span>
    @endif

    @if ($showLabel)
        <p class="md:block hidden">{{ $label }}</p>
    @else
        <p>{{ $label }}</p>
    @endif

    @if ($rightIcon)
        <span class="{{ $rightIcon }}"></span>
    @endif


</button>
