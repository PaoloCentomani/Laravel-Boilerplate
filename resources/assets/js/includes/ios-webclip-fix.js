/**
 * Prevent opening links in Safari when in Web Clip mode.
 *
 * @param  object  window
 * @param  object  document
 * @return void
 */
((window, document) => {
    if (! ('standalone' in window.navigator && window.navigator.standalone)) {
        return;
    }

    document.addEventListener('click', (e) => {
        let element = e.target,
            href = '';

        while (! /^(a|html)$/i.test(element.nodeName)) {
            element = element.parentNode;
        }

        if (element.getAttribute) {
            href = element.getAttribute('href');

            if (href && href !== '#' && (! element.protocol || element.protocol !== 'tel:')) {
                e.preventDefault();
                window.location = element.href;
            }
        }
    }, false);
})(window, document);
