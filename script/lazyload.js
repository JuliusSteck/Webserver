document.addEventListener('DOMContentLoaded', function() {
    const lazyElements = document.querySelectorAll('element');

    function isElementInViewport(element) {
        const rect = element.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight)
        );
    }

    function lazyLoad() {
        lazyElements.forEach(element => {
            if (isElementInViewport(element)) {
                element.style.opacity = 1;
            }
        });
    }

    lazyLoad();

    window.addEventListener('scroll', lazyLoad);
});