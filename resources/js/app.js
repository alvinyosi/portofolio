import './bootstrap';
import './contact-socials.js';
import { animate, inView, stagger } from 'motion';

const initialLocationHash = window.location.hash;
const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

if (!reduceMotion) {
    document.documentElement.classList.add('js');

    animate(
        '.hero-line > span',
        { opacity: [0, 1], y: ['110%', '0%'] },
        { delay: stagger(0.13, { start: 0.16 }), duration: 0.75, ease: [0.22, 1, 0.36, 1] },
    );

    inView('[data-reveal]', (element) => {
        animate(element, { opacity: [0, 1], y: [18, 0] }, {
            duration: 0.7,
            ease: [0.22, 1, 0.36, 1],
        });
    }, { amount: 0.15 });

    const projectGrid = document.querySelector('[data-project-grid]');

    if (projectGrid) {
        inView(projectGrid, () => {
            const cards = [...projectGrid.children];

            animate(cards, { opacity: [0, 1], y: [24, 0] }, {
                delay: stagger(0.1),
                duration: 0.7,
                ease: [0.22, 1, 0.36, 1],
            });
        }, { amount: 0.08 });
    }

    const internshipSection = document.querySelector('[data-internship]');

    if (internshipSection) {
        const items = [...internshipSection.querySelectorAll('[data-internship-item]')];

        inView(internshipSection, () => {
            if (internshipSection.dataset.revealed) return;
            internshipSection.dataset.revealed = 'true';
            animate(items, { opacity: [0, 1], y: [24, 0] }, {
                delay: stagger(0.1),
                duration: 0.7,
                ease: [0.22, 1, 0.36, 1],
            });
        }, { amount: 0.12 });
    }

    const featuredResults = document.querySelector('[data-featured-results]');

    if (featuredResults) {
        const items = [...featuredResults.querySelectorAll('[data-featured-result]')];

        inView(featuredResults, () => {
            if (featuredResults.dataset.revealed) return;
            featuredResults.dataset.revealed = 'true';
            animate(items, { opacity: [0, 1], y: [24, 0] }, {
                delay: stagger(0.1),
                duration: 0.65,
                ease: [0.22, 1, 0.36, 1],
            });
        }, { amount: 0.35 });
    }

    document.querySelectorAll('[data-timeline]').forEach((timeline) => {
        const items = [...timeline.querySelectorAll('[data-timeline-item]')];
        const line = timeline.querySelector('[data-timeline-line]');

        inView(timeline, () => {
            if (timeline.dataset.revealed) return;
            timeline.dataset.revealed = 'true';

            if (line) {
                animate(line, { scaleY: [0, 1] }, {
                    duration: 0.9,
                    ease: [0.22, 1, 0.36, 1],
                });
            }

            animate(items, { opacity: [0, 1], y: [20, 0] }, {
                delay: stagger(0.1),
                duration: 0.65,
                ease: [0.22, 1, 0.36, 1],
            });
        }, { amount: 0.2 });
    });

    document.querySelectorAll('[data-skill-group]').forEach((group) => {
        const tags = [...group.querySelectorAll('[data-skill-tag]')];

        inView(group, () => {
            if (group.dataset.revealed) return;
            group.dataset.revealed = 'true';
            animate(tags, { opacity: [0, 1], y: [12, 0] }, {
                delay: stagger(0.03),
                duration: 0.45,
                ease: [0.22, 1, 0.36, 1],
            });
        }, { amount: 0.2 });
    });

    const profilePhoto = document.querySelector('[data-profile-photo]');

    if (profilePhoto) {
        const backdrop = profilePhoto.querySelector('[data-profile-backdrop]');

        inView(profilePhoto, () => {
            if (profilePhoto.dataset.revealed) return;
            profilePhoto.dataset.revealed = 'true';
            animate(profilePhoto, { opacity: [0, 1], y: [24, 0] }, {
                duration: 0.7,
                ease: [0.22, 1, 0.36, 1],
            });
        }, { amount: 0.25 });

        if (window.matchMedia('(hover: hover) and (pointer: fine)').matches) {
            profilePhoto.addEventListener('pointermove', (event) => {
                const bounds = profilePhoto.getBoundingClientRect();
                const relativeX = (event.clientX - bounds.left) / bounds.width - 0.5;
                const relativeY = (event.clientY - bounds.top) / bounds.height - 0.5;
                const rotateY = relativeX * 12;
                const rotateX = relativeY * -12;

                animate(profilePhoto, { rotateX, rotateY }, {
                    duration: 0.16,
                    ease: [0.22, 1, 0.36, 1],
                });

                if (backdrop) {
                    animate(backdrop, { x: relativeX * -5, y: relativeY * -5 }, {
                        duration: 0.2,
                        ease: [0.22, 1, 0.36, 1],
                    });
                }
            });

            profilePhoto.addEventListener('pointerleave', () => {
                animate(profilePhoto, { rotateX: 0, rotateY: 0 }, {
                    duration: 0.45,
                    ease: [0.22, 1, 0.36, 1],
                });

                if (backdrop) {
                    animate(backdrop, { x: 0, y: 0 }, {
                        duration: 0.45,
                        ease: [0.22, 1, 0.36, 1],
                    });
                }
            });
        }
    }
}

