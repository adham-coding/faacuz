document.addEventListener("DOMContentLoaded", () => {
    const modalImage = document.getElementById("modal-image").style;
    const productImage = document.getElementById("product-image");
    const modalCloser = document.getElementById("modal-closer");
    const thumbs = document.getElementsByClassName("thumb");
    const nexts = document.getElementsByClassName("next");
    const prevs = document.getElementsByClassName("prev");
    const modal = document.getElementById("modal");
    const modalStyle = modal.style;

    const prevSlide = () => {
        let prevElement;

        if (modal.querySelector(`[src='${productImage.src}']`)) {
            prevElement = modal.querySelector(
                `[src='${productImage.src}']`
            ).previousElementSibling;
        } else {
            prevElement = modal.querySelector(
                `[src='${productImage.src.replace(
                    window.location.origin,
                    ""
                )}']`
            ).previousElementSibling;
        }

        if (prevElement) {
            const src = prevElement.src;
            modalImage.backgroundImage = `url('${src}')`;
            productImage.src = src;
        } else {
            const images = modal.getElementsByTagName("img");
            const src = images[images.length - 1].src;
            modalImage.backgroundImage = `url('${src}')`;
            productImage.src = src;
        }
    };

    const nextSlide = () => {
        let nextElement;

        if (modal.querySelector(`[src='${productImage.src}']`)) {
            nextElement = modal.querySelector(
                `[src='${productImage.src}']`
            ).nextElementSibling;
        } else {
            nextElement = modal.querySelector(
                `[src='${productImage.src.replace(
                    window.location.origin,
                    ""
                )}']`
            ).nextElementSibling;
        }

        if (nextElement) {
            const src = nextElement.src;
            modalImage.backgroundImage = `url('${src}')`;
            productImage.src = src;
        } else {
            const src = modal.getElementsByTagName("img")[0].src;
            modalImage.backgroundImage = `url('${src}')`;
            productImage.src = src;
        }
    };

    const modalOpenCloser = () => {
        if (modalStyle.opacity === "100") {
            modalStyle.pointerEvents = "";
            modalStyle.transform = "";
            modalStyle.opacity = "";
            modalStyle.filter = "";
        } else {
            modalStyle.pointerEvents = "auto";
            modalStyle.transform = "scale(1)";
            modalStyle.filter = "blur(0)";
            modalStyle.opacity = "100";
        }
    };

    productImage.addEventListener("click", modalOpenCloser);
    modalCloser.addEventListener("click", modalOpenCloser);

    for (const thumb of thumbs) {
        thumb.addEventListener("click", () => {
            modalImage.backgroundImage = `url('${thumb.src}')`;
            productImage.src = thumb.src;
        });
    }

    for (const prev of prevs) prev.addEventListener("click", prevSlide);
    for (const next of nexts) next.addEventListener("click", nextSlide);
});
