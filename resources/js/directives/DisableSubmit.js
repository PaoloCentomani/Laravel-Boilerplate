module.exports = {
    inserted: (el) => {
        el.addEventListener('submit', () => {
            let button = el.querySelector('[type="submit"]');

            button.disabled = true;
            button.classList.add('btn-loading');
        });
    }
};