const counters = document.querySelectorAll('[data-count]');

inView('[data-count]', (element) => {
    const counter = element;
    const target = Number(counter.dataset.count);
    const suffix = counter.dataset.suffix ?? '';

    if (reduceMotion) {
        counter.textContent = `${target}${suffix}`;
        return;
    }

    animate(0, target, {
        duration: 1.4,
        ease: [0.16, 1, 0.3, 1],
        onUpdate: (value) => {
            counter.textContent = `${Math.round(value)}${suffix}`;
        },
    });
}, { amount: 0.8 });

if (reduceMotion) {
    counters.forEach((counter) => {
        counter.textContent = `${counter.dataset.count}${counter.dataset.suffix ?? ''}`;
    });
}

const menu = document.querySelector('#site-menu');
const menuTrigger = document.querySelector('.menu-trigger');
const menuClose = document.querySelector('.menu-close');
let menuAnimation;
let menuTransition = 0;
let menuPreviousScrollY = 0;
let menuPreviousHtmlOverflow = '';

function openMenu() {
    const transition = ++menuTransition;
    menuPreviousScrollY = window.scrollY;
    menuPreviousHtmlOverflow = document.documentElement.style.overflow;
    menu.hidden = false;
    menu.setAttribute('aria-hidden', 'false');
    menuTrigger.setAttribute('aria-expanded', 'true');
    document.documentElement.style.overflow = 'hidden';
    menuAnimation?.cancel();
    menuAnimation = animate(menu, { opacity: [0, 1], y: [8, 0] }, {
        duration: reduceMotion ? 0 : 0.3,
        ease: [0.22, 1, 0.36, 1],
    });
    if (transition === menuTransition) {
        requestAnimationFrame(() => menu.querySelector('[data-menu-link]')?.focus({ preventScroll: true }));
    }
}

async function closeMenu({ target = null, restoreScroll = true } = {}) {
    const transition = ++menuTransition;
    menuTrigger.setAttribute('aria-expanded', 'false');
    menu.setAttribute('aria-hidden', 'true');
    menuAnimation?.cancel();
    menuAnimation = animate(menu, { opacity: [1, 0], y: [0, 8] }, {
        duration: reduceMotion ? 0 : 0.22,
        ease: [0.22, 1, 0.36, 1],
    });
    await menuAnimation.finished;
    if (transition === menuTransition) {
        menu.hidden = true;
        document.documentElement.style.overflow = menuPreviousHtmlOverflow;

        if (target) {
            requestAnimationFrame(() => {
                const targetTop = target.getBoundingClientRect().top + window.scrollY;
                const scrollMargin = Number.parseFloat(getComputedStyle(target).scrollMarginTop) || 0;
                const destination = Math.max(0, targetTop - scrollMargin);

                startProgrammaticScroll(target, destination);
            });
            return;
        }

        if (restoreScroll) {
            if (window.scrollY !== menuPreviousScrollY) {
                const previousScrollBehavior = document.documentElement.style.scrollBehavior;
                document.documentElement.style.scrollBehavior = 'auto';
                window.scrollTo(0, menuPreviousScrollY);
                requestAnimationFrame(() => {
                    document.documentElement.style.scrollBehavior = previousScrollBehavior;
                });
            }
        }

        menuTrigger.focus({ preventScroll: true });
    }
}

