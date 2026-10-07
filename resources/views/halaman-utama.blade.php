<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Kenali Kursus Gambar Anak: ruang bereksplorasi melalui gambar, warna, dan cerita. Pilihan belajar offline, online, serta hybrid di Jakarta Pusat dan Jakarta Selatan.">
    <meta name="theme-color" content="#f8f6ee">
    <title>Kursus Gambar Anak — Setiap coretan punya cerita</title>
    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-kertas font-sans text-tinta antialiased">
    <a href="#utama" class="sr-only fixed top-4 left-4 z-50 rounded-xl bg-hutan px-5 py-3 text-white focus:not-sr-only">Langsung ke isi halaman</a>
    <header class="border-b border-hutan/10">
        <div class="mx-auto flex max-w-7xl items-center justify-between gap-6 px-6 py-5 lg:px-10">
            <a href="{{ route('beranda') }}" class="flex items-center gap-3" aria-label="Kursus Gambar Anak, beranda">
                <span class="flex size-11 rotate-[-7deg] items-center justify-center rounded-2xl bg-hutan text-white" aria-hidden="true">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none"><path d="m5 18 2-6L17 2l5 5-10 10-7 1Zm2-6 5 5M15 4l5 5M4 22h16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </span>
                <span class="text-base leading-tight font-bold tracking-tight">Kursus Gambar<span class="block text-hutan">Anak<span class="text-jingga">.</span></span></span>
            </a>
            <nav aria-label="Navigasi utama" class="hidden items-center gap-7 text-sm font-medium md:flex">
                <a href="#eksplorasi" class="hover:text-hutan">Eksplorasi</a>
                <a href="#cara-belajar" class="hover:text-hutan">Cara belajar</a>
                <a href="#cabang" class="hover:text-hutan">Cabang kami</a>
            </nav>
            <a href="#cara-belajar" class="hidden items-center gap-5 rounded-full border border-hutan/25 px-5 py-3 text-sm font-semibold transition hover:bg-hutan hover:text-white sm:inline-flex">Kenali kelas <span aria-hidden="true">↗</span></a>
            <button type="button" data-menu-toggle aria-expanded="false" aria-controls="menu-ponsel" class="rounded-xl border border-hutan/20 px-4 py-2 text-sm font-semibold md:hidden">Menu <span aria-hidden="true">＋</span></button>
        </div>
        <nav id="menu-ponsel" aria-label="Navigasi ponsel" hidden class="border-t border-hutan/10 px-6 py-4 md:hidden">
            <div class="flex flex-col gap-4 text-sm font-medium"><a href="#eksplorasi">Eksplorasi</a><a href="#cara-belajar">Cara belajar</a><a href="#cabang">Cabang kami</a></div>
        </nav>
    </header>

    <main id="utama">
        <section class="mx-auto grid max-w-7xl items-center gap-8 px-6 pt-12 pb-14 lg:grid-cols-2 lg:gap-4 lg:px-10 lg:pt-16 lg:pb-20" aria-labelledby="judul-utama">
            <div>
                <p class="mb-7 inline-flex items-center gap-2 rounded-full bg-daun px-4 py-2 text-xs font-semibold tracking-wide text-hutan"><span class="size-1.5 rounded-full bg-hutan" aria-hidden="true"></span> RUANG KECIL UNTUK IDE BESAR</p>
                <h1 id="judul-utama" class="max-w-xl text-[clamp(3.1rem,6vw,5.3rem)] leading-[1.04] font-semibold tracking-[-0.055em]">Setiap coretan<br>punya <span class="cerita inline-block font-serif font-medium italic text-hutan">cerita.</span></h1>
                <p class="mt-8 max-w-md text-base leading-7 text-tinta/70 lg:text-lg">Beri imajinasi si kecil ruang untuk tumbuh. Jelajahi gambar, warna, dan cerita lewat pengalaman belajar yang menyenangkan.</p>
                <div class="mt-8 flex flex-wrap items-center gap-4">
                    <a href="#eksplorasi" class="inline-flex items-center gap-8 rounded-full bg-hutan px-7 py-4 text-sm font-semibold text-white transition hover:bg-hutan/90">Mulai eksplorasi <span aria-hidden="true">↗</span></a>
                    <a href="#cara-belajar" class="inline-flex items-center gap-2 px-2 py-3 text-sm font-semibold">Lihat cara belajar <span aria-hidden="true">→</span></a>
                </div>
                <div class="mt-10 flex flex-wrap gap-x-5 gap-y-2 text-xs font-medium text-tinta/65">
                    <span class="flex items-center gap-2"><span class="text-hutan" aria-hidden="true">✓</span> Offline, online & hybrid</span>
                    <span class="flex items-center gap-2"><span class="text-hutan" aria-hidden="true">✓</span> Dua cabang di Jakarta</span>
                </div>
            </div>
            <figure class="relative mx-auto w-full max-w-xl">
                <img src="{{ asset('ilustrasi-kreativitas.svg') }}" alt="Ilustrasi karya menggambar: matahari, bukit hijau, bunga, dan pensil di atas kertas" width="650" height="580" fetchpriority="high" class="w-full">
                <figcaption class="absolute top-[17%] right-0 rotate-[7deg] rounded-xl border border-hutan/10 bg-kertas px-4 py-3 text-xs font-semibold shadow-sm sm:text-sm">Imajinasi boleh ke mana saja ✦</figcaption>
                <span aria-hidden="true" class="absolute bottom-[7%] left-[20%] rotate-[-5deg] rounded-full bg-jingga px-5 py-3 text-xs font-bold text-white shadow-sm">Tidak harus sempurna. Mulai saja!</span>
            </figure>
        </section>

        <div class="border-y border-hutan/10 bg-daun/45">
            <div class="mx-auto grid max-w-7xl gap-6 px-6 py-6 text-sm sm:grid-cols-3 lg:px-10">
                <p class="flex items-center gap-3"><span class="text-xl text-hutan" aria-hidden="true">✳</span> Berani mencoba hal baru</p>
                <p class="flex items-center gap-3"><span class="text-xl text-jingga" aria-hidden="true">✦</span> Bebas mengekspresikan diri</p>
                <p class="flex items-center gap-3"><span class="text-xl text-hutan" aria-hidden="true">◒</span> Menikmati setiap prosesnya</p>
            </div>
        </div>

        <section id="eksplorasi" class="mx-auto max-w-7xl scroll-mt-8 px-6 py-20 lg:px-10" aria-labelledby="judul-eksplorasi">
            <div class="flex flex-wrap items-end justify-between gap-6">
                <div><p class="label-bagian">BELAJAR SAMBIL BEREKSPLORASI</p><h2 id="judul-eksplorasi" class="mt-3 text-4xl leading-tight font-semibold tracking-tight sm:text-5xl">Dari ide kecil,<br>jadi karya sendiri.</h2></div>
                <p class="max-w-sm text-sm leading-7 text-tinta/65">Ada banyak cara untuk bercerita. Gambar dan warna menjadi awal untuk mengenal dunia dengan sudut pandang si kecil.</p>
            </div>
            <div class="mt-10 grid gap-5 md:grid-cols-3">
                <article class="rounded-3xl border border-hutan/10 bg-[#ebeedd] p-7">
                    <div class="mb-8 flex h-32 items-center justify-center" aria-hidden="true"><svg width="160" height="120" viewBox="0 0 160 120" fill="none"><path d="M23 91c-8-30 20-64 48-49 18 10 17 33 7 42-10 9-23-9-9-29 25-35 62-20 60 8" stroke="#365d43" stroke-width="6" stroke-linecap="round"/><path d="m110 22 17 7-6 16-17-6Z" fill="#dd875a"/><circle cx="36" cy="26" r="9" fill="#e5bb58"/><path d="M32 104h102" stroke="#365d43" stroke-width="2" stroke-linecap="round"/></svg></div>
                    <span class="text-xs font-semibold text-hutan/65">01 / GARIS & BENTUK</span><h3 class="mt-3 text-2xl font-semibold tracking-tight">Berawal dari coretan</h3><p class="mt-3 text-sm leading-6 text-tinta/65">Mengenal garis dan bentuk sederhana sebagai bahan untuk menggambar apa yang dibayangkan.</p>
                </article>
                <article class="rounded-3xl border border-hutan/10 bg-[#f4e7d9] p-7">
                    <div class="mb-8 flex h-32 items-center justify-center" aria-hidden="true"><svg width="160" height="120" viewBox="0 0 160 120"><circle cx="63" cy="47" r="30" fill="#e99675"/><circle cx="96" cy="47" r="30" fill="#e5bc53" opacity=".85"/><circle cx="80" cy="76" r="30" fill="#6c9271" opacity=".85"/></svg></div>
                    <span class="text-xs font-semibold text-hutan/65">02 / WARNA & CERITA</span><h3 class="mt-3 text-2xl font-semibold tracking-tight">Warna punya bahasa</h3><p class="mt-3 text-sm leading-6 text-tinta/65">Bermain dengan perpaduan warna dan menuangkan cerita ke dalam karya yang terasa personal.</p>
                </article>
                <article class="rounded-3xl border border-hutan/10 bg-[#e5ebed] p-7">
                    <div class="mb-8 flex h-32 items-center justify-center" aria-hidden="true"><svg width="160" height="120" viewBox="0 0 160 120"><rect x="28" y="28" width="64" height="65" rx="3" transform="rotate(-12 28 28)" fill="#719084"/><path d="m81 16 51 33-13 57-55-17Z" fill="#e4b854"/><path d="m65 52 29-14 26 38-38 20Z" fill="#d88b72"/><path d="m37 48 15 37m-6-41 15 37" stroke="#f7f4e9" stroke-width="3"/></svg></div>
                    <span class="text-xs font-semibold text-hutan/65">03 / MEDIA & IMAJINASI</span><h3 class="mt-3 text-2xl font-semibold tracking-tight">Coba, campur, ciptakan</h3><p class="mt-3 text-sm leading-6 text-tinta/65">Menemukan kemungkinan baru melalui tekstur, pola, dan beragam cara membuat karya.</p>
                </article>
            </div>
        </section>

        <section id="cara-belajar" class="bg-hutan px-6 py-16 text-kertas lg:py-20" aria-labelledby="judul-belajar">
            <div class="mx-auto grid max-w-7xl gap-10 lg:grid-cols-[1fr_1.1fr] lg:gap-20 lg:px-4">
                <div><p class="label-bagian text-[#cadab9]">CARA BELAJAR</p><h2 id="judul-belajar" class="mt-4 text-4xl leading-tight font-semibold tracking-tight sm:text-5xl">Ruang berbeda.<br>Semangat yang sama.</h2><p class="mt-6 max-w-sm text-sm leading-7 text-kertas/75">Belajar langsung di studio, dari rumah, atau bergantian keduanya. Kenali pilihan yang sesuai dengan keseharian keluarga.</p></div>
                <div>
                    <div role="tablist" aria-label="Pilihan model belajar" class="flex gap-1 rounded-full border border-white/20 p-1.5">
                        <button id="tab-offline" type="button" role="tab" aria-selected="true" aria-controls="panel-offline" data-tab="offline" class="tab-belajar flex-1 rounded-full px-3 py-3 text-sm font-semibold">Offline</button>
                        <button id="tab-online" type="button" role="tab" aria-selected="false" aria-controls="panel-online" tabindex="-1" data-tab="online" class="tab-belajar flex-1 rounded-full px-3 py-3 text-sm font-semibold">Online</button>
                        <button id="tab-hybrid" type="button" role="tab" aria-selected="false" aria-controls="panel-hybrid" tabindex="-1" data-tab="hybrid" class="tab-belajar flex-1 rounded-full px-3 py-3 text-sm font-semibold">Hybrid</button>
                    </div>
                    <div id="panel-offline" role="tabpanel" aria-labelledby="tab-offline" tabindex="0" data-panel="offline" class="mt-7 rounded-3xl bg-white/8 p-7">
                        <span class="text-3xl text-[#e9c66e]" aria-hidden="true">⌂</span><h3 class="mt-4 text-2xl font-semibold">Berkarya langsung di studio</h3><p class="mt-3 text-sm leading-7 text-kertas/75">Seluruh sesi berlangsung tatap muka di cabang penyelenggara kelas. Pilih Jakarta Pusat atau Jakarta Selatan.</p><p class="mt-6 border-t border-white/15 pt-5 text-xs font-medium text-[#d5e3c4]">Pola pertemuan: offline di setiap sesi</p>
                    </div>
                    <div id="panel-online" role="tabpanel" aria-labelledby="tab-online" tabindex="0" data-panel="online" hidden class="mt-7 rounded-3xl bg-white/8 p-7">
                        <span class="text-3xl text-[#e9c66e]" aria-hidden="true">◎</span><h3 class="mt-4 text-2xl font-semibold">Ruang kreatif dari rumah</h3><p class="mt-3 text-sm leading-7 text-kertas/75">Seluruh sesi berlangsung secara online. Anak mengikuti pertemuan dari rumah melalui tautan yang diberikan kepada peserta terkonfirmasi.</p><p class="mt-6 border-t border-white/15 pt-5 text-xs font-medium text-[#d5e3c4]">Pola pertemuan: online di setiap sesi</p>
                    </div>
                    <div id="panel-hybrid" role="tabpanel" aria-labelledby="tab-hybrid" tabindex="0" data-panel="hybrid" hidden class="mt-7 rounded-3xl bg-white/8 p-7">
                        <span class="text-3xl text-[#e9c66e]" aria-hidden="true">↔</span><h3 class="mt-4 text-2xl font-semibold">Studio dan rumah, bergantian</h3><p class="mt-3 text-sm leading-7 text-kertas/75">Sesi offline dan online berlangsung bergantian mengikuti jadwal kelas. Satu pendaftaran mencakup seluruh rangkaian pertemuan.</p><div class="mt-6 flex flex-wrap items-center gap-2 border-t border-white/15 pt-5 text-xs font-medium" aria-label="Contoh urutan sesi hybrid"><span class="rounded-full bg-daun px-3 py-2 text-hutan">Offline</span><span aria-hidden="true">→</span><span class="rounded-full border border-white/30 px-3 py-2">Online</span><span aria-hidden="true">→</span><span class="rounded-full bg-daun px-3 py-2 text-hutan">Offline</span><span aria-hidden="true">→</span><span class="rounded-full border border-white/30 px-3 py-2">Online</span></div>
                    </div>
                    <noscript><p class="mt-5 text-sm leading-6">Online: semua sesi dari rumah. Hybrid: sesi studio dan online bergantian mengikuti jadwal kelas.</p></noscript>
                </div>
            </div>
        </section>

        <section id="cabang" class="mx-auto max-w-7xl scroll-mt-8 px-6 py-20 lg:px-10" aria-labelledby="judul-cabang">
            <div class="flex flex-wrap items-end justify-between gap-6"><div><p class="label-bagian">DEKAT DENGAN KELUARGA</p><h2 id="judul-cabang" class="mt-3 text-4xl font-semibold tracking-tight sm:text-5xl">Temukan ruang kreatifmu.</h2></div><p class="max-w-xs text-sm leading-7 text-tinta/65">Dua cabang di Jakarta untuk sesi tatap muka dan kelas hybrid.</p></div>
            <div class="mt-10 grid gap-5 md:grid-cols-2">
                @foreach (['Jakarta Pusat', 'Jakarta Selatan'] as $namaCabang)
                    <article class="flex items-center gap-5 rounded-3xl border border-hutan/15 bg-white/40 p-6 sm:p-8">
                        <span class="flex size-16 shrink-0 items-center justify-center rounded-2xl bg-daun text-hutan" aria-hidden="true"><svg width="28" height="28" viewBox="0 0 24 24" fill="none"><path d="M19 10c0 5-7 11-7 11S5 15 5 10a7 7 0 1 1 14 0Z" stroke="currentColor" stroke-width="1.6"/><circle cx="12" cy="10" r="2.5" stroke="currentColor" stroke-width="1.6"/></svg></span>
                        <div><p class="text-xs font-semibold tracking-wider text-hutan/70">CABANG {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</p><h3 class="mt-2 text-2xl font-semibold tracking-tight">{{ $namaCabang }}</h3><p class="mt-2 text-sm text-tinta/60">Offline & hybrid</p></div>
                    </article>
                @endforeach
            </div>
            <p class="mt-5 text-sm text-tinta/60">Alamat lengkap dan informasi jadwal akan diumumkan sebelum pendaftaran dibuka.</p>
        </section>

        <section class="mx-auto max-w-7xl px-6 pb-20 lg:px-10" aria-labelledby="judul-pertanyaan">
            <div class="grid gap-8 border-t border-hutan/15 pt-12 lg:grid-cols-[.8fr_1.2fr]">
                <div><p class="label-bagian">UNTUK ORANG TUA</p><h2 id="judul-pertanyaan" class="mt-3 text-3xl font-semibold tracking-tight">Masih ingin tahu?</h2></div>
                <div class="divide-y divide-hutan/15">
                    <details class="group py-5"><summary class="flex cursor-pointer list-none items-center justify-between gap-5 text-base font-semibold">Apakah anak harus sudah bisa menggambar?<span class="text-xl font-normal group-open:rotate-45" aria-hidden="true">＋</span></summary><p class="mt-4 text-sm leading-7 text-tinta/65">Setiap anak memiliki titik awal yang berbeda. Saat informasi kelas tersedia, orang tua dapat melihat kelompok usia dan tingkat kemampuan untuk memilih kelas yang sesuai.</p></details>
                    <details class="group py-5"><summary class="flex cursor-pointer list-none items-center justify-between gap-5 text-base font-semibold">Bagaimana pertemuan kelas hybrid?<span class="text-xl font-normal group-open:rotate-45" aria-hidden="true">＋</span></summary><p class="mt-4 text-sm leading-7 text-tinta/65">Pertemuan offline dan online bergantian sesuai jadwal. Peserta mengikuti jenis pertemuan yang ditentukan untuk setiap sesi; seluruh rangkaian termasuk dalam satu kelas.</p></details>
                    <details class="group py-5"><summary class="flex cursor-pointer list-none items-center justify-between gap-5 text-base font-semibold">Kapan bisa melihat jadwal dan mendaftar?<span class="text-xl font-normal group-open:rotate-45" aria-hidden="true">＋</span></summary><p class="mt-4 text-sm leading-7 text-tinta/65">Informasi program, biaya, jadwal, dan pendaftaran akan tersedia setelah kelas dibuka. Halaman ini membantu keluarga mengenal pilihan belajar terlebih dahulu.</p></details>
                </div>
            </div>
        </section>

        <section class="bg-[#edddbd] px-6 py-14 text-center lg:py-18" aria-labelledby="judul-penutup"><p class="label-bagian">SATU CORETAN, BANYAK KEMUNGKINAN</p><h2 id="judul-penutup" class="mx-auto mt-4 max-w-2xl text-4xl leading-tight font-semibold tracking-tight sm:text-5xl">Petualangan kreatif<br>dimulai dari rasa ingin tahu.</h2><a href="#cara-belajar" class="mt-7 inline-flex items-center gap-7 rounded-full bg-hutan px-7 py-4 text-sm font-semibold text-white hover:bg-hutan/90">Temukan cara belajar <span aria-hidden="true">↗</span></a></section>
    </main>
    <footer class="mx-auto flex max-w-7xl flex-wrap items-center justify-between gap-5 px-6 py-8 lg:px-10"><p class="text-sm font-semibold">Kursus Gambar Anak<span class="text-jingga">.</span></p><p class="text-xs text-tinta/60">Jakarta Pusat · Jakarta Selatan · Online</p><a href="#utama" class="text-xs font-medium">Kembali ke atas ↑</a></footer>
</body>
</html>
