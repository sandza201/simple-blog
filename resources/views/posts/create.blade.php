<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-12">
        <x-forms.form method="post" action="{{ route('posts.store') }}">
            <div class="bg-white shadow-sm sm:rounded-lg p-6 border flex flex-col gap-6">
                <div class="flex flex-col">
                    <x-forms.input-label value="title" required/>
                    <x-forms.text-input name="title" value="{{ old('title') }}" required maxlength="255" />
                </div>

                <x-forms.select-multiple :$categories />

                <div>
                    <x-forms.input-label value="body" required />
                    <x-forms.rich-text name="body" required />
                </div>
            </div>
            <div class="flex flex-row gap-4 items-center mt-4">
                <x-primary-button>Save</x-primary-button>

                <a href="{{ route('posts.index') }}">
                    <x-secondary-button>Cancel</x-secondary-button>
                </a>
            </div>
        </x-forms.form>
    </div>
</x-app-layout>
