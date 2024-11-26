<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-forms.form method="post" action="{{ route('posts.store') }}">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border flex flex-col gap-6">
                <div class="flex flex-col">
                    <x-forms.input-label value="title" />
                    <x-forms.text-input name="title" value="{{ old('title') }}" />
                </div>

                <div class="flex flex-col">
                    <x-forms.input-label value="body" />
                    <x-forms.textarea name="body" value="{{ old('body') }}" />
                </div>

                <div>
                    <x-forms.input-label value="categories" />
                    <select multiple="multiple" id="categories" name="categories[]"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option selected>Choose categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
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
