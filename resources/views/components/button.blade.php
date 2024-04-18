@props(['color' => 'gray', 'primary' => '800', 'secondary' => '700'])

<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center bg-' . $color . '-' . $primary . ' border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-' . $color . '-' . $secondary . ' focus:bg-' . $color . '-' . $secondary . ' active:bg-' . $color . '-' . ($primary + 100) . ' focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
