function changeFooterPosition() {
    const FOOTER = $("footer"),
        BODY = $("body");

    if ($(window).height() > BODY.height()) {
        FOOTER.css("position", "absolute");
        FOOTER.css("bottom", 0);
    } else {
        FOOTER.css("position", "");
        FOOTER.css("bottom", "");
    }
}

$(window).resize(changeFooterPosition);
changeFooterPosition();