document.addEventListener("DOMContentLoaded", function () {
    document.body.classList.add("loading");
    setTimeout(() => {
        document.body.classList.remove("loading");
    }, 2000);
});