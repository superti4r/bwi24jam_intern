import Quill from 'quill';
import 'quill/dist/quill.snow.css';

export const initialiseQuillEditors = () => {
    document.querySelectorAll('[data-quill-editor]').forEach((container) => {
        const input = document.querySelector(container.dataset.quillInput);
        const editor = new Quill(container, { theme: 'snow', modules: { toolbar: [['bold', 'italic', 'underline'], [{ header: [2, 3, false] }], [{ list: 'ordered' }, { list: 'bullet' }], ['blockquote', 'link']] } });
        if (input?.value) editor.root.innerHTML = input.value;
        container.closest('form')?.addEventListener('submit', () => { if (input) input.value = editor.root.innerHTML; });
    });
};
