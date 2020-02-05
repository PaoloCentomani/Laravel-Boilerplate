module.exports = {
    inserted: (el, binding) => {
        el.addEventListener('submit', (e) => {
            if (binding.value && ! confirm(binding.value)) {
                e.preventDefault();

                return;
            }

            let button = el.querySelector('[type="submit"]');

            button.disabled = true;
            button.classList.add('btn-loading');
        });
    }
};
