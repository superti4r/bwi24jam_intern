export const initialiseSectionFields = () => {
    document.querySelectorAll('[data-section-form]').forEach((form) => {
        const typeSelect = form.querySelector('[data-section-type]');
        const fieldGroups = form.querySelectorAll('[data-section-fields]');

        if (!typeSelect) {
            return;
        }

        const updateFields = () => {
            fieldGroups.forEach((group) => {
                const types = group.dataset.sectionFields.split(',');
                const isVisible = types.includes(typeSelect.value);

                group.hidden = !isVisible;
                group.querySelectorAll('input, textarea, select').forEach((input) => {
                    input.disabled = !isVisible;
                });
            });
        };

        typeSelect.addEventListener('change', updateFields);
        updateFields();
    });
};
