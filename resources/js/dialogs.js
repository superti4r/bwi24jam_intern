import { animateElement, getDuration, motionConfig, prefersReducedMotion } from './motion/config';

export const initialiseConfirmDialogs = () => {
    document.querySelectorAll('[data-confirm-dialog]').forEach((dialog) => {
        const panel = dialog.querySelector('[data-confirm-panel]');
        const closeButtons = dialog.querySelectorAll('[data-confirm-close]');
        let lastFocusedElement = null;

        const close = () => {
            animateElement(panel, { opacity: [1, 0], y: [0, 12] }, { duration: getDuration(motionConfig.interactionDuration), ease: motionConfig.easing }).then(() => {
                dialog.hidden = true;
                lastFocusedElement?.focus();
            });
        };

        const open = (event) => {
            lastFocusedElement = event.currentTarget;
            dialog.hidden = false;
            animateElement(panel, { opacity: [0, 1], y: [prefersReducedMotion.matches ? 0 : 12, 0] }, { duration: getDuration(motionConfig.drawerDuration), ease: motionConfig.easing });
            panel.querySelector('button, input, select, textarea')?.focus();
        };

        closeButtons.forEach((button) => button.addEventListener('click', close));
        dialog.addEventListener('click', (event) => { if (event.target === dialog) close(); });
        document.addEventListener('keydown', (event) => { if (event.key === 'Escape' && !dialog.hidden) close(); });
        document.querySelectorAll(`[data-confirm-open="${dialog.dataset.confirmDialog}"]`).forEach((button) => button.addEventListener('click', open));
    });
};
