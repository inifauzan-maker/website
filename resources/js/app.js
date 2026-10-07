const tombolMenu = document.querySelector('[data-menu-toggle]');
const menuPonsel = document.getElementById('menu-ponsel');

if (tombolMenu && menuPonsel) {
    tombolMenu.addEventListener('click', () => {
        const terbuka = tombolMenu.getAttribute('aria-expanded') !== 'true';
        tombolMenu.setAttribute('aria-expanded', String(terbuka));
        menuPonsel.hidden = !terbuka;
    });

    menuPonsel.querySelectorAll('a').forEach((tautan) => {
        tautan.addEventListener('click', () => {
            tombolMenu.setAttribute('aria-expanded', 'false');
            menuPonsel.hidden = true;
        });
    });
}

const pilihanBelajar = [...document.querySelectorAll('[data-tab]')];
const panelBelajar = [...document.querySelectorAll('[data-panel]')];

function pilihModelBelajar(tombol, pindahkanFokus = false) {
    pilihanBelajar.forEach((pilihan) => {
        const terpilih = pilihan === tombol;
        pilihan.setAttribute('aria-selected', String(terpilih));
        pilihan.tabIndex = terpilih ? 0 : -1;
    });
    panelBelajar.forEach((panel) => {
        panel.hidden = panel.dataset.panel !== tombol.dataset.tab;
    });
    if (pindahkanFokus) {
        tombol.focus();
    }
}

pilihanBelajar.forEach((tombol, indeks) => {
    tombol.addEventListener('click', () => pilihModelBelajar(tombol));
    tombol.addEventListener('keydown', (event) => {
        let tujuan;
        if (event.key === 'ArrowRight') tujuan = (indeks + 1) % pilihanBelajar.length;
        if (event.key === 'ArrowLeft') tujuan = (indeks - 1 + pilihanBelajar.length) % pilihanBelajar.length;
        if (event.key === 'Home') tujuan = 0;
        if (event.key === 'End') tujuan = pilihanBelajar.length - 1;
        if (tujuan !== undefined) {
            event.preventDefault();
            pilihModelBelajar(pilihanBelajar[tujuan], true);
        }
    });
});
