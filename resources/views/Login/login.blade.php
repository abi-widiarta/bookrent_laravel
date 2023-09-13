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
                /* animation-iteration-count: infinite;
                animation-direction: alternate; */
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
                /* from {
                    opacity: 0;
                    transform: translateX(-100%);
                }

                to {
                    transform: translateX(0%);
                } */
            }
        </style>
    </head>
    <body
        class="bg-[url('/img/landingpage-bg.webp')] bg-cover bg-center bg-no-repeat"
    >
        <div class="w-screen h-screen bg-[#646464]/50">
            <div class="wrapper w-full h-full flex">
                <aside
                    class="flex text-white flex-col items-center bg-[#8599AC]/30 shadow-[2px_0px_0px_2px_rgba(225,225,225,0.6)] px-9 rounded-none w-full py-9 backdrop-blur-sm sm:w-[24rem] sm:rounded-tr-[3rem] sm:rounded-br-[3rem] sm:pr-10 sm:pl-10 sm:backdrop-blur-md"
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
                        <span class="block h-1 w-full bg-white"></span>
                    </div>
                    <div
                        class="flex text-center flex-1 flex-col items-center justify-center pb-20"
                    >
                        <h1 class="text-3xl font-semibold mb-2">Login</h1>
                        <p class="text-base color mb-10">
                            Please use your Google SSO account
                        </p>

                        <a
                            class="px-6 py-3 text-black/60 font-semibold rounded-full bg-white/80 hover:bg-white/60 transition-all duration-150 space-x-4 items-center flex"
                            href="/auth/google/redirect"
                        >
                            <img
                                class="w-6"
                                src="/img/icon-google.png"
                                alt="icon"
                            />
                            <p>Google SSO</p>
                        </a>
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
