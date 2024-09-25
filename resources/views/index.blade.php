<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    <!-- Styles -->
    @vite('resources/css/app.css')
</head>
<body class="font-sans antialiased">
<main class="">
    <section class="bg-light min-h-screen items-center justify-center relative border-8 border-green">
        @include('partials.header')

        <div class="flex mt-16 w-full">
            <div class="container mx-auto flex flex-col md:flex-row items-start justify-between z-10 px-6 gap-16">

                <!-- Left Column -->
                <div class="md:w-2/5 w-full">
                    <h1 class="font-bold leading-none">
                        <span
                            class="block text-[70px] sm:text-[90px] md:text-[110px] text-blue text-left mb-[-1rem] sm:mb-[-2.5rem]">Review</span>
                        <span
                            class="block text-[70px] sm:text-[90px] md:text-[110px] text-green text-center mb-[-1rem] sm:mb-[-2.5rem]">Review</span>
                        <span
                            class="block text-[70px] sm:text-[90px] md:text-[110px] text-black text-right">Review</span>
                        <span
                            class="block text-[70px] sm:text-[90px] md:text-[110px] text-green text-center leading-[3rem] sm:leading-[5rem]">ktoré ťa posunie</span>
                    </h1>
                </div>

                <!-- Right Column -->
                <div class="md:w-2/5 mt-10 md:mt-0 flex flex-col items-center md:items-start">
                    <p class="text-[30px] md:text-[38px] leading-snug font-bold text-black text-center md:text-left">
                        Vždy si túžil po feedbacku, ktorý ťa posunie? Tento ťa môže poslať na kávu s Wosom
                        <span class="text-green font-bold">alebo až do Devína.</span>
                    </p>
                    <div class="relative mt-16 flex justify-center mb-64 lg:mb-0" style="width: 285px; height: 141px;">
                        <!-- Cart Image -->
                        <img src="{{ asset('images/cart.png') }}" alt="Cart Icon"
                             class="absolute top-0 left-0 w-28 h-auto animate-driveDiagonal">
                        <!-- Rails Image -->
                        <img src="{{ asset('images/rails.png') }}" alt="Rails Icon"
                             class="absolute bottom-0 right-0 w-56 h-auto">
                    </div>
                </div>
                <!-- Scroll Icon at the Bottom Center -->
                <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 text-center">
                    <div class="animate-bounce">
                        <img src="{{ asset('images/scroll.png') }}" alt="scroll icon" class="w-16 md:w-20 h-auto">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 2 -->
    <section id="section2" class="flex flex-col md:flex-row h-screen">
        <div class="mx-auto flex flex-col items-start justify-center bg-light md:w-1/2 px-16 py-60 md:py-32">
            <div class="mt-8 md:mt-0">
                <h2 class="text-2xl md:text-3xl font-bold">Opíš nám svoju prácu, s ktorou si fakt spokojný 🙌</h2>
                <p class="mt-4 text-base md:text-lg"><span class="font-bold">Najskôr ti ju okomentuje naše AI vytrénované na svetových prácach.</span>
                    A kým si urobíš čaj, môže prísť pozvanie na kávu od nás.</p>
            </div>
        </div>

        <div class="mx-auto flex flex-col items-center justify-center bg-green md:w-1/2 px-16 py-24 md:py-32">
            <div class="flex flex-col lg:flex-row items-center">
                <img src="{{ asset('images/wosa.png') }}" alt="wosa" class="w-40 md:w-48 h-auto mb-4 md:mb-0">

                <div class="text-center md:text-left md:ml-4">
                    <h2 class="text-2xl md:text-3xl font-bold"><span class="text-light">Wosa</span> ti dá feedback</h2>
                    <p class="text-base md:text-lg"><span class="font-bold">Chief Creative and Strategy Officer</span> pre slovenský a <br>český TRIAD.</p>
                </div>
            </div>

            <div class="mt-6 md:mt-4 text-center md:text-left">
                <p class="text-base md:text-lg">Držtieľ ocenenia Filip, <span class="font-bold">majiteľ stoviek ocenení</span> od
                    slovenských grand prix, cez New York až po globálne ocenenia na Warc, Effie Saber</p>
            </div>
        </div>
    </section>

    <section id="section3" class=" relative flex flex-col md:flex-row h-screen w-screen">

        <!-- Form Screen (Screen 1) -->
        <form class=" w-full flex flex-col md:flex-row" id="upload-form" enctype="multipart/form-data">
            @csrf

            <div class="flex flex-col justify-center items-center bg-blue md:w-1/2 py-8 px-24">
                <div class="flex items-center mb-8">
                    <img src="{{ asset('images/number-one.png') }}" alt="number one" class="w-16 md:w-20 h-auto">
                    <h2 class="text-[60px] font-bold ml-4">Nahraj CV</h2>
                </div>

                <div class="mb-6 w-full">
                    <label for="name" class="block text-sm font-medium text-black uppercase">Napíš nám ako sa
                        voláš</label>
                    <input type="text" id="name" name="name" placeholder="Meno a priezvisko"
                           class="w-full p-4 mt-2 bg-light rounded-md" required>
                </div>

                <div class="mb-6 w-full">
                    <label for="email" class="block text-sm font-medium text-black uppercase">Kontakt na teba</label>
                    <input type="email" id="email" name="email" placeholder="E-mail"
                           class="w-full p-4 mt-2 bg-light rounded-md" required>
                </div>

                <div class="relative flex items-center mb-6 w-full">
                    <label for="cv-upload" class="font-bold text-lg text-black mr-2 cursor-pointer mb-2">
                        Nahraj svoje CV
                    </label>
                    <span class="text-gray-500 italic text-sm">PDF, JPG, PNG, DOC</span>

                    <input type="file" id="cv-upload" name="cv" class="hidden" required>

                    <div class="absolute bottom-0 left-0 w-32 h-[1px] bg-black"></div>
                </div>
            </div>

            @include('partials.chevron')

            <div class="flex flex-col justify-center items-center bg-light md:w-1/2 py-8 px-24">
                <div class="flex items-center mb-8">
                    <img src="{{ asset('images/number-two.png') }}" alt="number two" class="w-16 md:w-20 h-auto">
                    <h2 class="text-[60px] font-bold ml-4">Opíš prácu</h2>
                </div>

                <div class="mb-6 w-full">
                    <label for="work-description" class="block text-sm font-medium text-black mb-4 uppercase">Opis
                        práce</label>
                    <div class="border-black border-2 rounded-md">
                    <textarea id="work-description" name="work_description" rows="6"
                              placeholder="Sem opíš svoju prácu, ktorú máš rád, alebo chceš vylepšiť"
                              class="w-full p-4 bg-light shadow-none focus:outline-none focus:ring-none" required
                              maxlength="1000"></textarea>
                    </div>
                </div>

                <div class="flex flex-row justify-between w-full">
                    <div class="flex items-center mb-6">
                        <input type="checkbox" id="gdpr" name="gdpr"
                               class="h-5 w-5 rounded text-green-600 focus:ring-green-400" required>
                        <label for="gdpr" class="ml-3 text-sm font-medium text-black">Súhlasím so spracovaním <a
                                href="#" class="text-green underline underline-offset-2">osobných údajov</a></label>
                    </div>

                    <div>
                        <button type="submit" class="bg-green text-black font-bold p-4 rounded-md hover:bg-blue">
                            Odošli a vyhodnoť
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </section>

    <section id="loading-screen" class="hidden relative flex flex-col md:flex-row h-screen">
        <div class="container mx-auto flex flex-col md:flex-row items-center bg-light md:w-1/2 px-8">
            @include('partials.thank-you-text-section')
        </div>
        <div class="container mx-auto flex flex-col items-center bg-green md:w-1/2 px-8 justify-center">
            <div class="flex flex-row items-center">
                <img src="{{ asset('images/wosa-upload.png') }}" alt="wosa" class="w-80 h-auto">
            </div>
            @include('partials.chevron')
            <div class="flex flex-col items-center text-center">
                <img src="{{ asset('images/soundbar.png') }}" alt="soundbar" class="w-[26rem] h-auto">
                <p class="mt-4 font-bold">Chceš si feedback vypočuť neskôr? <a
                        class="ml-4 underline underline-offset-8">Stiahni si ho</a></p>
            </div>
        </div>
    </section>

    <section id="success-screen" class="hidden relative flex flex-col md:flex-row h-screen">
        <div class="container mx-auto flex flex-col md:flex-row items-center bg-light md:w-1/2 px-8">
            @include('partials.thank-you-text-section')
        </div>
        @include('partials.chevron')
        <div class="container mx-auto flex flex-col items-center bg-green md:w-1/2 px-16 justify-center">
            <div class="flex flex-col items-center text-center my-64 mx-8 md:mx-16 lg:mx-24">
                <div class="mx-16">
                    <h2 class="font-bold text-black text-4xl"><span class="text-light">Tvoje slová už letia</span> rýchlosťou internetu do Devína.</h2>
                </div>

                <div class="relative w-full h-32">
                    <img id="person" src="{{ asset('images/person.png') }}" alt="Person" class="absolute left-0 w-16 top-1/4">

                    <img id="person" src="{{ asset('images/path.png') }}" alt="Path" class="border-dashed absolute left-16 w-80 bottom-0">

                    <span id="percentage" class="absolute bottom-0 text-darkBlue font-bold text-2xl right-20">0%</span>

                    <img id="house" src="{{ asset('images/house.png') }}" alt="House" class="absolute right-0 w-16 top-1/4">
                </div>
            </div>
        </div>
    </section>

    <section id="section4" class="flex flex-row h-screen">
    </section>

</main>


@vite('resources/js/app.js')
<script>
    document.getElementById('cv-upload').addEventListener('change', function () {
        var fileName = this.files[0].name;
        var label = document.querySelector('label[for="cv-upload"]');
        label.textContent = "Nahraj svoje CV: " + fileName;
    });
</script>
<script>

</script>
</body>
</html>
