<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold leading-tight">
            {{ __('Edit Category') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-forms.form method="PUT" action="{{ route('categories.update', $category) }}">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border flex flex-col gap-6">
                <div class="flex flex-col">
                    <x-forms.input-label value="title" />
                    <x-forms.text-input name="title" value="{{ old('title') ?? $category->title }}" />
                </div>
            </div>
            <div class="flex flex-row gap-4 items-center mt-4">
                <x-primary-button>Save</x-primary-button>

                <a href="{{ route('categories.index') }}">
                    <x-secondary-button>Cancel</x-secondary-button>
                </a>
            </div>
        </x-forms.form>
    </div>
</x-app-layout>
