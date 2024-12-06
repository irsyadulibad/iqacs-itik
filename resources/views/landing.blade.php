<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')

    <title>Gumukmas Multifarm - Kemitraan Domba dan Pakan Ternak Berkualitas</title>
</head>

<body class="bg-lwhite">
    <!-- Start Hero Section -->
    <section id="hero" class="flex flex-col min-h-screen text-white bg-center bg-cover bg-blend-overlay px-10 md:px-32"
        style="background-image: url('{{ asset('images/landingpage/herobackground.png') }}')">
        <div class="container">
            <header class="mt-7 mb-24">
                <nav class="flex justify-between items-center w-full mx-auto py-3 relative">
                    <div class="flex-1 flex justify-start">
                        <a href="#" class="text-title1 text-dgreen font-bold text-center">Penetasan Itik</a>
                    </div>
                    <input type="checkbox" id="menu-btn" class="hidden">
                    <label for="menu-btn" class="lg:hidden cursor-pointer">
                        <svg class="w-6 h-6 text-dgreen" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </label>
                    <div id="menu"
                        class="hidden lg:flex lg:flex-row lg:items-center lg:gap-[4vw] flex-col items-center absolute lg:static top-16 left-0 w-full bg-lwhite/75 px-4 py-4 rounded-xl lg:bg-transparent z-10 lg:w-auto lg:flex-grow">
                        <ul class="flex lg:flex-row flex-col lg:items-center gap-8 lg:flex-grow lg:justify-center">
                            <li>
                                <a class="text-title2 text-dgreen hover:font-bold" href="#hero">Beranda</a>
                            </li>
                            <li>
                                <a class="text-title2 text-dgreen hover:font-bold" href="#about">Tentang</a>
                            </li>
                            <li class="lg:hidden flex gap-4 items-center">
                                {{-- Instagram --}}
                                <a href="" target="_blank"><svg role="img" height="19"
                                        class="text-dgreen fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <title>Instagram</title>
                                        <path
                                            d="M7.0301.084c-1.2768.0602-2.1487.264-2.911.5634-.7888.3075-1.4575.72-2.1228 1.3877-.6652.6677-1.075 1.3368-1.3802 2.127-.2954.7638-.4956 1.6365-.552 2.914-.0564 1.2775-.0689 1.6882-.0626 4.947.0062 3.2586.0206 3.6671.0825 4.9473.061 1.2765.264 2.1482.5635 2.9107.308.7889.72 1.4573 1.388 2.1228.6679.6655 1.3365 1.0743 2.1285 1.38.7632.295 1.6361.4961 2.9134.552 1.2773.056 1.6884.069 4.9462.0627 3.2578-.0062 3.668-.0207 4.9478-.0814 1.28-.0607 2.147-.2652 2.9098-.5633.7889-.3086 1.4578-.72 2.1228-1.3881.665-.6682 1.0745-1.3378 1.3795-2.1284.2957-.7632.4966-1.636.552-2.9124.056-1.2809.0692-1.6898.063-4.948-.0063-3.2583-.021-3.6668-.0817-4.9465-.0607-1.2797-.264-2.1487-.5633-2.9117-.3084-.7889-.72-1.4568-1.3876-2.1228C21.2982 1.33 20.628.9208 19.8378.6165 19.074.321 18.2017.1197 16.9244.0645 15.6471.0093 15.236-.005 11.977.0014 8.718.0076 8.31.0215 7.0301.0839m.1402 21.6932c-1.17-.0509-1.8053-.2453-2.2287-.408-.5606-.216-.96-.4771-1.3819-.895-.422-.4178-.6811-.8186-.9-1.378-.1644-.4234-.3624-1.058-.4171-2.228-.0595-1.2645-.072-1.6442-.079-4.848-.007-3.2037.0053-3.583.0607-4.848.05-1.169.2456-1.805.408-2.2282.216-.5613.4762-.96.895-1.3816.4188-.4217.8184-.6814 1.3783-.9003.423-.1651 1.0575-.3614 2.227-.4171 1.2655-.06 1.6447-.072 4.848-.079 3.2033-.007 3.5835.005 4.8495.0608 1.169.0508 1.8053.2445 2.228.408.5608.216.96.4754 1.3816.895.4217.4194.6816.8176.9005 1.3787.1653.4217.3617 1.056.4169 2.2263.0602 1.2655.0739 1.645.0796 4.848.0058 3.203-.0055 3.5834-.061 4.848-.051 1.17-.245 1.8055-.408 2.2294-.216.5604-.4763.96-.8954 1.3814-.419.4215-.8181.6811-1.3783.9-.4224.1649-1.0577.3617-2.2262.4174-1.2656.0595-1.6448.072-4.8493.079-3.2045.007-3.5825-.006-4.848-.0608M16.953 5.5864A1.44 1.44 0 1 0 18.39 4.144a1.44 1.44 0 0 0-1.437 1.4424M5.8385 12.012c.0067 3.4032 2.7706 6.1557 6.173 6.1493 3.4026-.0065 6.157-2.7701 6.1506-6.1733-.0065-3.4032-2.771-6.1565-6.174-6.1498-3.403.0067-6.156 2.771-6.1496 6.1738M8 12.0077a4 4 0 1 1 4.008 3.9921A3.9996 3.9996 0 0 1 8 12.0077" />
                                    </svg></a>
                                {{-- Facebook --}}
                                <a href="" target="_blank"><svg role="img" height="19"
                                        class="text-dgreen fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <title>Facebook</title>
                                        <path
                                            d="M9.101 23.691v-7.98H6.627v-3.667h2.474v-1.58c0-4.085 1.848-5.978 5.858-5.978.401 0 .955.042 1.468.103a8.68 8.68 0 0 1 1.141.195v3.325a8.623 8.623 0 0 0-.653-.036 26.805 26.805 0 0 0-.733-.009c-.707 0-1.259.096-1.675.309a1.686 1.686 0 0 0-.679.622c-.258.42-.374.995-.374 1.752v1.297h3.919l-.386 2.103-.287 1.564h-3.246v8.245C19.396 23.238 24 18.179 24 12.044c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.628 3.874 10.35 9.101 11.647Z" />
                                    </svg></a>
                                {{-- Twitter --}}
                                <a href="" target="_blank"><svg role="img" height="19"
                                        class="text-dgreen fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <title>X</title>
                                        <path
                                            d="M18.901 1.153h3.68l-8.04 9.19L24 22.846h-7.406l-5.8-7.584-6.638 7.584H.474l8.6-9.83L0 1.154h7.594l5.243 6.932ZM17.61 20.644h2.039L6.486 3.24H4.298Z" />
                                    </svg></a>
                                {{-- Youtube --}}
                                <a href="" target="_blank"><svg role="img" height="19"
                                        class="text-dgreen fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <title>YouTube</title>
                                        <path
                                            d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                                    </svg></a>
                            </li>
                        </ul>
                    </div>
                    <div class="flex-1 hidden lg:flex justify-end items-center gap-4">
                        {{-- Facebook --}}
                        <a href="" target="_blank"><svg role="img" height="19" class="text-dgreen fill-current px-2"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <title>Instagram</title>
                                <path
                                    d="M7.0301.084c-1.2768.0602-2.1487.264-2.911.5634-.7888.3075-1.4575.72-2.1228 1.3877-.6652.6677-1.075 1.3368-1.3802 2.127-.2954.7638-.4956 1.6365-.552 2.914-.0564 1.2775-.0689 1.6882-.0626 4.947.0062 3.2586.0206 3.6671.0825 4.9473.061 1.2765.264 2.1482.5635 2.9107.308.7889.72 1.4573 1.388 2.1228.6679.6655 1.3365 1.0743 2.1285 1.38.7632.295 1.6361.4961 2.9134.552 1.2773.056 1.6884.069 4.9462.0627 3.2578-.0062 3.668-.0207 4.9478-.0814 1.28-.0607 2.147-.2652 2.9098-.5633.7889-.3086 1.4578-.72 2.1228-1.3881.665-.6682 1.0745-1.3378 1.3795-2.1284.2957-.7632.4966-1.636.552-2.9124.056-1.2809.0692-1.6898.063-4.948-.0063-3.2583-.021-3.6668-.0817-4.9465-.0607-1.2797-.264-2.1487-.5633-2.9117-.3084-.7889-.72-1.4568-1.3876-2.1228C21.2982 1.33 20.628.9208 19.8378.6165 19.074.321 18.2017.1197 16.9244.0645 15.6471.0093 15.236-.005 11.977.0014 8.718.0076 8.31.0215 7.0301.0839m.1402 21.6932c-1.17-.0509-1.8053-.2453-2.2287-.408-.5606-.216-.96-.4771-1.3819-.895-.422-.4178-.6811-.8186-.9-1.378-.1644-.4234-.3624-1.058-.4171-2.228-.0595-1.2645-.072-1.6442-.079-4.848-.007-3.2037.0053-3.583.0607-4.848.05-1.169.2456-1.805.408-2.2282.216-.5613.4762-.96.895-1.3816.4188-.4217.8184-.6814 1.3783-.9003.423-.1651 1.0575-.3614 2.227-.4171 1.2655-.06 1.6447-.072 4.848-.079 3.2033-.007 3.5835.005 4.8495.0608 1.169.0508 1.8053.2445 2.228.408.5608.216.96.4754 1.3816.895.4217.4194.6816.8176.9005 1.3787.1653.4217.3617 1.056.4169 2.2263.0602 1.2655.0739 1.645.0796 4.848.0058 3.203-.0055 3.5834-.061 4.848-.051 1.17-.245 1.8055-.408 2.2294-.216.5604-.4763.96-.8954 1.3814-.419.4215-.8181.6811-1.3783.9-.4224.1649-1.0577.3617-2.2262.4174-1.2656.0595-1.6448.072-4.8493.079-3.2045.007-3.5825-.006-4.848-.0608M16.953 5.5864A1.44 1.44 0 1 0 18.39 4.144a1.44 1.44 0 0 0-1.437 1.4424M5.8385 12.012c.0067 3.4032 2.7706 6.1557 6.173 6.1493 3.4026-.0065 6.157-2.7701 6.1506-6.1733-.0065-3.4032-2.771-6.1565-6.174-6.1498-3.403.0067-6.156 2.771-6.1496 6.1738M8 12.0077a4 4 0 1 1 4.008 3.9921A3.9996 3.9996 0 0 1 8 12.0077" />
                            </svg></a>
                        {{-- Facebook --}}
                        <a href="" target="_blank"><svg role="img" height="19" class="text-dgreen fill-current px-2"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <title>Facebook</title>
                                <path
                                    d="M9.101 23.691v-7.98H6.627v-3.667h2.474v-1.58c0-4.085 1.848-5.978 5.858-5.978.401 0 .955.042 1.468.103a8.68 8.68 0 0 1 1.141.195v3.325a8.623 8.623 0 0 0-.653-.036 26.805 26.805 0 0 0-.733-.009c-.707 0-1.259.096-1.675.309a1.686 1.686 0 0 0-.679.622c-.258.42-.374.995-.374 1.752v1.297h3.919l-.386 2.103-.287 1.564h-3.246v8.245C19.396 23.238 24 18.179 24 12.044c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.628 3.874 10.35 9.101 11.647Z" />
                            </svg></a>
                        {{-- Twitter --}}
                        <a href="" target="_blank"><svg role="img" height="19" class="text-dgreen fill-current px-2"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <title>X</title>
                                <path
                                    d="M18.901 1.153h3.68l-8.04 9.19L24 22.846h-7.406l-5.8-7.584-6.638 7.584H.474l8.6-9.83L0 1.154h7.594l5.243 6.932ZM17.61 20.644h2.039L6.486 3.24H4.298Z" />
                            </svg></a>
                        {{-- Youtube --}}
                        <a href="" target="_blank"><svg role="img" height="19"
                                class="text-dgreen fill-current px-2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <title>YouTube</title>
                                <path
                                    d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                            </svg></a>
                    </div>
            </header>
        </div>
        <div class="container">
            <div class="mx-auto p-4 md:py-8">
                <div class="flex-1 flex items-center">
                    <div class="text-center mx-auto">
                        <h1 class="text-h3 font-bold text-white md:text-h2 lg:text-h1">Selamat Datang</h1>
                        <h1 class="text-h3 font-bold text-white md:text-h2 lg:text-h1">Penetasan Itik - UD Putra Jember</h1>
                        <p class="text-title2 text-text mb-7">Penetasan telur itik yang berlokasi di Kalimalang, Jawa Timur, Indonesia</p>
                        <a href="#"
                            class="py-3 px-9 bg-orange text-title2 text-lwhite rounded-xl hover:bg-orange/80">Hubungi Kami</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Section -->

    <!-- Start About Section -->
    <section id="about" class="pt-24 pb-16">
        <div class="container mx-auto">
            <div class="flex flex-col md:flex-row items-center sm:pt-4 md:px-0">
                <div class="order-2 md:order-1 w-full md:w-2/5 flex justify-center md:justify-start md:mb-0">
                    <img src="{{ asset('images/landingpage/aboutimage.png') }}" alt="About Image"
                        class="max-w-full h-auto object-cover">
                </div>
                <div class="order-1 mb-16 md:order-2 w-full md:w-3/5 md:pl-4">
                    <h2 class="text-h3 text-dgreen font-bold mb-4 xl:text-h2">Tentang Kami</h2>
                    <p class="text-body text-tblack leading-relaxed mb-12 xl:text-title2">
                        UD Putra Jember adalah usaha yang berfokus pada penetasan telur itik berkualitas tinggi. Berlokasi di Kalimalang, Mojomulyo, Kec. Puger, Kabupaten Jember, Jawa Timur, kami berdedikasi untuk menyediakan layanan terbaik dalam mendukung peternakan itik yang lebih produktif dan berkualitas.
                    </p>
                    <a href="#"
                        class="py-3 px-9 mb-8 bg-orange text-title2 text-lwhite rounded-xl hover:bg-orange/80">Hubungi Kami</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Section -->

    {{-- Start Section Mitra --}}
    <section id="blog" class="py-16 relative bg-gray-100 border-t">
        <div class="container mx-auto relative z-10">
            <div class="flex items-center justify-center">
                <div class="text-center">
                    <h1 class="text-h3 font-bold xl:text-h2 text-dgreen">Siap Meningkatkan Produktivitas Penetasan Anda?</h1>
                    <h1 class="text-h3 font-bold xl:text-h2 text-dgreen mb-4">Hubungi Kami Sekarang!</h1>
                    <p class="text-title2 text-black mb-12">Jangan ragu untuk menghubungi UD Putra Jember dan temukan solusi terbaik untuk penetasan telur itik Anda. Kami siap mendukung setiap langkah Anda menuju keberhasilan usaha peternakan itik.</p>
                    <div class="flex items-center justify-center">
                        <div
                            class="flex items-center justify-between rounded-md border border-gray-300 px-4 py-3 md:w-[558px]">
                            <input type="text" placeholder="Masukkan Email"
                                class="text-black font-bold w-full mr-3 bg-transparent border-none placeholder-gray-400 focus:outline-none focus:ring-0">
                            <button
                                class="px-4 py-2 rounded-md bg-dprimary text-white hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300">
                                Kirim
                            </button>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
    {{-- End Section Mitra --}}
    <footer class="bg-dprimary px-10 md:px-32" style="background-image: url('{{ asset('images/footer/footer.png') }}');">
        <div class="container w-full ">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Column 1 -->
                <div class="flex flex-col items-start">
                    <img src="{{ asset('images/footer/logo.png') }}" class="w-24 h-24  mt-14 mb-6" alt="Image 1">
                    <p class="text-white text-title2 mb-6">
                        UD Putra Jember adalah usaha yang bergerak di bidang penetasan telur itik dengan fokus pada teknologi modern dan efisiensi produksi. Berlokasi di Kalimalang, Mojomulyo, Kec. Puger, Kabupaten Jember, Jawa Timur.
                    </p>
                    <div class="flex space-x-4 mb-12">
                        <!-- Instagram Icon -->
                        <a href="https://www.instagram.com/" target="_blank" class="text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M7.0301.084c-1.2768.0602-2.1487.264-2.911.5634-.7888.3075-1.4575.72-2.1228 1.3877-.6652.6677-1.075 1.3368-1.3802 2.127-.2954.7638-.4956 1.6365-.552 2.914-.0564 1.2775-.0689 1.6882-.0626 4.947.0062 3.2586.0206 3.6671.0825 4.9473.061 1.2765.264 2.1482.5635 2.9107.308.7889.72 1.4573 1.388 2.1228.6679.6655 1.3365 1.0743 2.1285 1.38.7632.295 1.6361.4961 2.9134.552 1.2773.056 1.6884.069 4.9462.0627 3.2578-.0062 3.668-.0207 4.9478-.0814 1.28-.0607 2.147-.2652 2.9098-.5633.7889-.3086 1.4578-.72 2.1228-1.3881.665-.6682 1.0745-1.3378 1.3795-2.1284.2957-.7632.4966-1.636.552-2.9124.056-1.2809.0692-1.6898.063-4.948-.0063-3.2583-.021-3.6668-.0817-4.9465-.0607-1.2797-.264-2.1487-.5633-2.9117-.3084-.7889-.72-1.4568-1.3876-2.1228C21.2982 1.33 20.628.9208 19.8378.6165 19.074.321 18.2017.1197 16.9244.0645 15.6471.0093 15.236-.005 11.977.0014 8.718.0076 8.31.0215 7.0301.0839m.1402 21.6932c-1.17-.0509-1.8053-.2453-2.2287-.408-.5606-.216-.96-.4771-1.3819-.895-.422-.4178-.6811-.8186-.9-1.378-.1644-.4234-.3624-1.058-.4171-2.228-.0595-1.2645-.072-1.6442-.079-4.848-.007-3.2037.0053-3.583.0607-4.848.05-1.169.2456-1.805.408-2.2282.216-.5613.4762-.96.895-1.3816.4188-.4217.8184-.6814 1.3783-.9003.423-.1651 1.0575-.3614 2.227-.4171 1.2655-.06 1.6447-.072 4.848-.079 3.2033-.007 3.5835.005 4.8495.0608 1.169.0508 1.8053.2445 2.228.408.5608.216.96.4754 1.3816.895.4217.4194.6816.8176.9005 1.3787.1653.4217.3617 1.056.4169 2.2263.0602 1.2655.0739 1.645.0796 4.848.0058 3.203-.0055 3.5834-.061 4.848-.051 1.17-.245 1.8055-.408 2.2294-.216.5604-.4763.96-.8954 1.3814-.419.4215-.8181.6811-1.3783.9-.4224.1649-1.0577.3617-2.2262.4174-1.2656.0595-1.6448.072-4.8493.079-3.2045.007-3.5825-.006-4.848-.0608M16.953 5.5864A1.44 1.44 0 1 0 18.39 4.144a1.44 1.44 0 0 0-1.437 1.4424M5.8385 12.012c.0067 3.4032 2.7706 6.1557 6.173 6.1493 3.4026-.0065 6.157-2.7701 6.1506-6.1733-.0065-3.4032-2.771-6.1565-6.174-6.1498-3.403.0067-6.156 2.771-6.1496 6.1738M8 12.0077a4 4 0 1 1 4.008 3.9921A3.9996 3.9996 0 0 1 8 12.0077" />
                            </svg>
                        </a>
                        <a href="https://www.facebook.com/" target="_blank" class="text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M9.101 23.691v-7.98H6.627v-3.667h2.474v-1.58c0-4.085 1.848-5.978 5.858-5.978.401 0 .955.042 1.468.103a8.68 8.68 0 0 1 1.141.195v3.325a8.623 8.623 0 0 0-.653-.036 26.805 26.805 0 0 0-.733-.009c-.707 0-1.259.096-1.675.309a1.686 1.686 0 0 0-.679.622c-.258.42-.374.995-.374 1.752v1.297h3.919l-.386 2.103-.287 1.564h-3.246v8.245C19.396 23.238 24 18.179 24 12.044c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.628 3.874 10.35 9.101 11.647Z" />
                            </svg>
                        </a>
                        <!-- X Icon -->
                        <a href="https://www.twitter.com/" target="_blank" class="text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M18.901 1.153h3.68l-8.04 9.19L24 22.846h-7.406l-5.8-7.584-6.638 7.584H.474l8.6-9.83L0 1.154h7.594l5.243 6.932ZM17.61 20.644h2.039L6.486 3.24H4.298Z" />
                            </svg>
                        </a>
                        <!-- YouTube Icon -->
                        <a href="https://www.youtube.com/" target="_blank" class="text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                            </svg>
                        </a>
                    </div>
                    <p class="text-white text-title2 mb-8">© {{ date('Y') }} UD Putra Jember</p>
                </div>
                <!-- Column 2 -->
                <div class="flex w-full flex-col items-center md:items-center mx-auto">
                    <p class="text-white text-title2 font-bold md:mt-14 md:mb-8 mb-6">Tautan Langsung</p>
                    <div class="w-full items-center">
                        <ul class="flex flex-col md:items-center">
                            <li class="text-white text-title2 mb-6 mr-6 hover:font-bold"><a href="http://">Beranda</a></li>
                            <li class="text-white text-title2 mb-6 mr-6 hover:font-bold"><a href="http://">Tentang</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Column 3 -->
                <div class="flex flex-col items-center md:items-start">
                    <p class="text-white text-title2 font-bold md:mt-14 md:mb-8 mb-6">Informasi Kontak</p>
                    <ul>
                        <!-- Alamat dengan Ikon Maps -->
                        <li class="text-white text-title2 mb-6 flex items-start">
                            <!-- Image Maps -->
                            <img src="{{ asset('images/footer/maps.png') }}" class="h-4 w-4 mr-2 mt-1 align-self-center"
                                alt="Maps Icon">
                            <a class="hover:font-bold" href="https://www.google.com/maps/place/Ud+Putra+Jember+group/@-8.3705605,113.4153621,19z">Kalimalang, Mojomulyo, Kec. Puger, Kabupaten Jember, Jawa Timur</a>
                        </li>

                        <!-- Nomor Telepon 1 dengan Ikon Telepon -->
                        <li class="text-white text-title2 mb-6 flex items-center hover:font-bold">
                            <!-- Image Telepon -->
                            <img src="{{ asset('images/footer/phone.png') }}" class="h-4 w-4 mr-2" alt="Phone Icon">
                            <a href="tel:-">-</a>
                        </li>

                        <!-- Nomor Telepon 2 dengan Ikon Telepon -->
                        <li class="text-white text-title2 mb-12 flex items-center hover:font-bold">
                            <!-- Image Telepon -->
                            <img src="{{ asset('images/footer/phone.png') }}" class="h-4 w-4 mr-2" alt="Phone Icon">
                            <a href="tel:-">-</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    @vite('resources/js/app.js')
</body>

</html>
