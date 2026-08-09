document.addEventListener("DOMContentLoaded", function () {
    const loadingScreen = document.getElementById("loading-screen");
    window.addEventListener("load", function () {
        setTimeout(
            () => loadingScreen && loadingScreen.classList.add("hidden"),
            300,
        );
    });

    if (typeof AOS !== "undefined") {
        AOS.init({
            duration: 800,
            easing: "ease-out-cubic",
            once: true,
            offset: 60,
        });
    }

    const navbar = document.getElementById("mainNavbar");
    function handleNavbarScroll() {
        if (!navbar) return;
        if (window.scrollY > 40) {
            navbar.classList.add("scrolled");
        } else {
            navbar.classList.remove("scrolled");
        }
    }
    handleNavbarScroll();
    window.addEventListener("scroll", handleNavbarScroll);

    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener("click", function (e) {
            const targetId = this.getAttribute("href");
            if (targetId.length > 1) {
                const target = document.querySelector(targetId);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({
                        behavior: "smooth",
                        block: "start",
                    });
                }
            }
        });
    });

    const counters = document.querySelectorAll(".stat-number");
    const counterObserver = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    counterObserver.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.5 },
    );

    counters.forEach((counter) => counterObserver.observe(counter));

    function animateCounter(el) {
        const target = parseInt(el.getAttribute("data-count"), 10) || 0;
        const duration = 1500;
        const startTime = performance.now();

        function update(now) {
            const progress = Math.min((now - startTime) / duration, 1);
            const eased = 1 - Math.pow(1 - progress, 3);
            el.textContent = Math.floor(eased * target).toLocaleString("id-ID");
            if (progress < 1) {
                requestAnimationFrame(update);
            } else {
                el.textContent = target.toLocaleString("id-ID");
            }
        }
        requestAnimationFrame(update);
    }

    const backToTop = document.getElementById("backToTop");
    if (backToTop) {
        window.addEventListener("scroll", function () {
            if (window.scrollY > 400) {
                backToTop.classList.add("show");
            } else {
                backToTop.classList.remove("show");
            }
        });
        backToTop.addEventListener("click", function () {
            window.scrollTo({ top: 0, behavior: "smooth" });
        });
    }

    document.querySelectorAll(".ripple").forEach((btn) => {
        btn.addEventListener("click", function (e) {
            const circle = document.createElement("span");
            const diameter = Math.max(this.clientWidth, this.clientHeight);
            const radius = diameter / 2;

            circle.style.width = circle.style.height = `${diameter}px`;
            circle.style.left = `${e.clientX - this.getBoundingClientRect().left - radius}px`;
            circle.style.top = `${e.clientY - this.getBoundingClientRect().top - radius}px`;
            circle.classList.add("ripple-effect");

            const existingRipple = this.querySelector(".ripple-effect");
            if (existingRipple) existingRipple.remove();

            this.appendChild(circle);
            setTimeout(() => circle.remove(), 600);
        });
    });

    const filterButtons = document.querySelectorAll(".filter-btn");
    const galleryItems = document.querySelectorAll(".gallery-item");

    filterButtons.forEach((btn) => {
        btn.addEventListener("click", function () {
            filterButtons.forEach((b) => b.classList.remove("active"));
            this.classList.add("active");

            const filter = this.getAttribute("data-filter");

            galleryItems.forEach((item) => {
                const category = item.getAttribute("data-category");
                if (filter === "Semua" || filter === category) {
                    item.classList.remove("hide");
                } else {
                    item.classList.add("hide");
                }
            });
        });
    });

    const lightboxModal = document.getElementById("lightboxModal");
    const lightboxImage = document.getElementById("lightboxImage");
    const lightboxCaption = document.getElementById("lightboxCaption");
    const lightboxClose = document.getElementById("lightboxClose");

    document.querySelectorAll(".lightbox-trigger").forEach((trigger) => {
        trigger.addEventListener("click", function (e) {
            e.preventDefault();
            if (!lightboxModal) return;
            lightboxImage.setAttribute("src", this.getAttribute("href"));
            lightboxCaption.textContent =
                this.getAttribute("data-caption") || "";
            lightboxModal.classList.add("active");
        });
    });

    if (lightboxClose) {
        lightboxClose.addEventListener("click", () =>
            lightboxModal.classList.remove("active"),
        );
    }
    if (lightboxModal) {
        lightboxModal.addEventListener("click", function (e) {
            if (e.target === lightboxModal)
                lightboxModal.classList.remove("active");
        });
    }
    document.addEventListener("keydown", function (e) {
        if (e.key === "Escape" && lightboxModal)
            lightboxModal.classList.remove("active");
    });

    document.querySelectorAll('img[loading="lazy"]').forEach((img) => {
        img.classList.add("lazy-loading");
        img.addEventListener("load", () =>
            img.classList.remove("lazy-loading"),
        );
    });
});
