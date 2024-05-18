@props(['label' => 'label', 'id' => 'input'])
<div>
    <div class="flex items-center">
        <input type="checkbox" id="{{ $id }}" autocomplete="off"
            {{ $attributes->merge(['class' => 'cursor-pointer bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[22px] h-[22px]']) }}
            {{ $attributes }} />
        <label for="{{ $id }}"
            class="block text-sm font-medium text-stone-900 cursor-pointer pl-3">{{ $label }}</label>
    </div>
    <x-input-error for="{{ $attributes['wire:model'] ?? '' }}" class="mt-2"></x-input-error>
</div>
