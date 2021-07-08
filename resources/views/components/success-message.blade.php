@if (session('message'))
    <div {{ $attributes }}>
        <div class="alert-title font demibold text-lg text-green-800">
            {{ __('Success') }}
        </div>

        <div class="alert-description text-sm text-green-600">
            {{ session('message') }}
        </div>
    </div>
@endif
