const copyText = async (text) => {
    if (navigator.clipboard?.writeText) {
        await navigator.clipboard.writeText(text);

        return;
    }

    const input = document.createElement("textarea");
    input.value = text;
    input.setAttribute("readonly", "");
    input.style.position = "fixed";
    input.style.opacity = "0";
    document.body.appendChild(input);
    input.select();
    document.execCommand("copy");
    input.remove();
};

export const initialiseShareTools = () => {
    document.querySelectorAll("[data-share-tools]").forEach((tools) => {
        const copyButton = tools.querySelector("[data-share-copy]");
        const shareUrl = tools.dataset.shareUrl;

        copyButton?.addEventListener("click", async () => {
            if (!shareUrl) {
                return;
            }

            const originalLabel = copyButton.textContent;

            try {
                await copyText(shareUrl);
                copyButton.textContent = "Tersalin";

                window.setTimeout(() => {
                    copyButton.textContent = originalLabel;
                }, 1800);
            } catch {
                copyButton.textContent = "Gagal menyalin";
            }
        });
    });
};
