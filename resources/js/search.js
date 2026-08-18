export const initialiseSearchForms = () => {
    document.querySelectorAll("[data-search-form]").forEach((form) => {
        const input = form.querySelector('input[type="search"]');
        const clearButton = form.querySelector("[data-search-clear]");

        const updateClearButton = () => {
            const hasValue = Boolean(input?.value);
            clearButton?.classList.toggle("hidden", !hasValue);
            clearButton?.classList.toggle("inline-flex", hasValue);
        };

        input?.addEventListener("input", updateClearButton);
        clearButton?.addEventListener("click", () => {
            if (!input) {
                return;
            }

            input.value = "";
            input.focus();
            updateClearButton();
        });

        updateClearButton();

        if (!form.getAttribute("action")) {
            form.setAttribute("action", "/search-articles");
        }

        if (!form.getAttribute("method")) {
            form.setAttribute("method", "get");
        }
    });
};
