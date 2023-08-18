document.addEventListener('DOMContentLoaded', function() {
    const lazyElements = document.getElementsByClassName('element');
    const lazyElementsArray = Array.from(lazyElements);
   
    function isElementInViewport(element) {
        const rect = element.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight)
        );
    }

    function lazyLoad() {
        lazyElementsArray.forEach(element => {
            if (isElementInViewport(element)) {
                element.style.opacity = 1;
            }
        });
    }

    lazyLoad();

    window.addEventListener('scroll', lazyLoad);
});
