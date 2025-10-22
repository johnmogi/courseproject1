document.addEventListener('DOMContentLoaded', () => {
    const landingPage = document.querySelector('.course-landing-page');
    if (!landingPage) {
        return;
    }

    const appointmentSection = landingPage.querySelector('[data-appointments]');
    const modal = landingPage.querySelector('[data-modal="appointment"]');
    if (!appointmentSection || !modal) {
        return;
    }

    const summaryField = modal.querySelector('.appointment-modal-summary');
    const notesInput = modal.querySelector('#appointment-modal-notes');
    const closeControls = modal.querySelectorAll('[data-close-modal="appointment"]');

    const focusableSelectors = [
        'a[href]',
        'button:not([disabled])',
        'textarea:not([disabled])',
        'input:not([type="hidden"]):not([disabled])',
        'select:not([disabled])',
        '[tabindex]:not([tabindex="-1"])'
    ];

    let previouslyFocusedElement = null;

    function setNotesValue(title, time) {
        if (!notesInput) {
            return;
        }
        const details = [title, time].filter(Boolean).join(' – ');
        notesInput.value = details ? `מפגש מבוקש: ${details}` : 'מפגש מבוקש: ללא תאריך מוגדר';
    }

    function openModal({ title, time }) {
        previouslyFocusedElement = document.activeElement;

        modal.classList.remove('is-hidden');
        modal.removeAttribute('hidden');
        modal.setAttribute('aria-hidden', 'false');
        modal.setAttribute('data-open', 'true');

        if (summaryField) {
            const parts = [];
            if (title) {
                parts.push(`בחרת במפגש: ${title}`);
            }
            if (time) {
                parts.push(`מתקיים ב: ${time}`);
            }
            summaryField.textContent = parts.join(' | ') || 'בחרו מועד ואנחנו נחזור אליכם לתיאום סופי.';
        }

        setNotesValue(title, time);

        const focusableElements = modal.querySelectorAll(focusableSelectors.join(','));
        if (focusableElements.length) {
            focusableElements[0].focus();
        }

        document.addEventListener('keydown', handleKeydown);
    }

    function closeModal() {
        modal.classList.add('is-hidden');
        modal.setAttribute('hidden', 'hidden');
        modal.setAttribute('aria-hidden', 'true');
        modal.removeAttribute('data-open');

        document.removeEventListener('keydown', handleKeydown);

        if (previouslyFocusedElement && typeof previouslyFocusedElement.focus === 'function') {
            previouslyFocusedElement.focus();
        }
    }

    function handleKeydown(event) {
        if (event.key === 'Escape') {
            closeModal();
        }

        if (event.key === 'Tab') {
            trapFocus(event);
        }
    }

    function trapFocus(event) {
        const focusableElements = modal.querySelectorAll(focusableSelectors.join(','));
        if (!focusableElements.length) {
            return;
        }

        const focusableArray = Array.from(focusableElements);
        const firstElement = focusableArray[0];
        const lastElement = focusableArray[focusableArray.length - 1];

        if (event.shiftKey && document.activeElement === firstElement) {
            lastElement.focus();
            event.preventDefault();
        } else if (!event.shiftKey && document.activeElement === lastElement) {
            firstElement.focus();
            event.preventDefault();
        }
    }

    appointmentSection.querySelectorAll('[data-open-modal="appointment"]').forEach((trigger) => {
        trigger.addEventListener('click', (event) => {
            event.preventDefault();
            const title = trigger.getAttribute('data-appointment-title') || '';
            const time = trigger.getAttribute('data-appointment-time') || '';
            openModal({ title, time });
        });
    });

    closeControls.forEach((control) => {
        control.addEventListener('click', (event) => {
            event.preventDefault();
            closeModal();
        });
    });

    modal.addEventListener('click', (event) => {
        if (event.target === modal) {
            closeModal();
        }
    });
});
