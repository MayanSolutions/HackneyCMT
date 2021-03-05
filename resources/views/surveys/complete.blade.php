<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">


        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    </head>

<body>
<div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
    <div class="max-w-xl sm:mx-auto lg:max-w-2xl">
      <div class="max-w-xl mb-10 md:mx-auto sm:text-center lg:max-w-2xl md:mb-12">
        <div>
          <p class="inline-block px-3 py-px mb-4 text-xs font-semibold tracking-wider text-teal-900 uppercase rounded-full bg-teal-accent-400">
            Thank You
          </p>
        </div>
        <h2 class="max-w-lg mb-6 font-sans text-3xl font-bold leading-none tracking-tight text-gray-900 sm:text-4xl md:mx-auto">
          <span class="relative inline-block">
            <svg viewBox="0 0 52 24" fill="currentColor" class="absolute top-0 left-0 z-0 hidden w-32 -mt-8 -ml-20 text-blue-gray-100 lg:w-32 lg:-ml-28 lg:-mt-10 sm:block">
              <defs>
                <pattern id="70326c9b-4a0f-429b-9c76-792941e326d5" x="0" y="0" width=".135" height=".30">
                  <circle cx="1" cy="1" r=".7"></circle>
                </pattern>
              </defs>
              <rect fill="url(#70326c9b-4a0f-429b-9c76-792941e326d5)" width="52" height="24"></rect>
            </svg>
            <span class="relative">Your</span>
          </span>
          Digital assessment has now been submitted
      </div>
    </div>
    <br>
    <div class="max-w-screen-xl sm:mx-auto">
      <div class="grid grid-cols-1 gap-16 row-gap-8 lg:grid-cols-2">
        <div class="space-y-8">
          <div>
            <p class="mb-4 text-xl font-medium">
              What happens now ?
            </p>
            <p class="text-gray-700 text-l">
              Your liaison officer will contact you shortly to conduct a completion and correction excerise.
              This will consist of document verification, and address any shortfalls highlighted in the review
            </p>
          </div>
        </div>

        <div class="space-y-8">
          <div>
            <p class="mb-4 text-xl font-medium">What should i do ?</p>
            <p class="text-gray-700 text-l">
              If you are aware of any shortfall or corrections that need to be addressed, we advise that these are actioned at the earlist possible convinience.
              This is because any failures within the review, after the completion and correction excersise will be logged against the organisation until the following review is conducted.
            </p>
          </div>
        </div>

        <div class="space-y-8">
            <div>
              <p class="mb-4 text-xl font-medium">Can i get a copy of the assessment ?</p>
              <p class="text-gray-700 text-l">
                Yes<br>
              </br>
                A copy of your completed assessment will be sent to the officer who completed the review. If you would like an additional copy, please contact your liaison officer who will be able to send this to you.
              </p>
            </div>
          </div>

        <div class="space-y-8">
            <div>
              <p class="mb-4 text-xl font-medium">Should i be worried about the shortfalls ?</p>
              <p class="text-gray-700 text-l">
                It depends.<br>
              </br>
                If its a minor governance issues, then your liaison officer will work with you to correct these issues to ensure that the organisation is operating accordingly.
                If the issues relates to a crutial legal or governance requirement, we advise that this is seen to as soon as possible.
              </p>
            </div>
          </div>
      </div>
  </div>
    </div>
  </div>
  <footer>
    <div class="relative mt-16 bg-purple-accent-400">
        <div class="px-4 pt-12 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8">
          <div class="grid gap-16 row-gap-10 mb-8 lg:grid-cols-6">
          </div>
          <div class="flex flex-col justify-between pt-5 pb-10 border-t border-purple-200 sm:flex-row">
            <p class="text-sm text-gray-600">
              © Copyright 2021 Mayan Software Solutions. All rights reserved.
            </p>
          </div>
        </div>
      </div>

  </footer>
</body>
</html>
