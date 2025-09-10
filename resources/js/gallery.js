(function () {
    const body = document.body;
    const modal = document.getElementById("lightbox");
    if (!modal) return;
    const imgEl = document.getElementById("lightbox-img");
    const captionEl = document.getElementById("lightbox-caption");
    const btnClose = document.getElementById("lightbox-close");
    const btnPrev = document.getElementById("lightbox-prev");
    const btnNext = document.getElementById("lightbox-next");
    const backdrop = document.getElementById("lightbox-backdrop");

    const imageNodes = Array.from(
        document.querySelectorAll('[data-gallery="image"]')
    );
    const images = imageNodes.map((node) => ({
        src: node.getAttribute("src"),
        alt: node.getAttribute("alt") || "",
    }));

    let currentIndex = 0;

    function openAt(index) {
        if (!images.length) return;
        currentIndex = (index + images.length) % images.length;
        const { src, alt } = images[currentIndex];
        imgEl.src = src;
        imgEl.alt = alt;
        captionEl.textContent = alt;
        modal.classList.remove("hidden");
        body.classList.add("overflow-hidden");
    }

    function close() {
        modal.classList.add("hidden");
        body.classList.remove("overflow-hidden");
        imgEl.src = "";
        imgEl.alt = "";
        captionEl.textContent = "";
    }

    function next() {
        openAt(currentIndex + 1);
    }
    function prev() {
        openAt(currentIndex - 1);
    }

    imageNodes.forEach((node, i) => {
        node.addEventListener("click", () => openAt(i));
        node.addEventListener("keydown", (e) => {
            if (e.key === "Enter" || e.key === " ") {
                e.preventDefault();
                openAt(i);
            }
        });
        node.setAttribute("tabindex", "0");
        node.setAttribute("role", "button");
        node.setAttribute(
            "aria-label",
            "View image: " + (node.getAttribute("alt") || "")
        );
    });

    btnClose.addEventListener("click", close);
    backdrop.addEventListener("click", close);
    btnPrev.addEventListener("click", prev);
    btnNext.addEventListener("click", next);

    window.addEventListener("keydown", (e) => {
        if (modal.classList.contains("hidden")) return;
        if (e.key === "Escape") close();
        else if (e.key === "ArrowRight") next();
        else if (e.key === "ArrowLeft") prev();
    });

    let touchStartX = null;
    imgEl.addEventListener(
        "touchstart",
        (e) => {
            touchStartX = e.changedTouches[0].clientX;
        },
        { passive: true }
    );
    imgEl.addEventListener("touchend", (e) => {
        if (touchStartX === null) return;
        const dx = e.changedTouches[0].clientX - touchStartX;
        if (Math.abs(dx) > 40) {
            if (dx < 0) next();
            else prev();
        }
        touchStartX = null;
    });
})();