menuTrigger.addEventListener('click', () => {
    if (menuTrigger.getAttribute('aria-expanded') === 'true') {
        closeMenu();
    } else {
        openMenu();
    }
});

menuClose.addEventListener('click', () => closeMenu());

menu.addEventListener('click', (event) => {
    if (event.target === menu || event.target.matches('.menu-overlay-inner')) {
        closeMenu();
        return;
    }

    const link = event.target.closest('a');

    if (!link || !menu.contains(link)) return;

    const href = link.getAttribute('href');
    const targetId = href?.startsWith('#') ? href.slice(1) : null;
    const target = targetId ? document.getElementById(targetId) : null;

    if (link.hasAttribute('download') || !target) {
        closeMenu();
        return;
    }

    event.preventDefault();
    closeMenu({ target, restoreScroll: false });
});

document.addEventListener('keydown', (event) => {
    if (menu.hidden) return;

    if (event.key === 'Escape') {
        closeMenu();
        return;
    }

    if (event.key === 'Tab') {
        const focusable = [...menu.querySelectorAll('a[href], button:not([disabled])')];
        const first = focusable[0];
        const last = focusable.at(-1);

        if (event.shiftKey && document.activeElement === first) {
            event.preventDefault();
            last.focus();
        } else if (!event.shiftKey && document.activeElement === last) {
            event.preventDefault();
            first.focus();
        }
    }
});

const detailDialog = document.querySelector('#project-detail-dialog');
const detailDataElement = document.querySelector('#project-detail-data');

