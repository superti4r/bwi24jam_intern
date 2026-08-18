import { animateElement, getDuration, isDesktop, motionConfig } from "./config";

const initialiseAppMenu = () => {
    const menu = document.querySelector("[data-app-menu]");

    if (!menu) {
        return;
    }

    const trigger = menu.querySelector("[data-menu-trigger]");
    const drawer = menu.querySelector("[data-menu-drawer]");
    const backdrop = menu.querySelector("[data-menu-backdrop]");
    const closeButton = menu.querySelector("[data-menu-close]");
    const menuLinks = menu.querySelectorAll("[data-menu-link]");
    let isOpen = false;

    const setState = (open) => {
        isOpen = open;
        trigger?.setAttribute("aria-expanded", String(open));
        drawer?.setAttribute("data-open", String(open));
        drawer?.setAttribute("aria-hidden", String(!open));

        if (open) {
            backdrop?.removeAttribute("hidden");
            drawer?.removeAttribute("hidden");
        }
    };

    const animateDrawer = (open) => {
        const property = isDesktop.matches ? "x" : "y";
        const hiddenValue = isDesktop.matches ? "-100%" : "100%";
        const visibleValue = "0%";

        return animateElement(
            drawer,
            {
                [property]: open
                    ? [hiddenValue, visibleValue]
                    : [visibleValue, hiddenValue],
            },
            {
                duration: getDuration(motionConfig.drawerDuration),
                ease: motionConfig.easing,
            },
        );
    };

    const animateBackdrop = (open) => {
        if (!backdrop) {
            return;
        }

        animateElement(
            backdrop,
            { opacity: open ? [0, 1] : [1, 0] },
            {
                duration: getDuration(motionConfig.drawerDuration),
                ease: "easeOut",
            },
        );
    };

    const openMenu = () => {
        if (isOpen || !drawer) {
            return;
        }

        setState(true);
        animateDrawer(true);
        animateBackdrop(true);
    };

    const closeMenu = () => {
        if (!isOpen || !drawer) {
            return;
        }

        setState(false);
        animateBackdrop(false);

        animateDrawer(false).then(() => {
            if (!isOpen) {
                drawer.setAttribute("hidden", "");
                backdrop?.setAttribute("hidden", "");
            }
        });
    };

    trigger?.addEventListener("click", openMenu);
    closeButton?.addEventListener("click", closeMenu);
    backdrop?.addEventListener("click", closeMenu);
    menuLinks.forEach((link) => link.addEventListener("click", closeMenu));
    document.addEventListener("keydown", (event) => {
        if (event.key === "Escape") {
            closeMenu();
        }
    });

    drawer.setAttribute("hidden", "");
    drawer.setAttribute("aria-hidden", "true");
    backdrop?.setAttribute("hidden", "");
};

export { initialiseAppMenu };
