document.addEventListener("DOMContentLoaded", () => {
    //   const accordions = document.getElementsByClassName("accordion");
    //   const radiosWrapper = document.getElementById("radios-wrapper");
    //   const radios = radiosWrapper.getElementsByTagName("input");
    //   const select = document.getElementById("select");
    const categories = document.getElementsByClassName("category");
    const header = document.getElementById("header").style;
    const logo = document.getElementById("logo").style;
    const caption = document.getElementById("caption");
    const toTop = document.getElementById("toTop");
    const html = document.documentElement;
    const toTopStyle = toTop.style;
    const body = document.body;
    const hook = 400;

    const goToScroll = (scroll = 0) => {
        html.scrollTop = body.scrollTop = scroll;
    };

    const headerAnime = () => {
        if (body.scrollTop > hook || html.scrollTop > hook) {
            header.top = "0";
            logo.transform = "scale(0.85)";
            toTopStyle.visibility = "visible";
            toTopStyle.bottom = "20px";
        } else {
            header.top = "";
            logo.transform = "";
            toTopStyle.visibility = "";
            toTopStyle.bottom = "";
        }
    };

    const scrollHookEffect = () => {
        window.addEventListener("scroll", () => {
            for (const category of categories) {
                if (html.scrollTop > category.offsetTop - hook)
                    category.classList.add("extra-height");
                else if (html.scrollTop < category.offsetTop - 200)
                    category.classList.remove("extra-height");
            }
        });
    };

    //   const openCloseAccordion = (tag) => {
    //       const panel = tag.nextElementSibling;
    //       const panelStyle = panel.style;
    //       const mark = tag.querySelector("span").style;
    //       const originalHeight = panel.scrollHeight + "px";

    //       if (panelStyle.height === originalHeight) {
    //           panelStyle.height = "0";
    //           mark.transform = "";
    //       } else {
    //           panelStyle.height = originalHeight;
    //           mark.transform = "rotate(-90deg)";

    //           setTimeout(() => {
    //               if (panel.scrollTopMax) {
    //                   panelStyle.height = panel.scrollHeight + "px";
    //               }
    //           }, 300);
    //       }
    //   };

    //   for (const accordion of accordions) {
    //       accordion
    //           .querySelector(".accordion-head")
    //           .addEventListener("click", function () {
    //               openCloseAccordion(this);
    //           });
    //   }

    //   for (const radio of radios) {
    //       radio.addEventListener("click", function () {
    //           select.innerText = this.value;
    //       });

    //       radio.addEventListener("click", () => {
    //           openCloseAccordion(radiosWrapper.previousElementSibling);
    //       });

    //       if (radio.checked) select.innerText = radio.value;
    //   }

    //   accordions[0].querySelector(".accordion-head").click();

    setTimeout(() => {
        if (document.referrer) html.scrollTop = caption.offsetTop;
    }, 250);

    window.addEventListener("scroll", headerAnime);
    toTop.addEventListener("click", goToScroll);
    headerAnime();
    scrollHookEffect();
});
