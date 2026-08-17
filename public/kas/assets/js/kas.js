/* ============================================================
   Aplikasi Buku Kas - Frontend Prototype (tanpa backend)
   ------------------------------------------------------------
   - Semua data disimpan di localStorage browser (simulasi).
   - Kerangka header / sidebar / footer dibuat oleh JS ini dan
     memakai tema Metronic dari public/admin/assets.
   - Setiap halaman memanggil kasApp.init({...}) lalu mengisi
     konten via onReady.
   ============================================================ */
(function (global) {
    'use strict';

    var K_TRX = 'kas_trx_v1';
    var K_KAT = 'kas_kat_v1';
    var K_SALDO = 'kas_saldo_awal_v1';
    var K_THEME = 'kas_theme_v1';
    var K_SEED = 'kas_seed_v2';

    var BULAN = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    var HARI = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    var METODE = ['Tunai', 'Transfer Bank', 'QRIS', 'Kartu Debit'];
    var WARNA_KAT = ['#1b84ff', '#50cd89', '#f1416c', '#ff9c1a', '#ffc700', '#7239ea', '#ff6a3d', '#29a6a3', '#3e97ff', '#a7a7c4'];
    var IKON_KAT = ['ki-shop', 'ki-heart', 'ki-wallet', 'ki-star', 'ki-user', 'ki-receipt',
        'ki-cup', 'ki-bus', 'ki-electricity', 'ki-briefcase', 'ki-flag', 'ki-gift', 'ki-document', 'ki-minus'];

    /* ---------------- Storage ---------------- */
    function load(key, fb) {
        try {
            var raw = localStorage.getItem(key);
            return raw ? JSON.parse(raw) : fb;
        } catch (e) { return fb; }
    }
    function save(key, val) {
        try { localStorage.setItem(key, JSON.stringify(val)); } catch (e) {}
    }

    /* ---------------- Util tanggal & angka ---------------- */
    function pad(n) { return (n < 10 ? '0' : '') + n; }
    function toISO(d) { return d.getFullYear() + '-' + pad(d.getMonth() + 1) + '-' + pad(d.getDate()); }
    function isoToday() { return toISO(new Date()); }
    function daysAgo(n) { var d = new Date(); d.setDate(d.getDate() - n); return toISO(d); }
    function monthKey(iso) { return String(iso).slice(0, 7); }

    function formatTanggal(iso) {
        if (!iso) return '-';
        var p = String(iso).split('-');
        return (+p[2]) + ' ' + BULAN[(+p[1]) - 1] + ' ' + p[0];
    }
    function formatTanggalPendek(iso) {
        if (!iso) return '-';
        var p = String(iso).split('-');
        return pad(+p[2]) + '/' + pad(+p[1]) + '/' + p[0];
    }
    function formatRupiah(n) {
        return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 }).format(Number(n) || 0);
    }
    function formatAngka(n) {
        return new Intl.NumberFormat('id-ID', { maximumFractionDigits: 0 }).format(Number(n) || 0);
    }

    /* ---------------- Seed data ---------------- */
    function seedIfEmpty() {
        if (localStorage.getItem(K_SEED)) return;

        var katMasuk = [
            { nama: 'Penjualan', tipe: 'masuk', warna: '#50cd89', ikon: 'ki-shop' },
            { nama: 'Donasi', tipe: 'masuk', warna: '#7239ea', ikon: 'ki-heart' },
            { nama: 'Iuran Anggota', tipe: 'masuk', warna: '#1b84ff', ikon: 'ki-wallet' },
            { nama: 'Lain-lain Masuk', tipe: 'masuk', warna: '#29a6a3', ikon: 'ki-star' }
        ];
        var katKeluar = [
            { nama: 'Gaji & Honor', tipe: 'keluar', warna: '#f1416c', ikon: 'ki-user' },
            { nama: 'Belanja ATK', tipe: 'keluar', warna: '#ff9c1a', ikon: 'ki-receipt' },
            { nama: 'Konsumsi', tipe: 'keluar', warna: '#ffc700', ikon: 'ki-cup' },
            { nama: 'Transportasi', tipe: 'keluar', warna: '#ff6a3d', ikon: 'ki-bus' },
            { nama: 'Listrik & Air', tipe: 'keluar', warna: '#3e97ff', ikon: 'ki-electricity' },
            { nama: 'Lain-lain Keluar', tipe: 'keluar', warna: '#a7a7c4', ikon: 'ki-minus' }
        ];

        // [hari lalu, tipe, kategori, keterangan, jumlah, metode]
        var seed = [
            [120, 'masuk', 'Iuran Anggota', 'Iuran anggota bulanan', 250000, 'Tunai'],
            [118, 'keluar', 'Belanja ATK', 'Kertas & tinta printer', 175000, 'Tunai'],
            [110, 'masuk', 'Donasi', 'Donasi untuk renovasi', 1500000, 'Transfer Bank'],
            [107, 'keluar', 'Transportasi', 'Bensin antar jemput', 120000, 'Tunai'],
            [96, 'keluar', 'Listrik & Air', 'Tagihan listrik & air', 450000, 'Transfer Bank'],
            [90, 'masuk', 'Penjualan', 'Penjualan buku & merchandise', 875000, 'Tunai'],
            [88, 'keluar', 'Konsumsi', 'Snack rapat koordinasi', 230000, 'Tunai'],
            [82, 'masuk', 'Iuran Anggota', 'Iuran anggota bulanan', 250000, 'Tunai'],
            [79, 'keluar', 'Gaji & Honor', 'Honor staf minggu ke-2', 2000000, 'Transfer Bank'],
            [70, 'keluar', 'Belanja ATK', 'Pengadaan buku agenda', 320000, 'Tunai'],
            [62, 'masuk', 'Penjualan', 'Penjualan buku & merchandise', 720000, 'QRIS'],
            [55, 'keluar', 'Transportasi', 'Bensin operasional', 150000, 'Tunai'],
            [52, 'masuk', 'Donasi', 'Donasi perorangan', 600000, 'Transfer Bank'],
            [48, 'keluar', 'Konsumsi', 'Konsumsi acara pengajian', 410000, 'Tunai'],
            [45, 'keluar', 'Listrik & Air', 'Tagihan listrik & air', 435000, 'Transfer Bank'],
            [40, 'keluar', 'Gaji & Honor', 'Honor staf', 2000000, 'Transfer Bank'],
            [33, 'masuk', 'Iuran Anggota', 'Iuran anggota bulanan', 250000, 'Tunai'],
            [29, 'keluar', 'Belanja ATK', 'Alat tulis & map', 185000, 'Tunai'],
            [25, 'masuk', 'Penjualan', 'Penjualan buku & merchandise', 940000, 'QRIS'],
            [20, 'keluar', 'Transportasi', 'Bensin operasional', 160000, 'Tunai'],
            [17, 'keluar', 'Konsumsi', 'Konsumsi rapat bulanan', 275000, 'Tunai'],
            [14, 'masuk', 'Donasi', 'Donasi untuk kegiatan', 750000, 'Transfer Bank'],
            [10, 'keluar', 'Belanja ATK', 'Tinta printer & kertas', 210000, 'Tunai'],
            [7, 'keluar', 'Gaji & Honor', 'Honor staf minggu ke-2', 2000000, 'Transfer Bank'],
            [5, 'masuk', 'Iuran Anggota', 'Iuran anggota bulanan', 250000, 'Tunai'],
            [3, 'keluar', 'Konsumsi', 'Konsumsi kunjungan tamu', 340000, 'Tunai'],
            [1, 'masuk', 'Penjualan', 'Penjualan buku & merchandise', 685000, 'QRIS'],
            [0, 'keluar', 'Listrik & Air', 'Tagihan listrik & air', 425000, 'Transfer Bank']
        ];

        var kat = katMasuk.concat(katKeluar);
        kat.forEach(function (k, i) { k.id = Date.now() + 1000 + i; });

        var trx = seed.map(function (t, i) {
            return {
                id: Date.now() + i,
                tanggal: daysAgo(t[0]),
                tipe: t[1],
                kategori: t[2],
                keterangan: t[3],
                jumlah: t[4],
                metode: t[5]
            };
        });

        save(K_KAT, kat);
        save(K_TRX, trx);
        save(K_SALDO, 5000000);
        save(K_SEED, '1');
    }

    /* ---------------- API data ---------------- */
    function getTrx() { return load(K_TRX, []); }
    function saveTrx(list) { save(K_TRX, list); }
    function getKat() { return load(K_KAT, []); }
    function saveKat(list) { save(K_KAT, list); }
    function getSaldoAwal() { return Number(load(K_SALDO, 0)) || 0; }
    function setSaldoAwal(n) { save(K_SALDO, Number(n) || 0); }

    function sortedTrx(list) {
        return list.slice().sort(function (a, b) {
            if (a.tanggal === b.tanggal) return b.id - a.id;
            return a.tanggal < b.tanggal ? 1 : -1;
        });
    }
    function sumTipe(list, tipe) {
        return list.filter(function (t) { return t.tipe === tipe; })
            .reduce(function (acc, t) { return acc + (Number(t.jumlah) || 0); }, 0);
    }
    function saldoBerjalan() {
        return getSaldoAwal() + sumTipe(getTrx(), 'masuk') - sumTipe(getTrx(), 'keluar');
    }
    function namaKategori(nama) {
        var kat = getKat().filter(function (k) { return k.nama === nama; })[0];
        return kat || null;
    }
    function trxById(id) {
        return getTrx().filter(function (t) { return t.id === id; })[0] || null;
    }
    function addTrx(data) {
        var list = getTrx();
        data.id = Date.now() + Math.floor(Math.random() * 1000);
        list.push(data);
        saveTrx(list);
        return data;
    }
    function updateTrx(id, data) {
        saveTrx(getTrx().map(function (t) { return t.id === id ? Object.assign({}, t, data) : t; }));
    }
    function removeTrx(id) {
        saveTrx(getTrx().filter(function (t) { return t.id !== id; }));
    }
    function addKat(data) {
        var list = getKat();
        data.id = Date.now() + Math.floor(Math.random() * 1000);
        list.push(data);
        saveKat(list);
        return data;
    }
    function updateKat(id, data) {
        saveKat(getKat().map(function (k) { return k.id === id ? Object.assign({}, k, data) : k; }));
    }
    function removeKat(id) {
        saveKat(getKat().filter(function (k) { return k.id !== id; }));
    }

    /* ---------------- Helper dropdown ---------------- */
    function lastMonths(n) {
        var out = [], d = new Date();
        d.setDate(1);
        for (var i = 0; i < n; i++) {
            out.push(toISO(d).slice(0, 7));
            d.setMonth(d.getMonth() - 1);
        }
        return out;
    }
    function bulanOptions(selected, includeSemua) {
        var months = lastMonths(12).reverse();
        var html = includeSemua ? '<option value="">Semua Periode</option>' : '';
        months.forEach(function (m) {
            var label = BULAN[parseInt(m.slice(5), 10) - 1] + ' ' + m.slice(0, 4);
            html += '<option value="' + m + '"' + (m === selected ? ' selected' : '') + '>' + label + '</option>';
        });
        return html;
    }
    function metodeOptions(selected) {
        return METODE.map(function (m) {
            return '<option value="' + m + '"' + (m === selected ? ' selected' : '') + '>' + m + '</option>';
        }).join('');
    }
    function kategoriOptions(tipe, selected, autoSelect) {
        var list = getKat().filter(function (k) { return k.tipe === tipe; });
        var html = '<option value="">-- Pilih Kategori --</option>';
        list.forEach(function (k) {
            var isSel = k.nama === selected || (autoSelect && !selected && k.nama === list[0].nama);
            html += '<option value="' + k.nama + '"' + (isSel ? ' selected' : '') + '>' + k.nama + '</option>';
        });
        return html;
    }

    /* ---------------- Shell: header / sidebar / footer ---------------- */
    var MENU = [
        { page: 'dashboard', href: 'index.html', icon: 'ki-home', title: 'Dashboard' },
        { page: 'transaksi', href: 'transaksi.html', icon: 'ki-receipt', title: 'Transaksi Kas' },
        { page: 'buku-kas', href: 'buku-kas.html', icon: 'ki-book-open', title: 'Buku Kas' },
        { page: 'kategori', href: 'kategori.html', icon: 'ki-category', title: 'Kategori' },
        { page: 'laporan', href: 'laporan.html', icon: 'ki-notepad', title: 'Laporan' }
    ];

    function headerHTML() {
        return '' +
            '<div id="kt_app_header" class="app-header" data-kt-sticky="true" data-kt-sticky-name="app-header-minimize" data-kt-sticky-offset="{default: \'200px\', lg: \'0\'}" data-kt-sticky-animation="true">' +
            '  <div class="app-container container-fluid d-flex align-items-stretch justify-content-between" id="kt_app_header_container">' +
            '    <div class="d-flex align-items-center d-lg-none ms-n3 me-1 me-md-2" title="Tampilkan menu">' +
            '      <div class="btn btn-icon btn-active-color-primary w-35px h-35px" id="kt_app_sidebar_mobile_toggle">' +
            '        <i class="ki-outline ki-abstract-14 fs-2 fs-md-1"></i>' +
            '      </div>' +
            '    </div>' +
            '    <div class="flex-1 d-flex align-items-center flex-lg-grow-0">' +
            '      <a href="index.html" class="d-lg-none">' +
            '        <img alt="Logo" src="../admin/assets/media/logos/default-small.svg" class="h-30px" />' +
            '      </a>' +
            '    </div>' +
            '    <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">' +
            '      <div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="{default: \'append\', lg: \'prepend\'}" data-kt-swapper-parent="{default: \'#kt_app_body\', lg: \'#kt_app_header_wrapper\'}">' +
            '        <div class="px-2 my-5 menu menu-rounded menu-column menu-lg-row my-lg-0 align-items-stretch fw-semibold px-lg-0" id="kt_app_header_menu" data-kt-menu="true">' +
            '          <div data-kt-menu-trigger="{default: \'click\', lg: \'hover\'}" data-kt-menu-placement="bottom-start" class="menu-item menu-here-bg menu-lg-down-accordion me-0 me-lg-2">' +
            '            <span class="menu-link"><span class="menu-title">Aplikasi Buku Kas</span></span>' +
            '          </div>' +
            '        </div>' +
            '      </div>' +
            '      <div class="shrink-0 app-navbar">' +
            '        <div class="app-navbar-item ms-1 ms-md-4">' +
            '          <span class="px-4 py-3 badge fs-7 badge-light-primary">' +
            '            <span class="bullet bullet-dot bg-primary h-6px w-6px animation-blink me-2"></span>' +
            '            <label id="kas-clock-date"></label> - <label id="kas-clock"></label>' +
            '          </span>' +
            '        </div>' +
            '        <div class="app-navbar-item ms-1 ms-md-4">' +
            '          <a href="#" class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-35px h-35px" id="kas-theme-toggle" title="Ganti tema gelap/terang">' +
            '            <i class="ki-outline ki-night-day theme-light-show fs-1"></i>' +
            '            <i class="ki-outline ki-moon theme-dark-show fs-1"></i>' +
            '          </a>' +
            '        </div>' +
            '        <div class="app-navbar-item ms-1 ms-md-4" id="kt_header_user_menu_toggle">' +
            '          <div class="cursor-pointer symbol symbol-35px" data-kt-menu-trigger="{default: \'click\', lg: \'hover\'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">' +
            '            <div class="symbol-label fs-4 fw-bold bg-light-primary text-primary rounded-3">B</div>' +
            '          </div>' +
            '          <div class="py-4 menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold fs-6 w-250px" data-kt-menu="true">' +
            '            <div class="px-3 menu-item">' +
            '              <div class="px-3 menu-content d-flex align-items-center">' +
            '                <div class="symbol symbol-50px me-5"><div class="symbol-label fs-3 fw-bold bg-light-primary text-primary rounded-3">B</div></div>' +
            '                <div class="d-flex flex-column">' +
            '                  <div class="fw-bold fs-5">Bendahara</div>' +
            '                  <span class="fw-semibold text-muted fs-7">Pengelola Buku Kas</span>' +
            '                </div>' +
            '              </div>' +
            '            </div>' +
            '          </div>' +
            '        </div>' +
            '      </div>' +
            '    </div>' +
            '  </div>' +
            '</div>';
    }

    function sidebarHTML(activePage) {
        var items = MENU.map(function (m) {
            return '' +
                '<div class="menu-item">' +
                '  <a class="menu-link ' + (m.page === activePage ? 'active' : '') + '" href="' + m.href + '">' +
                '    <span class="menu-icon"><i class="ki-outline ' + m.icon + ' fs-2"></i></span>' +
                '    <span class="menu-title">' + m.title + '</span>' +
                '  </a>' +
                '</div>';
        }).join('');

        return '' +
            '<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">' +
            '  <div class="px-6 app-sidebar-logo" id="kt_app_sidebar_logo">' +
            '    <a href="index.html">' +
            '      <img alt="Logo" src="../admin/assets/media/logos/default.svg" class="h-35px app-sidebar-logo-default theme-light-show" />' +
            '      <img alt="Logo" src="../admin/assets/media/logos/default-dark.svg" class="h-35px app-sidebar-logo-default theme-dark-show" />' +
            '    </a>' +
            '    <div id="kt_app_sidebar_toggle" class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary h-30px w-30px position-absolute top-50 start-100 translate-middle rotate" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="app-sidebar-minimize">' +
            '      <i class="rotate-180 ki-outline ki-black-left-line fs-3"></i>' +
            '    </div>' +
            '  </div>' +
            '  <div class="overflow-hidden app-sidebar-menu flex-column-fluid">' +
            '    <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper">' +
            '      <div id="kt_app_sidebar_menu_scroll" class="mx-3 my-5 scroll-y" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">' +
            '        <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold fs-6" id="kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">' +
            '          <div class="pt-5 menu-item"><div class="menu-content"><span class="menu-heading fw-bold text-uppercase fs-7">Menu Utama</span></div></div>' +
            items +
            '        </div>' +
            '      </div>' +
            '    </div>' +
            '  </div>' +
            '</div>';
    }

    function toolbarHTML(cfg) {
        var crumb = (cfg.crumbs || []).map(function (c, i) {
            var last = i === cfg.crumbs.length - 1;
            if (last) {
                return '<li class="breadcrumb-item text-muted">' + c[0] + '</li>';
            }
            return '<li class="breadcrumb-item text-muted"><a href="' + c[1] + '" class="text-muted text-hover-primary">' + c[0] + '</a></li>' +
                '<li class="breadcrumb-item"><span class="bullet bg-gray-500 w-5px h-2px"></span></li>';
        }).join('');

        return '' +
            '<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6 no-print">' +
            '  <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">' +
            '    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">' +
            '      <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">' + cfg.title + '</h1>' +
            '      <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">' + crumb + '</ul>' +
            '    </div>' +
            '    ' + (cfg.toolbarExtra || '') +
            '  </div>' +
            '</div>';
    }

    function footerHTML() {
        return '' +
            '<div id="kt_app_footer" class="app-footer no-print">' +
            '  <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">' +
            '    <div class="text-gray-900 order-2 order-md-1">' +
            '      <span class="text-muted fw-semibold me-1">2026&copy;</span>' +
            '      <a href="#" class="text-gray-800 text-hover-primary">Aplikasi Buku Kas</a>' +
            '    </div>' +
            '    <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">' +
            '      <li class="menu-item"><a href="index.html" class="menu-link px-2">Beranda</a></li>' +
            '      <li class="menu-item"><a href="laporan.html" class="menu-link px-2">Laporan</a></li>' +
            '    </ul>' +
            '  </div>' +
            '</div>';
    }

    function renderShell(cfg) {
        var shell = document.createElement('div');
        shell.className = 'd-flex flex-column flex-root app-root';
        shell.id = 'kt_app_root';
        shell.innerHTML =
            '<div class="app-page flex-column flex-column-fluid" id="kt_app_page">' +
            headerHTML() +
            '<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">' +
            sidebarHTML(cfg.page) +
            '<div class="app-main flex-column flex-row-fluid" id="kt_app_main">' +
            '<div class="d-flex flex-column flex-column-fluid">' +
            toolbarHTML(cfg) +
            '<div id="kt_app_content" class="app-content flex-column-fluid">' +
            '<div id="kt_app_content_container" class="app-container container-fluid">' +
            '<div id="kas-page-body"></div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            footerHTML() +
            '</div>' +
            '</div>' +
            '</div>';

        document.body.appendChild(shell);
        var pageContent = document.getElementById('page-content');
        if (pageContent) {
            document.getElementById('kas-page-body').appendChild(pageContent);
        }
    }

    /* ---------------- Jam & tema ---------------- */
    function startClock() {
        var elDate = document.getElementById('kas-clock-date');
        var elTime = document.getElementById('kas-clock');
        if (!elDate || !elTime) return;
        function tick() {
            var now = new Date();
            elDate.textContent = HARI[now.getDay()] + ', ' + now.getDate() + ' ' + BULAN[now.getMonth()] + ' ' + now.getFullYear();
            elTime.textContent = now.toLocaleTimeString('id-ID');
        }
        tick();
        setInterval(tick, 1000);
    }

    function initTheme() {
        var mode = load(K_THEME, 'light');
        document.documentElement.setAttribute('data-bs-theme', mode);
        var btn = document.getElementById('kas-theme-toggle');
        if (btn) {
            btn.addEventListener('click', function (e) {
                e.preventDefault();
                var cur = document.documentElement.getAttribute('data-bs-theme') === 'dark' ? 'light' : 'dark';
                document.documentElement.setAttribute('data-bs-theme', cur);
                save(K_THEME, cur);
            });
        }
    }

    /* ---------------- Swal helpers ---------------- */
    function confirmDelete(message, onOk) {
        if (typeof Swal === 'undefined') { onOk(); return; }
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: message,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal',
            customClass: { confirmButton: 'btn btn-danger', cancelButton: 'btn btn-secondary' },
            buttonsStyling: false
        }).then(function (result) {
            if (result.isConfirmed && onOk) onOk();
        });
    }

    function toast(title, icon) {
        if (typeof Swal === 'undefined') { return; }
        Swal.fire({
            title: title,
            icon: icon || 'success',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2200,
            timerProgressBar: true
        });
    }

    /* ---------------- Inisialisasi ---------------- */
    function init(cfg) {
        seedIfEmpty();
        renderShell(cfg);
        startClock();
        initTheme();
        if (global.KTComponents) { try { global.KTComponents.init(); } catch (e) {} }
        if (typeof cfg.onReady === 'function') cfg.onReady();
    }

    /* ---------------- API publik ---------------- */
    global.kasApp = {
        init: init,
        // data
        getTrx: getTrx, addTrx: addTrx, updateTrx: updateTrx, removeTrx: removeTrx, trxById: trxById,
        getKat: getKat, addKat: addKat, updateKat: updateKat, removeKat: removeKat,
        getSaldoAwal: getSaldoAwal, setSaldoAwal: setSaldoAwal,
        sortedTrx: sortedTrx, sumTipe: sumTipe, saldoBerjalan: saldoBerjalan, namaKategori: namaKategori,
        // util
        formatRupiah: formatRupiah, formatAngka: formatAngka, formatTanggal: formatTanggal,
        formatTanggalPendek: formatTanggalPendek, isoToday: isoToday, monthKey: monthKey,
        daysAgo: daysAgo, lastMonths: lastMonths,
        bulanOptions: bulanOptions, metodeOptions: metodeOptions, kategoriOptions: kategoriOptions,
        BULAN: BULAN, METODE: METODE, WARNA_KAT: WARNA_KAT, IKON_KAT: IKON_KAT,
        confirmDelete: confirmDelete, toast: toast
    };
})(window);