if (detailDialog && detailDataElement) {
    const projectDetails = JSON.parse(detailDataElement.textContent);
    const detailTitle = detailDialog.querySelector('#project-detail-title');
    const detailLabel = detailDialog.querySelector('#project-detail-label');
    const detailSummary = detailDialog.querySelector('#project-detail-summary');
    const detailInfo = detailDialog.querySelector('#project-detail-info');
    const detailHighlights = detailDialog.querySelector('#project-detail-highlights');
    const detailFeatures = detailDialog.querySelector('#project-detail-features');
    const detailFeatureList = detailDialog.querySelector('#project-detail-feature-list');
    const detailConclusion = detailDialog.querySelector('#project-detail-conclusion');
    const detailGithub = detailDialog.querySelector('#project-detail-github');
    const detailCloseButtons = detailDialog.querySelectorAll('.project-detail-close, .project-detail-dismiss');
    let detailTrigger;
    let previousBodyOverflow = '';
    let isClosing = false;

    function openProjectDetail(trigger) {
        const key = trigger.dataset.projectDetailKey;
        const detail = projectDetails[key];

        if (!detail) {
            console.error(`Detail project tidak ditemukan untuk "${key}".`);
            return;
        }

        detailTrigger = trigger;
        detailTitle.textContent = detail.title;
        detailLabel.textContent = detail.label;
        detailSummary.textContent = detail.summary;
        detailInfo.replaceChildren();
        detailInfo.hidden = !detail.info?.length;
        detailInfo.replaceChildren(...(detail.info ?? []).map((entry) => {
            const row = document.createElement('div');
            const label = document.createElement('dt');
            const value = document.createElement('dd');

            label.textContent = entry.label;
            value.textContent = entry.value;
            row.append(label, value);

            return row;
        }));

        detailHighlights.replaceChildren(...(detail.highlights ?? []).map((result) => {
            const item = document.createElement('div');
            const value = document.createElement('strong');
            const label = document.createElement('span');

            item.className = 'project-detail-stat';
            value.className = 'pixel-font';
            value.textContent = result.value;
            label.textContent = result.label;
            item.append(value, label);

            return item;
        }));
        detailHighlights.hidden = !detail.highlights?.length;

        detailFeatureList.replaceChildren(...(detail.fitur ?? []).map((feature) => {
            const item = document.createElement('li');
            item.textContent = feature;

            return item;
        }));
        detailFeatures.hidden = !detail.fitur?.length;

        detailConclusion.textContent = detail.kesimpulan ?? '';
        detailConclusion.hidden = !detail.kesimpulan;

        if (detail.github) {
            detailGithub.href = detail.github;
            detailGithub.hidden = false;
        } else {
            detailGithub.removeAttribute('href');
            detailGithub.hidden = true;
        }

        previousBodyOverflow = document.body.style.overflow;
        document.body.style.overflow = 'hidden';
        detailDialog.classList.remove('is-closing');
        detailDialog.showModal();
        detailDialog.querySelector('.project-detail-close').focus();

        animate(detailDialog, {
            opacity: [0, 1],
            y: reduceMotion ? [0, 0] : [24, 0],
            scale: reduceMotion ? [1, 1] : [0.97, 1],
        }, {
            duration: reduceMotion ? 0.08 : 0.3,
            ease: [0.22, 1, 0.36, 1],
        });

        if (detailHighlights.children.length) {
            animate(
                [...detailHighlights.children],
                {
                    opacity: [0, 1],
                    y: reduceMotion ? [0, 0] : [12, 0],
                },
                {
                    delay: stagger(reduceMotion ? 0 : 0.08),
                    duration: reduceMotion ? 0.08 : 0.25,
                    ease: [0.22, 1, 0.36, 1],
                },
            );
        }
    }

    async function closeProjectDetail() {
        if (!detailDialog.open || isClosing) return;

        isClosing = true;
        detailDialog.classList.add('is-closing');

        await animate(detailDialog, {
            opacity: [1, 0],
            y: reduceMotion ? [0, 0] : [0, 24],
            scale: reduceMotion ? [1, 1] : [1, 0.97],
        }, {
            duration: reduceMotion ? 0.08 : 0.22,
            ease: [0.22, 1, 0.36, 1],
        }).finished;

        detailDialog.close();
    }

    document.addEventListener('click', (event) => {
        const trigger = event.target.closest('[data-project-detail-trigger]');

        if (trigger) openProjectDetail(trigger);
    });

    detailCloseButtons.forEach((button) => button.addEventListener('click', closeProjectDetail));

    detailDialog.addEventListener('click', (event) => {
        if (event.target === detailDialog) closeProjectDetail();
    });

    detailDialog.addEventListener('cancel', (event) => {
        event.preventDefault();
        closeProjectDetail();
    });

    document.addEventListener('keydown', (event) => {
        if (detailDialog.open && event.key === 'Escape') {
            event.preventDefault();
            closeProjectDetail();
        }
    }, true);

    detailDialog.addEventListener('close', () => {
        document.body.style.overflow = previousBodyOverflow;
        detailDialog.classList.remove('is-closing');
        isClosing = false;
        detailTrigger?.focus();
    });

    detailDialog.addEventListener('keydown', (event) => {
        if (event.key !== 'Tab') return;

        const focusable = [...detailDialog.querySelectorAll('button:not([disabled]), a[href]:not([hidden])')]
            .filter((element) => element.offsetWidth || element.offsetHeight || element === document.activeElement);
        const first = focusable[0];
        const last = focusable.at(-1);

        if (event.shiftKey && document.activeElement === first) {
            event.preventDefault();
            last.focus();
        } else if (!event.shiftKey && document.activeElement === last) {
            event.preventDefault();
            first.focus();
        }
    });
}

const observedSections = [...document.querySelectorAll('#top, #tugas-akhir, #magang, #projects, #about, #education, #experience, #skills, #contact')];
const sectionLinks = [...document.querySelectorAll('[data-section-link]')];
const observedSectionIds = new Set(observedSections.map((section) => section.id));
const aboutSectionIds = new Set(['about', 'education', 'experience', 'skills']);
const projectSectionIds = new Set(['tugas-akhir', 'magang', 'projects']);
let pendingSectionId = null;
let isProgrammaticScrolling = false;
let programmaticScrollTimeout;

