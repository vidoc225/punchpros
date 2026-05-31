(function () {
    'use strict';

    var sidebar  = document.getElementById('pp-mini-cart');
    var overlay  = document.getElementById('pp-cart-overlay');
    var closeBtn = document.getElementById('pp-cart-close');
    var contBtn  = document.getElementById('pp-cart-continue');
    var itemsEl  = document.getElementById('pp-cart-items');
    var footerEl = document.getElementById('pp-cart-footer');
    var totalEl  = document.getElementById('pp-cart-total');

    if (!sidebar) return;

    /* ── Open / Close ── */
    function openCart() {
        sidebar.classList.remove('translate-x-full');
        sidebar.classList.add('translate-x-0');
        overlay.classList.remove('opacity-0', 'pointer-events-none');
        overlay.classList.add('opacity-100');
        document.body.style.overflow = 'hidden';
    }

    function closeCart() {
        sidebar.classList.remove('translate-x-0');
        sidebar.classList.add('translate-x-full');
        overlay.classList.remove('opacity-100');
        overlay.classList.add('opacity-0', 'pointer-events-none');
        document.body.style.overflow = '';
    }

    closeBtn.addEventListener('click', closeCart);
    contBtn.addEventListener('click', closeCart);
    overlay.addEventListener('click', closeCart);

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') closeCart();
    });

    /* ── Render cart contents ── */
    function render(data) {
        var items = data.items;

        if (!items || items.length === 0) {
            itemsEl.innerHTML = '<p class="text-gray-400 text-center py-10">Je winkelwagen is leeg.</p>';
            footerEl.classList.add('hidden');
            return;
        }

        var html = '';
        items.forEach(function (item) {
            html += '<div class="flex gap-4 py-4 border-b border-gray-100" data-key="' + item.key + '">';
            html += '  <a href="' + item.permalink + '" class="flex-shrink-0">';
            html += '    <img src="' + item.thumbnail + '" alt="" class="w-16 h-16 object-contain rounded bg-gray-50 p-1">';
            html += '  </a>';
            html += '  <div class="flex-1 min-w-0">';
            html += '    <a href="' + item.permalink + '" class="text-sm font-bold text-black no-underline hover:text-black block truncate" style="text-transform:none">' + item.name + '</a>';
            html += '    <p class="text-xs text-gray-400 mt-1 mb-0">Aantal: ' + item.qty + '</p>';
            html += '    <p class="text-sm font-semibold text-gray-700 mt-1 mb-0" style="font-family:var(--font-body)">' + item.price + '</p>';
            html += '  </div>';
            html += '  <button class="pp-remove-item flex-shrink-0 text-gray-300 hover:text-red-500 transition-colors bg-transparent border-0 cursor-pointer p-0 self-start mt-1" data-key="' + item.key + '" aria-label="Verwijderen">';
            html += '    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>';
            html += '  </button>';
            html += '</div>';
        });

        itemsEl.innerHTML = html;
        totalEl.innerHTML = data.total;
        footerEl.classList.remove('hidden');

        // Bind remove buttons
        itemsEl.querySelectorAll('.pp-remove-item').forEach(function (btn) {
            btn.addEventListener('click', function () {
                removeItem(this.getAttribute('data-key'));
            });
        });
    }

    /* ── Fetch cart via AJAX ── */
    function fetchCart(callback) {
        var fd = new FormData();
        fd.append('action', 'pp_get_mini_cart');
        fd.append('nonce', ppCart.nonce);

        fetch(ppCart.ajaxUrl, { method: 'POST', body: fd, credentials: 'same-origin' })
            .then(function (r) { return r.json(); })
            .then(function (res) {
                if (res.success) {
                    render(res.data);
                    updateHeaderCount(res.data.count);
                    if (callback) callback();
                }
            });
    }

    /* ── Remove item ── */
    function removeItem(key) {
        var fd = new FormData();
        fd.append('action', 'pp_remove_cart_item');
        fd.append('cart_key', key);
        fd.append('nonce', ppCart.nonce);

        fetch(ppCart.ajaxUrl, { method: 'POST', body: fd, credentials: 'same-origin' })
            .then(function (r) { return r.json(); })
            .then(function (res) {
                if (res.success) {
                    render(res.data);
                    updateHeaderCount(res.data.count);
                }
            });
    }

    /* ── Update header cart badge ── */
    function updateHeaderCount(count) {
        var badges = document.querySelectorAll('.site-header .bg-primary');
        badges.forEach(function (badge) {
            badge.textContent = count;
        });
    }

    /* ── WooCommerce jQuery event: added_to_cart (shop archive AJAX buttons) ── */
    function bindWooEvents() {
        if (window.jQuery) {
            jQuery(document.body).on('added_to_cart', function () {
                fetchCart(openCart);
            });
        }
    }

    // Bind immediately if jQuery is ready, otherwise wait
    if (window.jQuery) {
        bindWooEvents();
    } else {
        document.addEventListener('DOMContentLoaded', bindWooEvents);
    }

    /* ── Single product page: intercept form submit ── */
    var singleForm = document.querySelector('form.cart');
    if (singleForm) {
        singleForm.addEventListener('submit', function (e) {
            var btn = singleForm.querySelector('.single_add_to_cart_button');
            if (!btn || btn.classList.contains('disabled')) return;

            var productId = singleForm.querySelector('input[name="add-to-cart"]') ||
                            singleForm.querySelector('button[name="add-to-cart"]');
            if (!productId) return;

            e.preventDefault();

            var fd = new FormData(singleForm);
            btn.classList.add('loading');
            btn.setAttribute('disabled', 'disabled');

            fetch(window.location.href, {
                method: 'POST',
                body: fd,
                credentials: 'same-origin',
            }).then(function () {
                btn.classList.remove('loading');
                btn.removeAttribute('disabled');
                fetchCart(openCart);
            }).catch(function () {
                btn.classList.remove('loading');
                btn.removeAttribute('disabled');
            });
        });
    }

    /* ── Cart icon in header opens sidebar instead of navigating ── */
    var cartLinks = document.querySelectorAll('a[href*="cart"]');
    cartLinks.forEach(function (link) {
        if (link.closest('.site-header') || link.closest('#masthead')) {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                fetchCart(openCart);
            });
        }
    });

})();
