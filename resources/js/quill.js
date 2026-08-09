import Quill from "quill";
import "quill/dist/quill.snow.css";

const editorElement = document.querySelector("[data-quill]");

if (editorElement) {
    const textarea = editorElement.closest("form")?.querySelector('textarea[name="content"]');

    const quill = new Quill(editorElement, {
        theme: "snow",
        modules: {
            toolbar: [
                [{ header: [1, 2, 3, false] }],
                ["bold", "italic", "underline", "strike"],
                [{ list: "ordered" }, { list: "bullet" }],
                ["link", "blockquote", "code-block"],
                ["clean"],
            ],
        },
    });

    const syncContent = () => {
        if (textarea) {
            textarea.value = quill.root.innerHTML;
        }
    };

    if (textarea?.value) {
        quill.clipboard.dangerouslyPasteHTML(textarea.value);
    }

    quill.on("text-change", syncContent);

    editorElement.closest("form")?.addEventListener("submit", syncContent);
}
