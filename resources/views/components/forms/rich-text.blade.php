@props(['name', 'value' => ''])

<div x-data="editor('{!! $value !!}')" @editor-content-updated="updateBody">
    <template x-if="isLoaded()">
        <div class="border border-t-b-0 py-2 px-4 rounded-t-lg">
            <button type="button" @click="toggleHeading({ level: 1 })"
                :class="{ 'is-active': isActive('heading', { level: 1 }, updatedAt) }" class="px-4">
                H1
            </button>
            <button type="button" @click="toggleBold()" :class="{ 'is-active': isActive('bold', updatedAt) }"
                class="px-4">
                Bold
            </button>
            <button type="button" @click="toggleItalic()" :class="{ 'is-active': isActive('italic', updatedAt) }" class="px-4">
                Italic
            </button>
        </div>
    </template>

    <div x-ref="element" class="prose max-w-full"></div>

    <input type="hidden" name="{{ $name }}" :value="editorContent">
</div>

<style>
    button.is-active {
        background: black;
        color: white;
    }

    .tiptap {
        min-height: 600px;
        padding: 0.5rem 1rem;
        border: 1px solid #ccc;
    }
</style>
