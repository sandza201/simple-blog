<!-- Starts component -->
<div class="w-full mx-auto mt-6 border-t  border-neutral-200  pt-12" x-data="{
    selectedCategories: $categories,
    categories: [],
    addTag(tag) {
        if (tag.trim() !== '') {
            this.selectedCategories.push(tag.trim());
        }
    },
    removeTag(index) {
        this.selectedCategories.splice(index, 1);
    }
}">
    <!-- Tag Input -->
    <div class="w-full" x-data="{ newCategory: '', selectedCategories: [] }">
        <!-- Input Field -->
        <input name="{{ $name }}" x-model="newCategory"
            @keydown.enter.prevent="
    if (newCategory.trim() !== '') {
        selectedCategories.push(newCategory.trim());
        newCategory = '';
    }
"
            class="w-full border-gray-300 rounded-md focus:border-orange-500 focus:ring-orange-500 mt-1" type="text"
            placeholder="Add tags (press Enter to add)" />
        <!-- Existing Tags -->
        <div class="mt-4 flex gap-2 flex-wrap">
            <template x-for="(tag, index) in selectedCategories" :key="index">
                <div
                    class="inline-flex items-center gap-x-0.5 rounded-md bg-orange-50 px-2 py-1 text-xs font-medium text-orange-700 ring-1 ring-inset ring-orange-700/10">
                    <span x-text="tag"></span>
                    <button @click="tags.splice(index, 1)" class="ml-2">
                        <svg class="h-4 w-4 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </template>
        </div>
    </div>
</div>
<!-- Ends component -->