document.addEventListener('click', (event) => {
    const link = event.target.closest('a[href^="#"]');
    const targetId = link?.getAttribute('href')?.slice(1);

    if (link?.closest('#site-menu')) return;

    if (targetId && observedSectionIds.has(targetId)) {
        pendingSectionId = targetId;
    }
});

function setActiveSection(sectionId) {
    const activeHash = `#${aboutSectionIds.has(sectionId) ? 'about' : projectSectionIds.has(sectionId) ? 'projects' : sectionId}`;

    sectionLinks.forEach((link) => {
        if (link.getAttribute('href') === activeHash) {
            link.setAttribute('aria-current', 'location');
        } else {
            link.removeAttribute('aria-current');
        }
    });
}

function startProgrammaticScroll(target, destination) {
    isProgrammaticScrolling = true;
    pendingSectionId = null;
    window.clearTimeout(programmaticScrollTimeout);

    const behavior = reduceMotion ? 'auto' : 'smooth';
    window.scrollTo({ top: destination, behavior });
    target.focus({ preventScroll: true });

    const nextUrl = `${window.location.pathname}${window.location.search}#${target.id}`;
    if (window.location.hash !== `#${target.id}`) {
        window.history.pushState(null, '', nextUrl);
    }

    const releaseScrollSpy = () => {
        if (!isProgrammaticScrolling) return;

        isProgrammaticScrolling = false;
        window.clearTimeout(programmaticScrollTimeout);
        window.removeEventListener('scrollend', releaseScrollSpy);
        setActiveSection(target.id);
    };

    window.addEventListener('scrollend', releaseScrollSpy, { once: true });
    programmaticScrollTimeout = window.setTimeout(releaseScrollSpy, reduceMotion ? 100 : 1600);
}

if ('IntersectionObserver' in window && observedSections.length) {
    const sectionObserver = new IntersectionObserver((entries) => {
        if (isProgrammaticScrolling) return;

        const visibleSections = entries
            .filter((entry) => entry.isIntersecting)
            .sort((first, second) => second.intersectionRatio - first.intersectionRatio);
        const requestedSection = visibleSections.find((entry) => entry.target.id === pendingSectionId);
        const activeSection = requestedSection?.target
            ?? (pendingSectionId ? null : visibleSections[0]?.target);

        if (!activeSection) return;
        pendingSectionId = null;
        setActiveSection(activeSection.id);

        const activeHash = `#${activeSection.id}`;
        if (window.location.hash !== activeHash) {
            window.history.replaceState(null, '', `${window.location.pathname}${window.location.search}${activeHash}`);
        }
    }, {
        rootMargin: '-25% 0px -25% 0px',
        threshold: [0, 0.1, 0.25, 0.5],
    });

    observedSections.forEach((section) => sectionObserver.observe(section));
}

const initialHashTarget = initialLocationHash
    ? document.getElementById(decodeURIComponent(initialLocationHash.slice(1)))
    : null;

if (initialHashTarget && observedSectionIds.has(initialHashTarget.id)) {
    isProgrammaticScrolling = true;
    pendingSectionId = initialHashTarget.id;

    requestAnimationFrame(() => {
        const previousScrollBehavior = document.documentElement.style.scrollBehavior;
        document.documentElement.style.scrollBehavior = 'auto';
        const targetTop = initialHashTarget.getBoundingClientRect().top
            + window.scrollY
            - (Number.parseFloat(getComputedStyle(initialHashTarget).scrollMarginTop) || 0);

        window.scrollTo(0, Math.max(0, targetTop));
        setActiveSection(initialHashTarget.id);

        requestAnimationFrame(() => {
            document.documentElement.style.scrollBehavior = previousScrollBehavior;
            isProgrammaticScrolling = false;
            pendingSectionId = null;
        });
    });
}
