import { animate, inView, stagger } from 'motion';

const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
const contactSocials = document.querySelector('[data-contact-socials]');

if (!reduceMotion && contactSocials) {
    const links = [...contactSocials.querySelectorAll('[data-contact-social-link]')];

    inView(contactSocials, () => {
        animate(links, { opacity: [0, 1], y: [16, 0] }, {
            delay: stagger(0.08),
            duration: 0.65,
            ease: [0.22, 1, 0.36, 1],
        });
    }, { amount: 0.2 });
}
