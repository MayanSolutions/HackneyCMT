<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/submit.css') }}">


        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="{{ asset('js/submit.js')}}" defer></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    </head>
    <body class="font-sans antialiased bg-gray-100">
        @include('sweetalert::alert')

        <section id="loading">
            <div id="loading-content"></div>
        </section>
        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-dropdown')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        @include('sweetalert::alert')
        @stack('modals')
        @livewireScripts
    </body>
    <footer class="px-4 py-12 mx-auto max-w-8xl">
        <div class="grid grid-cols-2 gap-10 mb-3 md:grid-cols-3 lg:grid-cols-11 lg:gap-20">
          <div class="col-span-3">
            <a href="#" title="" class="flex items-center">
                <img src="{{url('/images/MayanSoftwareSolutionsLogo.png')}}" alt="Logo" style="height: 65px; width: 65px;">
            </a>
          </div>
        </div>
        <div class="flex flex-col items-start justify-between pt-2 mt-2 border-t border-gray-100 md:flex-row md:items-center">
          <p class="mb-2 text-xs text-left text-gray-600 md:mb-0">Built by Mayan Software Solutions</p>
          <p class="mb-0 text-xs text-left text-gray-600 md:mb-0">Copyright &copy; 2021 MayanSolutions</p>
        </div>
      </footer>
</html>

<script>
    $('.delete-confirm').click(function(event) {
        event.preventDefault();
        var form =  $(this).closest("form");
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
    if (result.value) {
    form.submit();
    }
    })
    })
    </script>

<script>
    $('.expire-member').change(function(event) {
        event.preventDefault();
        var form =  $(this).closest("form");
    Swal.fire({
        title: 'Are you sure?',
        text: "Amending the position expiry date could remove the member from the position",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, I understand'
            }).then((result) => {
    if (result.value) {
    form.submit();
    }
    })
    })
    </script>


