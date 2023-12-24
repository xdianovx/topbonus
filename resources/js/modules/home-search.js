export const homeSearch = () => {
    const search = document.querySelector(".search");
    if (!search) return;

    const searchUrl = search.getAttribute("data-route");
    const palce = document.querySelector(".search-results");
    const wrap = palce.querySelector(".inner");

    window.addEventListener("click", () => {
        palce.classList.remove("h-auto");
        palce.classList.add("h-0");
    });

    let casinos;
    async function serachCasinos() {
        const searchValue = search.value;

        const response = await fetch(`${searchUrl}/?search=${searchValue}`, {
            headers: {
                "X-Requested-With": "XMLHttpRequest",
            },
        }).then(async (res) => {
            const data = await res.json();
            wrap.innerHTML = "";
            casinos = data;
            palce.classList.remove("h-0");

            palce.classList.add("h-auto");
            data.forEach((item) => {
                wrap.insertAdjacentHTML(
                    "beforeend",
                    `<div class="flex gap-4">
                        <p>${item.id}</p>
                        <p> ${item.title}</p>
                    </div>`
                );
            });
        });
    }

    search.addEventListener("input", serachCasinos);
};
