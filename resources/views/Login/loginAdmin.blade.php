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
        <title>Open Library | Login</title>

        <style>
            body {
                font-family: "Poppins", sans-serif;
            }

            aside {
                animation-duration: 0.4s;
                animation-name: slidein;
                animation-timing-function: ease-out;
                /* transform: translateX(-5%); */
            }

            @keyframes slidein {
                0% {
                    transform: translateX(-100%);
                }

                70% {
                    transform: translateX(2%);
                }

                100% {
                    transform: translateX(0%);
                }
            }
        </style>
    </head>
    <body
        class="bg-[url('/img/landingpage-bg.webp')] bg-cover bg-center bg-no-repeat"
    >
        <div class="w-screen h-[100svh] bg-[#646464]/50">
            <div class="wrapper w-full h-full flex">
                <aside
                    class="flex backdrop-blur-md text-white flex-col items-center  bg-[#8599AC]/30 shadow-[2px_0px_0px_2px_rgba(225,225,225,0.6)]  py-9 pr-10 pl-10 rounded-none w-full sm:w-[24rem] sm:rounded-tr-[3rem] sm:rounded-br-[3rem]"
                >
                    <div class="pb-4 px-2 w-full">
                        <div
                            class="flex items-start justify-center space-x-4 w-full mb-4"
                        >
                            <div
                                class="bg-[#D9D9D9]/40 border-2 border-[#CCD1D6] p-2 rounded-lg"
                            >
                                <img
                                    class="w-10"
                                    src="/img/logo.png"
                                    alt="logo"
                                />
                            </div>
                            <div class="text-xl font-bold">
                                <h1>Telkom University</h1>
                                <h1>Open Library</h1>
                            </div>
                        </div>
                        <span class="block h-1 bg-white mx-auto w-full  "></span>
                    </div>
                    <div
                        class="flex w-full text-center flex-1 flex-col items-center justify-center pb-20"
                    >
                        <h1 class="text-3xl font-semibold mb-2">Login</h1>
                        <p class="text-xs mb-12 py-1 px-2.5 bg-[#D9D9D9] text-[#5F5F5F] font-semibold rounded-full">
                            Admin
                        </p>

                        <form class="w-full px-5 " action="/admin/login" method="post">
                          @csrf
                          <div class="flex flex-col space-y-1 items-start w-full mb-5">
                            <label class="pl-1" for="username">Username</label>
                            <input type="text" id="username" name="username" class="w-full bg-white/10 focus:outline-none border-2 border-white/30 rounded-lg px-2 py-1">
                          </div>
                          <div class="flex flex-col space-y-1 items-start w-full mb-8">
                            <label class="pl-1" for="password">Password</label>
                            <input type="password" id="password" name="password" class="w-full bg-white/10 focus:outline-none border-2 border-white/30 rounded-lg px-2 py-1">
                          </div>
                          <button class="hover:opacity-80 transition-all duration-300 bg-white/80 rounded-full focus:outline-white w-full py-2 text-[#5F5F5F] font-semibold" type="submit">Log in</button>
                        </form>
                    </div>
                    <div>
                        <div
                            class="flex items-center justify-center w-full space-x-6 mb-4"
                        >
                            <a
                                class="transition-all duration-150 hover:opacity-80"
                                href="#"
                            >
                                <img
                                    class="w-8 aspect-square"
                                    src="/img/icon-instagram.png"
                                    alt="icon-instagram"
                                />
                            </a>
                            <a
                                class="transition-all duration-150 hover:opacity-80"
                                href="#"
                            >
                                <img
                                    class="w-9"
                                    src="/img/icon-youtube.png"
                                    alt="icon-youtube"
                                />
                            </a>
                            <a
                                class="transition-all duration-150 hover:opacity-80"
                                href="#"
                            >
                                <img
                                    class="w-8 aspect-square"
                                    src="/img/icon-facebook.png"
                                    alt="icon-facebook"
                                />
                            </a>
                        </div>
                        <span
                            class="h-[3px] w-40 bg-white/20 block mx-auto"
                        ></span>
                    </div>
                </aside>
            </div>
        </div>
    </body>
</html>
