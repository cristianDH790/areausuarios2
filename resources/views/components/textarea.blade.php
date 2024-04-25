@props(['placeholder' => ''])
<textarea
    {{ $attributes->merge(['class' => ' py-2 px-3 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) }}
    placeholder="{{ $placeholder }}">{{ $slot }}</textarea>
