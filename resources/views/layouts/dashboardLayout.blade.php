<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
            rel="stylesheet"
        />
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Open Library | @yield('title')</title>

        <style>
            body {
                font-family: "Poppins", sans-serif;
            }

            aside {
                /* animation-duration: 0.4s;
                animation-name: slidein;
                animation-timing-function: ease-out; */
                /* transform: translateX(-5%); */
                /* animation-iteration-count: infinite;
                animation-direction: alternate; */
            }

            @keyframes slidein {
                0% {
                    transform: translateX(-100%);
                }

                70% {
                    transform: translateX(0%);
                }

                100% {
                    transform: translateX(-5%);
                }
            }

            select {
              appearance: none;
            }

            /* input[type=file]::file-selector-button {
                margin-right: 20px;
                border: none;
                background: #084cdf;
                padding: 10px 20px;
                border-radius: 10px;
                color: #fff;
                cursor: pointer;
                transition: background .2s ease-in-out;
            } */
        </style>
    </head>
    <body
        class="overflow-x-hidden bg-blend-darken bg-fixed relative w-screen h-screen  overflow-y-scroll  bg-[#FAFBFD]"
    >
        @include('partials.sidebarDashboard')



        <div class="w-screen h-full pl-80 pr-4  pt-2">
                <div class="flex flex-col w-full h-full">
                    <div class="flex text-black backdrop-blur-xl  items-center justify-between  py-4 pl-6 pr-10">
                        <h1 class="text-2xl font-semibold ">@yield('page-title')</h1>
                        <div class="flex items-center space-x-6 text-[#151C48] font-medium">
                            <div class="flex space-x-2 items-center ">
                                <img class="w-6" src="/img/icon-english.svg" alt="english">
                                <p class="text-xs">Eng (US)</p>
                                <svg width="18" height="18" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.35006 6.84996C4.40803 6.79191 4.47688 6.74585 4.55267 6.71443C4.62845 6.68301 4.70969 6.66683 4.79173 6.66683C4.87377 6.66683 4.95501 6.68301 5.03079 6.71443C5.10658 6.74585 5.17543 6.79191 5.2334 6.84996L10.0001 11.6158L14.7667 6.84996C14.8247 6.79196 14.8936 6.74595 14.9694 6.71456C15.0452 6.68317 15.1264 6.66702 15.2084 6.66702C15.2904 6.66702 15.3716 6.68317 15.4474 6.71456C15.5232 6.74595 15.5921 6.79196 15.6501 6.84996C15.7081 6.90796 15.7541 6.97682 15.7855 7.0526C15.8169 7.12838 15.833 7.2096 15.833 7.29163C15.833 7.37365 15.8169 7.45487 15.7855 7.53066C15.7541 7.60644 15.7081 7.67529 15.6501 7.73329L10.4417 12.9416C10.3838 12.9997 10.3149 13.0457 10.2391 13.0772C10.1633 13.1086 10.0821 13.1248 10.0001 13.1248C9.91802 13.1248 9.83679 13.1086 9.761 13.0772C9.68521 13.0457 9.61637 12.9997 9.5584 12.9416L4.35006 7.73329C4.29201 7.67532 4.24596 7.60648 4.21453 7.53069C4.18311 7.45491 4.16694 7.37367 4.16694 7.29163C4.16694 7.20959 4.18311 7.12835 4.21453 7.05256C4.24596 6.97678 4.29201 6.90793 4.35006 6.84996Z" fill="black"/>
                                    </svg>
                                    
                            </div>
                            <div class="flex  items-center space-x-4 bg-white py-2 px-4 rounded-xl shadow-[0px_7px_50px_0px_rgba(198,203,232,0.2)] ">
                                <div class="text-end">
                                    <p class="text-xs">{{ Auth::user()->name ?? Auth::guard('admin')->user()->username  }}</p>
                                    <p class="text-xs text-[#777A8F]">{{ Auth::guard('web')->check() ? 'Student' : 'Admin' }}</p>
                                </div>
                                @if (Auth::guard('web')->check())
                                    <img class="w-9 rounded-lg" src="{{ Auth::user()->google_avatar}}" alt="profile-pict">
                                @else
                                <div class="w-8 flex items-center rounded-lg justify-center aspect-square bg-[#777A8F]/20">
                                    <p class="inline-block">{{ Auth::guard('admin')->user()->username[0] }}</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="flex-1 py-4 pl-6 pr-10">
                        @yield('content')
                    </div>
                </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    </body>
</html>
