const mediaQuery = window.matchMedia("(prefers-color-scheme: dark)");

export function applyTheme() {
    const isDark =
        localStorage.theme === "dark" ||
        (!("theme" in localStorage) && mediaQuery.matches);

    document.documentElement.classList.toggle("dark", isDark);
}

export function setTheme(theme) {
    if (theme === "system") {
        localStorage.removeItem("theme");
    } else {
        localStorage.theme = theme;
    }

    applyTheme();
}

mediaQuery.addEventListener("change", () => {
    if (!("theme" in localStorage)) {
        applyTheme();
    }
});
