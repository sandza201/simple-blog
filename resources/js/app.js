import './bootstrap';

import Alpine from 'alpinejs';
import { Editor } from '@tiptap/core';
import StarterKit from '@tiptap/starter-kit';

document.addEventListener('alpine:init', () => {
    Alpine.data('editor', (content) => {
        let editor;

        return {
            updatedAt: Date.now(),
            editorContent: content,

            init() {
                const _this = this;

                editor = new Editor({
                    element: this.$refs.element,
                    extensions: [StarterKit],
                    content: content,
                    onCreate({ editor }) {
                        _this.updatedAt = Date.now();
                        _this.editorContent = editor.getHTML();
                        if (editor.getHTML()=== '<p></p>') _this.editorContent = ''
                    },
                    onUpdate({ editor }) {
                        _this.updatedAt = Date.now();
                        _this.editorContent = editor.getHTML();
                        if (editor.getHTML()=== '<p></p>') _this.editorContent = 'sss'
                    },
                    onSelectionUpdate({ editor }) {
                        _this.updatedAt = Date.now();
                    },
                });
            },

            isActive(type, opts = {}) {
                return editor.isActive(type, opts)
            },

            isLoaded() {
                return editor;
            },

            toggleHeading(opts) {
                editor.chain().toggleHeading(opts).focus().run();
            },

            toggleBold() {
                editor.chain().focus().toggleBold().run();
            },

            toggleItalic() {
                editor.chain().toggleItalic().focus().run();
            },
        };
    });
});

window.Alpine = Alpine;
Alpine.start();
