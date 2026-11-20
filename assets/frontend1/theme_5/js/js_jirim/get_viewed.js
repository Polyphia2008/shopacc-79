$(document).ready(function () {

    const STORAGE_KEY = 'viewedProduct';
    const isViewedPage = $('.get-viewed').length > 0;

    // Lấy từ LocalStorage
    function getViewedList() {
        try {
            const raw = localStorage.getItem(STORAGE_KEY);
            if (!raw) return [];
            const parsed = JSON.parse(raw);
            return Array.isArray(parsed) ? parsed : [];
        } catch { return []; }
    }

    // Lưu vào LocalStorage
    function setViewedList(list) {
        try { localStorage.setItem(STORAGE_KEY, JSON.stringify(list)); }
        catch {}
    }

    // Click lưu sản phẩm
    $(document).on('click', '.js-view-product', function () {
        const $el = $(this);

        let dataChild = $el.data('child');
        if (typeof dataChild === 'string' && dataChild.trim() !== "") {
            try { dataChild = JSON.parse(dataChild); } catch { dataChild = []; }
        } else if (!Array.isArray(dataChild)) dataChild = [];

        const product = {
            id: $el.data('id'),
            title: $el.data('title'),
            module: $el.data('module'),
            category: $el.data('category') || '',
            image: $el.data('image') || '',
            displayType: $el.data('displaytype') || '',
            data_child: dataChild,
            link: $el.attr('href') || location.href
        };

        saveViewedProduct(product);
    });

    // Lưu và render nếu cần
    function saveViewedProduct(product) {
        let viewed = getViewedList();

        viewed = viewed.filter(p => p.id != product.id);
        viewed.unshift(product);

        if (viewed.length > 20) viewed = viewed.slice(0, 20);

        setViewedList(viewed);

        if (isViewedPage) renderViewedProducts();
    }

    // Render ra UI
    function renderViewedProducts() {
        const $container = $('.get-viewed');
        if (!$container.length) return;

        const viewed = getViewedList();
        if (!viewed.length) {
            $container.html(`<div class="text-center py-4" style="color:red;font-weight:500;">Bạn chưa xem sản phẩm nào</div>`);
            return;
        }

        let html = "";
        viewed.forEach(p => html += renderCard(p));

        $container.html(`<div class="list-category d-flex flex-wrap">${html}</div>`);
    }

    // Template card giống UI gốc website
    function renderCard(p) {
        return `
        <div class="item-category c-px-8 c-mb-12 c-px-lg-6">
            <div class="card">
                <div class="card-body c-p-16 c-p-lg-12 scale-thumb">
                    <a href="${p.link}"
                       class="flex-grow-1 d-flex flex-column js-view-product"
                       data-id="${p.id}"
                       data-title="${p.title}"
                       data-module="${p.module}"
                       data-category="${p.category}"
                       data-image="${p.image}"
                       data-displaytype="${p.displayType}"
                       data-child='${JSON.stringify(p.data_child)}'>

                        <div class="card-thumb c-mb-8">
                            <img width="200" height="120"
                                 src="${p.image}"
                                 alt="${p.title}"
                                 class="lazy card-thumb-image"
                                 loading="lazy">
                        </div>

                        <div class="card-attr">
                            <div class="text-title fw-700 text-limit limit-1">${p.title}</div>
                            <div class="info-attr" style="opacity:.85;">
                                Giao dịch: <b>${formatNumber(p.view ?? randomView(p.id))}</b>
                            </div>
                        </div>

                    </a>
                </div>
            </div>
        </div>
        `;
    }

    function randomView(seed){ return Math.floor((seed*1234)%9000) + 100; }
    function formatNumber(x){ return x.toString().replace(/\B(?=(\d{3})+(?!d))/g, "."); }

    // Tự render nếu đang ở trang xem lại
    if (isViewedPage) renderViewedProducts();
});
