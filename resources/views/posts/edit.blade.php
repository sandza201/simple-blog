<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-forms.form method="PUT" action="{{ route('posts.update', $post) }}">
            <div class="bg-white shadow-sm sm:rounded-lg p-6 border flex flex-col gap-6">
                <div class="flex flex-col">
                    <x-forms.input-label value="title" />
                    <x-forms.text-input name="title" value="{{ old('title') ?? $post->title }}" />
                </div>

                <x-forms.select-multiple :$categories :selected="$post->categories" />

                <x-forms.rich-text value="{{ $post->body }}" name="body" />

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
