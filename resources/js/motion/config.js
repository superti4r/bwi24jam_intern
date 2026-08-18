import { animate } from "motion";

export const motionConfig = {
    interactionDuration: 0.18,
    drawerDuration: 0.3,
    easing: [0.16, 1, 0.3, 1],
};

export const prefersReducedMotion = window.matchMedia(
    "(prefers-reduced-motion: reduce)",
);
export const isDesktop = window.matchMedia("(min-width: 1024px)");

export const getDuration = (duration) =>
    prefersReducedMotion.matches ? 0 : duration;

export const animateElement = (element, keyframes, options = {}) =>
    animate(element, keyframes, options);
