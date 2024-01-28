function changeFooterPosition() {
    const FOOTER = document.querySelector("footer"),
        BODY = document.querySelector("body");

    if (window.innerHeight > BODY.getBoundingClientRect().height) {
        FOOTER.style.position = "absolute";
        FOOTER.style.bottom = 0;
    } else {
        FOOTER.style.position = "";
        FOOTER.style.bottom = "";
    }
}

window.addEventListener("resize", changeFooterPosition);
changeFooterPosition();