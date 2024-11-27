import './bootstrap';

import Alpine from 'alpinejs';
import { Editor } from '@tiptap/core';
import StarterKit from '@tiptap/starter-kit';

document.addEventListener('alpine:init', () => {
    Alpine.data('editor', (content) => {
        let editor;

        return {
            updatedAt: Date.now(),
            editorContent: content, // Hold the editor content

            // Initialize the editor
            init() {
                const _this = this;

                editor = new Editor({
                    element: this.$refs.element,
                    extensions: [StarterKit],
                    content: content,
                    onCreate({ editor }) {
                        _this.updatedAt = Date.now();
                        _this.editorContent = editor.getHTML(); // Capture initial content
                    },
                    onUpdate({ editor }) {
                        _this.updatedAt = Date.now();
                        _this.editorContent = editor.getHTML(); // Update content on changes
                    },
                    onSelectionUpdate({ editor }) {
                        _this.updatedAt = Date.now();
                    },
                });
            },

            // Check if the editor is loaded
            isLoaded() {
                return editor;
            },

            // Toggle heading style
            toggleHeading(opts) {
                editor.chain().toggleHeading(opts).focus().run();
            },

            // Toggle bold style
            toggleBold() {
                editor.chain().focus().toggleBold().run();
            },

            // Toggle italic style
            toggleItalic() {
                editor.chain().toggleItalic().focus().run();
            },
        };
    });
});

window.Alpine = Alpine;
Alpine.start();
