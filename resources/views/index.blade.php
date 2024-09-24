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
        @include('header')

        <div class="flex mt-16 w-full">
            <div class="container mx-auto flex flex-col md:flex-row items-start justify-between z-10 px-6 gap-16">

                <!-- Left Column -->
                <div class="md:w-2/5 w-full">
                    <h1 class="font-bold leading-none">
                        <span class="block text-[70px] sm:text-[90px] md:text-[110px] text-blue text-left mb-[-1rem] sm:mb-[-2.5rem]">Review</span>
                        <span class="block text-[70px] sm:text-[90px] md:text-[110px] text-green text-center mb-[-1rem] sm:mb-[-2.5rem]">Review</span>
                        <span class="block text-[70px] sm:text-[90px] md:text-[110px] text-black text-right">Review</span>
                        <span class="block text-[70px] sm:text-[90px] md:text-[110px] text-green text-center leading-[3rem] sm:leading-[5rem]">ktoré ťa posunie</span>
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
                        <img src="{{ asset('images/cart.png') }}" alt="Cart Icon" class="absolute top-0 left-0 w-28 h-auto animate-driveDiagonal">
                        <!-- Rails Image -->
                        <img src="{{ asset('images/rails.png') }}" alt="Rails Icon" class="absolute bottom-0 right-0 w-56 h-auto">
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
    <section id="section2" class="py-8 bg-gray-100">
        <div class="container mx-auto flex flex-col md:flex-row items-center">
            <!-- Text Column -->
            <div class="md:w-1/2">
                <h2 class="text-3xl font-bold">Section 2 Title</h2>
                <p class="mt-4">Section 2 content goes here.</p>
            </div>
            <!-- Image Column -->
            <div class="md:w-1/2">

            </div>
        </div>
    </section>

    <!-- Section 3 (Form) -->
    <section id="section3" class="py-8">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center">Fill the Form</h2>
            <!-- Display Validation Errors -->
            @if ($errors->any())
                <div class="mt-4">
                    <ul class="list-disc list-inside text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- Form -->
            <form id="submission-form" action="{{ route('form.submit') }}" method="POST" enctype="multipart/form-data"
                  class="mt-8 max-w-lg mx-auto">
                @csrf
                <!-- Text Input 1 -->
                <div class="mb-4">
                    <label for="text_input1" class="block text-gray-700">Text Input 1</label>
                    <input type="text" name="text_input1" id="text_input1"
                           class="w-full p-2 border border-gray-300 rounded" required>
                </div>
                <!-- Text Input 2 -->
                <div class="mb-4">
                    <label for="text_input2" class="block text-gray-700">Text Input 2</label>
                    <input type="text" name="text_input2" id="text_input2"
                           class="w-full p-2 border border-gray-300 rounded" required>
                </div>
                <!-- Large Text Input -->
                <div class="mb-4">
                    <label for="large_text_input" class="block text-gray-700">Large Text Input</label>
                    <textarea name="large_text_input" id="large_text_input" rows="5"
                              class="w-full p-2 border border-gray-300 rounded" required></textarea>
                </div>
                <!-- File Input -->
                <div class="mb-4">
                    <label for="file_input" class="block text-gray-700">File Input</label>
                    <input type="file" name="file_input" id="file_input" class="w-full" required>
                </div>
                <!-- GDPR Checkbox -->
                <div class="mb-4">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="gdpr" class="form-checkbox" required>
                        <span class="ml-2">I agree to the GDPR terms</span>
                    </label>
                </div>
                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded">Submit</button>
                </div>
            </form>
        </div>
    </section>

    <!-- Section 4 -->
    <section id="section4" class="py-8 bg-gray-100">
        <div class="container mx-auto flex flex-col md:flex-row items-center">
            <!-- Text Column -->
            <div class="md:w-1/2">
                <h2 class="text-3xl font-bold">Section 4 Title</h2>
                <p class="mt-4">Section 4 content goes here.</p>
            </div>
            <!-- Image Column -->
            <div class="md:w-1/2">

            </div>
        </div>
    </section>

    <!-- Waiting Screen -->
    <div id="waiting-screen" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="text-white text-center">


        </div>
    </div>

</main>


@vite('resources/js/app.js')
<!-- Form Submission Handling -->
<script>
    document.getElementById('submission-form').addEventListener('submit', function () {
        // Show the waiting screen
        document.getElementById('waiting-screen').classList.remove('hidden');
    });
</script>
</body>
</html>
