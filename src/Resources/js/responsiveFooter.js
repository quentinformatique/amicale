function responsiveFooter() {
    // Get the footer
    let footer = document.getElementsByTagName("footer")[0];
    let body = document.getElementsByTagName("body")[0];
    // if the page is not long enough to fill the screen, move the footer to the bottom
    if (footer.offsetTop < window.innerHeight && window.innerWidth > 768) {
        body.style.height = "100%";
        footer.style.position = "absolute";
        footer.style.bottom = "0";
        if (window.innerWidth > 768) {
            footer.style.width = "100%";
        }
    } else  {
        footer.style.position = "relative";
    }
}

// we want to call the function when the page is loaded and when the window is resized
window.onload = responsiveFooter;
window.onresize = responsiveFooter;