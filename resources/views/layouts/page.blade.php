<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap"
            rel="stylesheet"
        />

        @vite("resources/css/app.css")

        <title>Penetasan Itik - UD Putra Jember</title>
    </head>

    <body class="bg-lwhite font-nunito">
        <x-header />
        {{ $slot }}
        <x-footer />
    </body>
    <script>
        window.onscroll = function () {
            scrollFunction()
        }

        function scrollFunction() {
            if (
                document.body.scrollTop > 20 ||
                document.documentElement.scrollTop > 20
            ) {
                document.querySelector('.header').classList.add('bg-white')
                document.querySelector('.header').classList.add('text-black')
                document.querySelector('.header').classList.remove('text-white')
                document
                    .querySelector('.header')
                    .classList.remove('bg-transparent')
            } else {
                document.querySelector('.header').classList.add('text-white')
                document
                    .querySelector('.header')
                    .classList.add('bg-transparent')
                document.querySelector('.header').classList.remove('bg-white')
                document.querySelector('.header').classList.remove('text-black')
            }
        }
    </script>
</html>
