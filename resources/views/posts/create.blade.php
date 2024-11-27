<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-forms.form method="post" action="{{ route('posts.store') }}">
            <div class="bg-white shadow-sm sm:rounded-lg p-6 border flex flex-col gap-6">
                <div class="flex flex-col">
                    <x-forms.input-label value="title" />
                    <x-forms.text-input name="title" value="{{ old('title') }}" />
                </div>

                {{-- <div class="flex flex-col">
                    <x-forms.input-label value="body" />
                    <x-forms.textarea name="body" value="{{ old('body') }}" />
                </div> --}}

                <x-forms.select-multiple :$categories />

                <x-forms.input-label value="body" />
                <div x-data="editor('<p>Hello world! :-)</p>')" @editor-content-updated="updateBody">
                    <template x-if="isLoaded()">
                        <div class="menu">
                            <button type="button" @click="toggleHeading({ level: 1 })"
                                :class="{ 'is-active': isActive('heading', { level: 1 }, updatedAt) }">
                                H1
                            </button>
                            <button type="button" @click="toggleBold()"
                                :class="{ 'is-active': isActive('bold', updatedAt) }">
                                Bold
                            </button>
                            <button type="button" @click="toggleItalic()"
                                :class="{ 'is-active': isActive('italic', updatedAt) }">
                                Italic
                            </button>
                        </div>
                    </template>

                    <div x-ref="element" class="prose max-w-full"></div>

                    <!-- Hidden input to hold the editor content -->
                    <input type="hidden" name="body" :value="editorContent">
                </div>
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

<style>
    button.is-active {
        background: black;
        color: white;
    }

    .tiptap {
        min-height: 600px;
        padding: 0.5rem 1rem;
        margin: 1rem 0;
        border: 1px solid #ccc;
    }
</style>
