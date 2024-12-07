<x-page-layout>
    <section
        id="hero"
        class="flex flex-col justify-center items-center h-[80vh] text-white bg-center bg-cover bg-no-repeat bg-blend-multiply px-10 md:px-32"
        style="
            background-image: linear-gradient(
                    rgba(0, 0, 0, 0.5),
                    rgba(0, 0, 0, 0.5)
                ),
                url('{{ asset("images/landingpage/herobackground.jpg") }}');
        "
    >
        <div class="container mx-auto">
            <div class="mx-auto p-4 md:py-8">
                <div class="flex-1 flex items-center">
                    <div class="text-center mx-auto">
                        <h1
                            class="text-h3 font-extrabold tracking-tighter text-white md:text-h2 lg:text-h1"
                        >
                            Selamat Datang
                        </h1>
                        <h1
                            class="text-h3 font-extrabold tracking-tighter text-white md:text-h2 lg:text-h1"
                        >
                            Penetasan Itik - UD Putra Jember
                        </h1>
                        <p class="text-title2 text-text mb-7">
                            Penetasan telur itik yang berlokasi di Kalimalang,
                            Jawa Timur, Indonesia
                        </p>
                        <a
                            href="{{ route("dashboard") }}"
                            class="py-3 px-9 bg-orange text-title2 text-lwhite rounded-xl hover:bg-orange/80"
                        >
                            Dashboard Monitoring
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Section -->

    <!-- Start About Section -->
    <section id="about" class="pt-24 pb-16 p-5">
        <div class="container mx-auto">
            <div class="flex flex-col md:flex-row items-center sm:pt-4 md:px-0">
                <div
                    class="order-2 md:order-1 w-full md:w-2/5 flex justify-center md:justify-start md:mb-0"
                >
                    <img
                        src="{{ asset("images/landingpage/aboutimage.png") }}"
                        alt="About Image"
                        class="max-w-full h-auto object-cover"
                    />
                </div>
                <div class="order-1 mb-16 md:order-2 w-full md:w-3/5 md:pl-4">
                    <h2 class="text-h3 text-dgreen font-bold mb-4 xl:text-h2">
                        Tentang Kami
                    </h2>
                    <p
                        class="text-body text-tblack leading-relaxed mb-12 xl:text-title2"
                    >
                        UD Putra Jember adalah usaha yang berfokus pada
                        penetasan telur itik berkualitas tinggi. Berlokasi di
                        Kalimalang, Mojomulyo, Kec. Puger, Kabupaten Jember,
                        Jawa Timur, kami berdedikasi untuk menyediakan layanan
                        terbaik dalam mendukung peternakan itik yang lebih
                        produktif dan berkualitas.
                    </p>
                    <a
                        href="#"
                        class="py-3 px-9 mb-8 bg-orange text-title2 text-lwhite rounded-xl hover:bg-orange/80"
                    >
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Section -->

    {{-- Start Section Mitra --}}
    <section id="blog" class="py-16 relative bg-gray-100 border-t p-5">
        <div class="container mx-auto relative z-10">
            <div class="flex items-center justify-center">
                <div class="text-center">
                    <h1 class="text-h3 font-bold xl:text-h2 text-dgreen">
                        Siap Meningkatkan Produktivitas Penetasan Anda?
                    </h1>
                    <h1 class="text-h3 font-bold xl:text-h2 text-dgreen mb-4">
                        Hubungi Kami Sekarang!
                    </h1>
                    <p class="text-title2 text-black mb-12">
                        Jangan ragu untuk menghubungi UD Putra Jember dan
                        temukan solusi terbaik untuk penetasan telur itik Anda.
                        Kami siap mendukung setiap langkah Anda menuju
                        keberhasilan usaha peternakan itik.
                    </p>
                    <div class="flex items-center justify-center">
                        <div
                            class="flex items-center justify-between rounded-md border border-gray-300 px-4 py-3 md:w-[558px]"
                        >
                            <input
                                type="text"
                                placeholder="Masukkan Email"
                                class="text-black font-bold w-full mr-3 bg-transparent border-none placeholder-gray-400 focus:outline-none focus:ring-0"
                            />
                            <button
                                class="px-4 py-2 rounded-md bg-dprimary text-white hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300"
                            >
                                Kirim
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @vite("resources/js/app.js")
</x-page-layout>
