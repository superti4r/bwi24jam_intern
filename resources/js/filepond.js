import * as FilePond from "filepond";
import "filepond/dist/filepond.min.css";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";
import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css";

FilePond.registerPlugin(FilePondPluginImagePreview);

const fileInput = document.querySelector(".filepond");

if (fileInput) {
    const form = fileInput.closest("form");
    const hiddenPath = form?.querySelector('input[name="thumbnail_path"]');
    const uploadUrl = fileInput.dataset.uploadUrl;
    const removeUrl = fileInput.dataset.removeUrl;
    const existingPath = fileInput.dataset.existing;
    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        ?.getAttribute("content");

    const files = existingPath
        ? [
              {
                  source: existingPath,
                  options: { type: "local" },
              },
          ]
        : [];

    const server = {
        process: {
            url: uploadUrl,
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
                Accept: "application/json",
            },
        },
        load: (source, load, error, progress, abort) => {
            const xhr = new XMLHttpRequest();
            xhr.responseType = "blob";

            xhr.onload = () => {
                if (xhr.status >= 200 && xhr.status < 300) {
                    load(xhr.response);
                } else {
                    error(`Gagal memuat gambar: ${xhr.status}`);
                }
            };
            xhr.onerror = () => error("Gagal memuat gambar.");
            xhr.onprogress = (e) => {
                progress(e.lengthComputable, 0, e.loaded, e.total);
            };

            xhr.open("GET", source);
            xhr.send();

            return {
                abort: () => xhr.abort(),
            };
        },
        revert: null,
        restore: null,
        fetch: null,
    };

    const deleteThumbnail = (path) => {
        if (!removeUrl || !path) return;

        fetch(removeUrl, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
                Accept: "application/json",
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ path }),
        });
    };

    const pond = FilePond.create(fileInput, {
        allowMultiple: false,
        allowProcess: Boolean(uploadUrl),
        allowImagePreview: true,
        credits: false,
        files,
        server,
        onprocessfile: (error, file) => {
            if (error) return;

            let path = file.serverId;

            try {
                const parsed = JSON.parse(path);
                path = parsed.thumbnail ?? path;
            } catch {
                // keep raw server id
            }

            if (hiddenPath) {
                hiddenPath.value = path;
            }
        },
        onremovefile: (error, file) => {
            if (hiddenPath) {
                hiddenPath.value = "";
            }

            let path = null;

            if (file?.serverId) {
                path = file.serverId;

                try {
                    const parsed = JSON.parse(path);
                    path = parsed.thumbnail ?? path;
                } catch {
                    // keep raw server id
                }
            } else if (existingPath) {
                path = existingPath.replace(/^\/?storage\//, "");
            }

            deleteThumbnail(path);
        },
    });
}
