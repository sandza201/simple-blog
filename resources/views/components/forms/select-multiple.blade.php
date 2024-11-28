@props(['categories' => [], 'selected' => []])

<div class="relative" x-data="multiSelect()">
    <x-forms.input-label value="categories" required />
    <div class="mt-1 relative">
        <button type="button" @click="open = !open"
            class="relative w-full bg-white border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary sm:text-sm">
            <span class="block truncate"
                x-text="selectedOptions.length ? selectedOptions.map(id => getOptionTitle(id)).join(', ') : 'Select options'"></span>
            <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </span>
        </button>

        <div x-show="open" @click.away="open = false"
            class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-60 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm"
            style="display: none;">
            <template x-for="option in options" :key="option.id">
                <div @click="toggleOption(option)"
                    class="cursor-pointer select-none relative py-2 pl-3 pr-9 hover:bg-gray-100 hover:text-black">
                    <span x-text="option.title" :class="{ 'font-semibold': selectedOptions.includes(option.id) }"
                        class="block truncate"></span>
                    <span x-show="selectedOptions.includes(option.id)"
                        class="absolute inset-y-0 right-0 flex items-center pr-4 text-primary hover:text-white">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </div>
            </template>
        </div>
    </div>

    <select name="categories[]" x-model="selectedOptions" multiple class="hidden">
        <template x-for="option in options" :key="option.id">
            <option :value="option.id" x-bind:selected="selectedOptions.includes(option.id)">
            </option>
        </template>
    </select>

    @error('categories')
        <span class="text-red-600 text-sm mt-2">{{ $message }}</span>
    @enderror

</div>

<script>
    function multiSelect() {
        return {
            open: false,
            options: @json($categories->map(fn($category) => ['id' => $category->id, 'title' => $category->title])->toArray()),
            selectedOptions: @json($selected ? $selected->pluck('id')->toArray() : []),

            toggleOption(option) {
                if (this.selectedOptions.includes(option.id)) {
                    this.selectedOptions = this.selectedOptions.filter(item => item !== option.id);
                } else {
                    this.selectedOptions.push(option.id);
                }
            },

            getOptionTitle(id) {
                const option = this.options.find(option => option.id === id);
                return option ? option.title : '';
            }
        };
    }
</script>
