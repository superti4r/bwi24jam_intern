import { animateElement, motionConfig, prefersReducedMotion } from "./config";

const animateScale = (element, scale) => {
    if (prefersReducedMotion.matches) {
        return;
    }

    animateElement(
        element,
        { scale },
        {
            duration: motionConfig.interactionDuration,
            ease: "easeOut",
        },
    );
};

const bindInteraction = (element) => {
    element.addEventListener("pointerenter", () =>
        animateScale(element, 1.015),
    );
    element.addEventListener("pointerleave", () => animateScale(element, 1));
    element.addEventListener("pointerdown", () => animateScale(element, 0.98));
    element.addEventListener("pointerup", () => animateScale(element, 1.015));
    element.addEventListener("pointercancel", () => animateScale(element, 1));
    element.addEventListener("focus", () => animateScale(element, 1.015));
    element.addEventListener("blur", () => animateScale(element, 1));
};

export const initialiseMotionInteractions = () => {
    document
        .querySelectorAll("[data-motion-interaction]")
        .forEach(bindInteraction);
};
