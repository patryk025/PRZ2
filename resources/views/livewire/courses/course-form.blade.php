<div class="p-2">
    <form wire:submit.prevent="save">
        <h3 class="font-semibold text-xl text-gray-800 leadin-tight">
            @if ($editMode)
                {{ __('Edytuj kurs') }}
            @else
                {{ __('Utwórz kurs') }}
            @endif
        </h3>
        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="name">{{ __('Nazwa') }}</label>
            </div>
            <div class="">
                <x-input placeholders="{{ __('translation.enter') }}" wire:model="course.name" />
            </div>
        </div>
        <hr class="my-2">
        <div class"flex justify-end pt-2">
            <x-button href="{{ route('courses.index') }}" seconday class="mr-2" label="{{ __('translation.back') }}" />
            <x-button type="submit" primary label="{{ __('translation.save') }}" spinner />
    </form>
</div>