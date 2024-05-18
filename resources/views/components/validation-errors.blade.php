@if ($errors->any())
    <div {{ $attributes }} class=>
        <div class="font-medium text-red-600">{{ __('Whoops! Ocurrio un problema!') }}</div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
