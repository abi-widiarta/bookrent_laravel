<!-- drawer component -->
<div id="drawer-navigation" class="fixed top-0 left-0 z-40 h-screen overflow-x-visible overflow-y-auto transition-transform duration-500 -translate-x-full lg:translate-x-0" tabindex="-1" aria-labelledby="drawer-navigation-label">

    <aside
    class="flex  h-full space-y-6 backdrop-blur-md text-[#151C48] overflow-x-visible  flex-col items-center bg-white w-[19rem] py-9 pr-10 pl-10 shadow-[4px_0px_50px_4px_rgba(198,203,232,0.1)]"
    >
        <div class="w-full px-1">
            <div class="flex items-center justify-between w-full mb-4">
            
                <div class="w-14 aspect-square rounded-lg flex  justify-center items-center bg-[#FAFBFD] border-[3.5px]  border-[#FF3737] shadow-[0px_4px_4px_0px_rgba(255,55,55,0.23)]">
                    <img class="w-10" src="/img/logo.png" alt="logo" />
                        
                </div>
            
                <div class="text-md font-bold">
                    <h1>Telkom University</h1>
                    <h1>Open Library</h1>
                </div>
            </div>
            <span class="block mx-auto h-1 w-64 bg-white"></span>
        </div>
        <div class=" h-full w-full flex flex-col justify-between">

            @if (Auth::guard('web')->check())
                <ul class="space-y-2 text-sm font-normal ">
                    <li>
                        <a
                            class="flex items-center space-x-2 hover:opacity-80 transition-all duration-150 py-4 px-4 {{ Request::is('books*') ? 'bg-[#FF3737] shadow-[0px_4px_4px_0px_rgba(255,55,55,0.23)] hover:opacity-80 text-white' : 'text-[#151C48] hover:bg-gray-400/10' }} rounded-xl"
                            href="/books"
                            >
                            <svg stroke="{{ Request::is('books*') ? '#fff' : '#777A8F' }}" width="22" height="22" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.66663 9.33325C4.66663 6.03392 4.66663 4.38309 5.69213 3.35875C6.71646 2.33325 8.36729 2.33325 11.6666 2.33325H16.3333C19.6326 2.33325 21.2835 2.33325 22.3078 3.35875C23.3333 4.38309 23.3333 6.03392 23.3333 9.33325V18.6666C23.3333 21.9659 23.3333 23.6168 22.3078 24.6411C21.2835 25.6666 19.6326 25.6666 16.3333 25.6666H11.6666C8.36729 25.6666 6.71646 25.6666 5.69213 24.6411C4.66663 23.6168 4.66663 21.9659 4.66663 18.6666V9.33325Z"  stroke-width="1.5"/>
                                <path d="M23.2143 18.6665H9.21429C8.12929 18.6665 7.58679 18.6665 7.14113 18.7855C6.54766 18.9446 6.00654 19.2572 5.57217 19.6918C5.1378 20.1264 4.82548 20.6676 4.66663 21.2612"  stroke-width="1.5"/>
                                <path d="M9.33325 8.1665H18.6666M9.33325 12.2498H15.1666"  stroke-width="1.5" stroke-linecap="round"/>
                                </svg>
                            <p>Books</p></a
                        >
                    </li>
                    <li>
                        <a
                            class="flex items-center space-x-2 hover:opacity-80 transition-all duration-150 py-4 px-4 {{ Request::is('wishlist*') ? 'bg-[#FF3737] shadow-[0px_4px_4px_0px_rgba(255,55,55,0.23)] hover:opacity-80 text-white' : 'text-[#151C48] hover:bg-gray-400/10' }} rounded-xl"
                            href="/wishlist"
                            >

                            <svg stroke="{{ Request::is('wishlist*') ? '#fff' : '#777A8F' }}" width="21" height="21" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.7233 24.2784C14.3267 24.4184 13.6733 24.4184 13.2767 24.2784C9.89334 23.1234 2.33334 18.305 2.33334 10.1384C2.33334 6.53337 5.23834 3.6167 8.82001 3.6167C10.9433 3.6167 12.8217 4.64337 14 6.23003C15.1783 4.64337 17.0683 3.6167 19.18 3.6167C22.7617 3.6167 25.6667 6.53337 25.6667 10.1384C25.6667 18.305 18.1067 23.1234 14.7233 24.2784Z" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                
                            {{-- <svg  viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.66663 9.33325C4.66663 6.03392 4.66663 4.38309 5.69213 3.35875C6.71646 2.33325 8.36729 2.33325 11.6666 2.33325H16.3333C19.6326 2.33325 21.2835 2.33325 22.3078 3.35875C23.3333 4.38309 23.3333 6.03392 23.3333 9.33325V18.6666C23.3333 21.9659 23.3333 23.6168 22.3078 24.6411C21.2835 25.6666 19.6326 25.6666 16.3333 25.6666H11.6666C8.36729 25.6666 6.71646 25.6666 5.69213 24.6411C4.66663 23.6168 4.66663 21.9659 4.66663 18.6666V9.33325Z"  stroke-width="1.5"/>
                                <path d="M23.2143 18.6665H9.21429C8.12929 18.6665 7.58679 18.6665 7.14113 18.7855C6.54766 18.9446 6.00654 19.2572 5.57217 19.6918C5.1378 20.1264 4.82548 20.6676 4.66663 21.2612"  stroke-width="1.5"/>
                                <path d="M9.33325 8.1665H18.6666M9.33325 12.2498H15.1666"  stroke-width="1.5" stroke-linecap="round"/>
                                </svg> --}}
                            <p>Wishlist</p></a
                        >
                    </li>
                    <li>
                        <a class="{{ Request::is('rent-request*') ? 'bg-[#FF3737] shadow-[0px_4px_4px_0px_rgba(255,55,55,0.23)] text-white hover:opacity-80' : 'text-[#151C48] hover:bg-gray-400/10' }} flex items-center space-x-2  transition-all duration-150 p-4 rounded-xl" href="/rent-request"
                            >
                            <svg stroke="{{ Request::is('rent-request*') ? '#fff' : '#777A8F' }}" width="22" height="22" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.2196 6.30938L21.6906 8.77921M20.8086 4.13354L14.1271 10.815C13.7819 11.1598 13.5464 11.599 13.4504 12.0774L12.8333 15.1667L15.9226 14.5484C16.4009 14.4527 16.8396 14.2182 17.1849 13.8729L23.8664 7.19138C24.0672 6.9906 24.2265 6.75223 24.3351 6.4899C24.4438 6.22757 24.4997 5.9464 24.4997 5.66246C24.4997 5.37851 24.4438 5.09735 24.3351 4.83501C24.2265 4.57268 24.0672 4.33432 23.8664 4.13354C23.6656 3.93276 23.4273 3.77349 23.1649 3.66483C22.9026 3.55617 22.6214 3.50024 22.3375 3.50024C22.0536 3.50024 21.7724 3.55617 21.5101 3.66483C21.2477 3.77349 21.0094 3.93276 20.8086 4.13354Z"  stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M22.1666 17.5002V21.0002C22.1666 21.619 21.9208 22.2125 21.4832 22.6501C21.0456 23.0877 20.4521 23.3335 19.8333 23.3335H6.99996C6.38112 23.3335 5.78763 23.0877 5.35004 22.6501C4.91246 22.2125 4.66663 21.619 4.66663 21.0002V8.16683C4.66663 7.54799 4.91246 6.9545 5.35004 6.51691C5.78763 6.07933 6.38112 5.8335 6.99996 5.8335H10.5"  stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                
                            <p>Rent Request</p> </a
                        >
                    </li>
                    <li>
                        <a class="{{ Request::is('rent-logs*') ? 'bg-[#FF3737] shadow-[0px_4px_4px_0px_rgba(255,55,55,0.23)] text-white hover:opacity-80' : 'text-[#151C48] hover:bg-gray-400/10' }}  flex items-center space-x-2 transition-all duration-150 p-4 rounded-xl" href="/rent-logs"
                            >
                            <svg fill="{{ Request::is('rent-logs*') ? '#fff' : '#777A8F' }}" width="21" height="21" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.312 1.40625H14.688C16.7557 1.40625 18.3938 1.40625 19.6751 1.57837C20.9936 1.75613 22.0612 2.12963 22.9039 2.97113C23.7454 3.81375 24.1189 4.88138 24.2966 6.19988C24.4688 7.48238 24.4688 9.11925 24.4688 11.187V15.813C24.4688 17.8807 24.4688 19.5188 24.2966 20.8001C24.1189 22.1186 23.7454 23.1862 22.9039 24.0289C22.0612 24.8704 20.9936 25.2439 19.6751 25.4216C18.3926 25.5938 16.7557 25.5938 14.688 25.5938H12.312C10.2443 25.5938 8.60625 25.5938 7.32488 25.4216C6.00638 25.2439 4.93875 24.8704 4.09613 24.0289C3.25463 23.1862 2.88113 22.1186 2.70338 20.8001C2.53125 19.5176 2.53125 17.8807 2.53125 15.813V11.187C2.53125 9.11925 2.53125 7.48125 2.70338 6.19988C2.88113 4.88138 3.25463 3.81375 4.09613 2.97113C4.93875 2.12963 6.00638 1.75613 7.32488 1.57837C8.60738 1.40625 10.2443 1.40625 12.312 1.40625ZM7.54875 3.25125C6.417 3.40313 5.7645 3.68887 5.2875 4.16475C4.81275 4.64062 4.527 5.29312 4.37512 6.42487C4.21987 7.58137 4.21763 9.10463 4.21763 11.25V15.75C4.21763 17.8954 4.21987 19.4198 4.37512 20.5763C4.527 21.7069 4.81275 22.3594 5.28863 22.8353C5.7645 23.3111 6.417 23.5969 7.54875 23.7488C8.70525 23.904 10.2285 23.9062 12.3739 23.9062H14.6239C16.7692 23.9062 18.2936 23.904 19.4501 23.7488C20.5807 23.5969 21.2333 23.3111 21.7091 22.8353C22.185 22.3594 22.4707 21.7069 22.6226 20.5751C22.7779 19.4197 22.7801 17.8954 22.7801 15.75V11.25C22.7801 9.10463 22.7779 7.58138 22.6226 6.42375C22.4707 5.29313 22.185 4.64062 21.7091 4.16475C21.2333 3.68887 20.5808 3.40313 19.449 3.25125C18.2936 3.096 16.7692 3.09375 14.6239 3.09375H12.3739C10.2285 3.09375 8.70638 3.096 7.54875 3.25125ZM8.15625 9C8.15625 8.77622 8.24514 8.56161 8.40338 8.40338C8.56161 8.24514 8.77622 8.15625 9 8.15625H18C18.2238 8.15625 18.4384 8.24514 18.5966 8.40338C18.7549 8.56161 18.8438 8.77622 18.8438 9C18.8438 9.22378 18.7549 9.43839 18.5966 9.59662C18.4384 9.75485 18.2238 9.84375 18 9.84375H9C8.77622 9.84375 8.56161 9.75485 8.40338 9.59662C8.24514 9.43839 8.15625 9.22378 8.15625 9ZM8.15625 13.5C8.15625 13.2762 8.24514 13.0616 8.40338 12.9034C8.56161 12.7451 8.77622 12.6562 9 12.6562H18C18.2238 12.6562 18.4384 12.7451 18.5966 12.9034C18.7549 13.0616 18.8438 13.2762 18.8438 13.5C18.8438 13.7238 18.7549 13.9384 18.5966 14.0966C18.4384 14.2549 18.2238 14.3438 18 14.3438H9C8.77622 14.3438 8.56161 14.2549 8.40338 14.0966C8.24514 13.9384 8.15625 13.7238 8.15625 13.5ZM8.15625 18C8.15625 17.7762 8.24514 17.5616 8.40338 17.4034C8.56161 17.2451 8.77622 17.1562 9 17.1562H14.625C14.8488 17.1562 15.0634 17.2451 15.2216 17.4034C15.3799 17.5616 15.4688 17.7762 15.4688 18C15.4688 18.2238 15.3799 18.4384 15.2216 18.5966C15.0634 18.7549 14.8488 18.8438 14.625 18.8438H9C8.77622 18.8438 8.56161 18.7549 8.40338 18.5966C8.24514 18.4384 8.15625 18.2238 8.15625 18Z" />
                                </svg>
                            
                            <p>Rent Logs</p> </a
                        >
                    </li>
                
                </ul>
                {{-- <form class="rent-request-form-logout" action="/logout" method="post">
                    @csrf
                    <button class="flex w-full items-center space-x-2 text-sm font-normal text-[#777A8F] hover:bg-gray-400/10 transition-all duration-150 p-4 rounded-xl" type="submit">
                        <svg width="21" height="21" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.75208 7.58317C9.76508 5.22692 9.87016 3.95075 10.7022 3.11875C11.6544 2.1665 13.1862 2.1665 16.2499 2.1665H17.3332C20.398 2.1665 21.9298 2.1665 22.8821 3.11875C23.8332 4.06992 23.8332 5.60284 23.8332 8.6665V17.3332C23.8332 20.3968 23.8332 21.9298 22.8821 22.8809C21.9287 23.8332 20.398 23.8332 17.3332 23.8332H16.2499C13.1862 23.8332 11.6544 23.8332 10.7022 22.8809C9.87016 22.0489 9.76508 20.7728 9.75208 18.4165" stroke="#777A8F" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M16.25 13H2.16663M2.16663 13L5.95829 9.75M2.16663 13L5.95829 16.25" stroke="#777A8F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        <p>Log Out</p>
                    </button>
                </form> --}}
            @else
                <ul class="space-y-2 text-sm font-normal ">
                    <li>
                        <a
                            class="flex items-center space-x-2 hover:opacity-80 transition-all duration-150 py-4 px-4 {{ Request::is('admin/dashboard') ? 'bg-[#FF3737] shadow-[0px_4px_4px_0px_rgba(255,55,55,0.23)] hover:opacity-80 text-white' : 'text-[#151C48] hover:bg-gray-400/10' }} rounded-xl"
                            href="/admin/dashboard"
                            >
                            <svg fill="{{ Request::is('admin/dashboard') ? '#fff' : '#777A8F' }}" width="22" height="22" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.0833 9.75V3.25H22.75V9.75H14.0833ZM3.25 14.0833V3.25H11.9167V14.0833H3.25ZM14.0833 22.75V11.9167H22.75V22.75H14.0833ZM3.25 22.75V16.25H11.9167V22.75H3.25Z"/>
                            </svg>    
                            <p>Dashboard</p></a
                        >
                    </li>
                    <li>
                        <a
                            class="flex items-center space-x-2 hover:opacity-80 transition-all duration-150 py-4 px-4 {{ Request::is('admin/books*') ? 'bg-[#FF3737] shadow-[0px_4px_4px_0px_rgba(255,55,55,0.23)] hover:opacity-80 text-white' : 'text-[#151C48] hover:bg-gray-400/10' }} rounded-xl"
                            href="/admin/books"
                            >
                            <svg stroke="{{ Request::is('admin/books*') ? '#fff' : '#777A8F' }}" width="22" height="22" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.66663 9.33325C4.66663 6.03392 4.66663 4.38309 5.69213 3.35875C6.71646 2.33325 8.36729 2.33325 11.6666 2.33325H16.3333C19.6326 2.33325 21.2835 2.33325 22.3078 3.35875C23.3333 4.38309 23.3333 6.03392 23.3333 9.33325V18.6666C23.3333 21.9659 23.3333 23.6168 22.3078 24.6411C21.2835 25.6666 19.6326 25.6666 16.3333 25.6666H11.6666C8.36729 25.6666 6.71646 25.6666 5.69213 24.6411C4.66663 23.6168 4.66663 21.9659 4.66663 18.6666V9.33325Z"  stroke-width="1.5"/>
                                <path d="M23.2143 18.6665H9.21429C8.12929 18.6665 7.58679 18.6665 7.14113 18.7855C6.54766 18.9446 6.00654 19.2572 5.57217 19.6918C5.1378 20.1264 4.82548 20.6676 4.66663 21.2612"  stroke-width="1.5"/>
                                <path d="M9.33325 8.1665H18.6666M9.33325 12.2498H15.1666"  stroke-width="1.5" stroke-linecap="round"/>
                                </svg>
                            <p>Books</p></a
                        >
                    </li>
                    <li>
                        <a class="{{ Request::is('admin/rent-request') ? 'bg-[#FF3737] shadow-[0px_4px_4px_0px_rgba(255,55,55,0.23)] text-white hover:opacity-80' : 'text-[#151C48] hover:bg-gray-400/10' }} flex items-center space-x-2  transition-all duration-150 p-4 rounded-xl" href="/admin/rent-request"
                            >
                            <svg stroke="{{ Request::is('admin/rent-request') ? '#fff' : '#777A8F' }}" width="22" height="22" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.2196 6.30938L21.6906 8.77921M20.8086 4.13354L14.1271 10.815C13.7819 11.1598 13.5464 11.599 13.4504 12.0774L12.8333 15.1667L15.9226 14.5484C16.4009 14.4527 16.8396 14.2182 17.1849 13.8729L23.8664 7.19138C24.0672 6.9906 24.2265 6.75223 24.3351 6.4899C24.4438 6.22757 24.4997 5.9464 24.4997 5.66246C24.4997 5.37851 24.4438 5.09735 24.3351 4.83501C24.2265 4.57268 24.0672 4.33432 23.8664 4.13354C23.6656 3.93276 23.4273 3.77349 23.1649 3.66483C22.9026 3.55617 22.6214 3.50024 22.3375 3.50024C22.0536 3.50024 21.7724 3.55617 21.5101 3.66483C21.2477 3.77349 21.0094 3.93276 20.8086 4.13354Z"  stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M22.1666 17.5002V21.0002C22.1666 21.619 21.9208 22.2125 21.4832 22.6501C21.0456 23.0877 20.4521 23.3335 19.8333 23.3335H6.99996C6.38112 23.3335 5.78763 23.0877 5.35004 22.6501C4.91246 22.2125 4.66663 21.619 4.66663 21.0002V8.16683C4.66663 7.54799 4.91246 6.9545 5.35004 6.51691C5.78763 6.07933 6.38112 5.8335 6.99996 5.8335H10.5"  stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                
                            <p>Rent Request</p> </a
                        >
                    </li>
                    <li>
                        <a class="{{ Request::is('admin/rent-logs') ? 'bg-[#FF3737] shadow-[0px_4px_4px_0px_rgba(255,55,55,0.23)] text-white hover:opacity-80' : 'text-[#151C48] hover:bg-gray-400/10' }}  flex items-center space-x-2 transition-all duration-150 p-4 rounded-xl" href="/admin/rent-logs"
                            >
                            <svg fill="{{ Request::is('admin/rent-logs') ? '#fff' : '#777A8F' }}" width="21" height="21" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.312 1.40625H14.688C16.7557 1.40625 18.3938 1.40625 19.6751 1.57837C20.9936 1.75613 22.0612 2.12963 22.9039 2.97113C23.7454 3.81375 24.1189 4.88138 24.2966 6.19988C24.4688 7.48238 24.4688 9.11925 24.4688 11.187V15.813C24.4688 17.8807 24.4688 19.5188 24.2966 20.8001C24.1189 22.1186 23.7454 23.1862 22.9039 24.0289C22.0612 24.8704 20.9936 25.2439 19.6751 25.4216C18.3926 25.5938 16.7557 25.5938 14.688 25.5938H12.312C10.2443 25.5938 8.60625 25.5938 7.32488 25.4216C6.00638 25.2439 4.93875 24.8704 4.09613 24.0289C3.25463 23.1862 2.88113 22.1186 2.70338 20.8001C2.53125 19.5176 2.53125 17.8807 2.53125 15.813V11.187C2.53125 9.11925 2.53125 7.48125 2.70338 6.19988C2.88113 4.88138 3.25463 3.81375 4.09613 2.97113C4.93875 2.12963 6.00638 1.75613 7.32488 1.57837C8.60738 1.40625 10.2443 1.40625 12.312 1.40625ZM7.54875 3.25125C6.417 3.40313 5.7645 3.68887 5.2875 4.16475C4.81275 4.64062 4.527 5.29312 4.37512 6.42487C4.21987 7.58137 4.21763 9.10463 4.21763 11.25V15.75C4.21763 17.8954 4.21987 19.4198 4.37512 20.5763C4.527 21.7069 4.81275 22.3594 5.28863 22.8353C5.7645 23.3111 6.417 23.5969 7.54875 23.7488C8.70525 23.904 10.2285 23.9062 12.3739 23.9062H14.6239C16.7692 23.9062 18.2936 23.904 19.4501 23.7488C20.5807 23.5969 21.2333 23.3111 21.7091 22.8353C22.185 22.3594 22.4707 21.7069 22.6226 20.5751C22.7779 19.4197 22.7801 17.8954 22.7801 15.75V11.25C22.7801 9.10463 22.7779 7.58138 22.6226 6.42375C22.4707 5.29313 22.185 4.64062 21.7091 4.16475C21.2333 3.68887 20.5808 3.40313 19.449 3.25125C18.2936 3.096 16.7692 3.09375 14.6239 3.09375H12.3739C10.2285 3.09375 8.70638 3.096 7.54875 3.25125ZM8.15625 9C8.15625 8.77622 8.24514 8.56161 8.40338 8.40338C8.56161 8.24514 8.77622 8.15625 9 8.15625H18C18.2238 8.15625 18.4384 8.24514 18.5966 8.40338C18.7549 8.56161 18.8438 8.77622 18.8438 9C18.8438 9.22378 18.7549 9.43839 18.5966 9.59662C18.4384 9.75485 18.2238 9.84375 18 9.84375H9C8.77622 9.84375 8.56161 9.75485 8.40338 9.59662C8.24514 9.43839 8.15625 9.22378 8.15625 9ZM8.15625 13.5C8.15625 13.2762 8.24514 13.0616 8.40338 12.9034C8.56161 12.7451 8.77622 12.6562 9 12.6562H18C18.2238 12.6562 18.4384 12.7451 18.5966 12.9034C18.7549 13.0616 18.8438 13.2762 18.8438 13.5C18.8438 13.7238 18.7549 13.9384 18.5966 14.0966C18.4384 14.2549 18.2238 14.3438 18 14.3438H9C8.77622 14.3438 8.56161 14.2549 8.40338 14.0966C8.24514 13.9384 8.15625 13.7238 8.15625 13.5ZM8.15625 18C8.15625 17.7762 8.24514 17.5616 8.40338 17.4034C8.56161 17.2451 8.77622 17.1562 9 17.1562H14.625C14.8488 17.1562 15.0634 17.2451 15.2216 17.4034C15.3799 17.5616 15.4688 17.7762 15.4688 18C15.4688 18.2238 15.3799 18.4384 15.2216 18.5966C15.0634 18.7549 14.8488 18.8438 14.625 18.8438H9C8.77622 18.8438 8.56161 18.7549 8.40338 18.5966C8.24514 18.4384 8.15625 18.2238 8.15625 18Z" />
                                </svg>
                            
                            <p>Rent Logs</p></a
                        >
                    </li>
                </ul>
                {{-- <form class="rent-request-form-logout" action="/admin/logout" method="post">
                    @csrf
                    <button class="flex w-full items-center space-x-2 text-sm font-normal text-[#777A8F] hover:bg-gray-400/10 transition-all duration-150 p-4 rounded-xl" type="submit">
                        <svg width="21" height="21" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.75208 7.58317C9.76508 5.22692 9.87016 3.95075 10.7022 3.11875C11.6544 2.1665 13.1862 2.1665 16.2499 2.1665H17.3332C20.398 2.1665 21.9298 2.1665 22.8821 3.11875C23.8332 4.06992 23.8332 5.60284 23.8332 8.6665V17.3332C23.8332 20.3968 23.8332 21.9298 22.8821 22.8809C21.9287 23.8332 20.398 23.8332 17.3332 23.8332H16.2499C13.1862 23.8332 11.6544 23.8332 10.7022 22.8809C9.87016 22.0489 9.76508 20.7728 9.75208 18.4165" stroke="#777A8F" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M16.25 13H2.16663M2.16663 13L5.95829 9.75M2.16663 13L5.95829 16.25" stroke="#777A8F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        <p>Log Out</p>
                    </button>
                </form> --}}
            @endif
        </div>
    </aside>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

const formLogout = document.querySelectorAll(".rent-request-form-logout")

formLogout.forEach(form => {
        form.addEventListener("submit", (e) => {
        e.preventDefault();

        Swal.fire({
        title: 'Warning',
        text: "Are you sure want to logout?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3cd766',
        cancelButtonColor: '#FF3737',
        confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            } 
        })
    })
});


// formLogout.addEventListener("submit", (e) => {
//     e.preventDefault();

//     Swal.fire({
//     title: 'Warning',
//     text: "Are you sure want to logout?",
//     icon: 'warning',
//     showCancelButton: true,
//     confirmButtonColor: '#3cd766',
//     cancelButtonColor: '#FF3737',
//     confirmButtonText: 'Yes'
//     }).then((result) => {
//         if (result.isConfirmed) {
//         formLogout.submit();
//         } 
//     })
// })

// formLogoutAdmin.addEventListener("submit", (e) => {
//     e.preventDefault();
//     console.log('tes admin');
//     Swal.fire({
//     title: 'Warning',
//     text: "Are you sure want to logout?",
//     icon: 'warning',
//     showCancelButton: true,
//     confirmButtonColor: '#3cd766',
//     cancelButtonColor: '#FF3737',
//     confirmButtonText: 'Yes'
//     }).then((result) => {
//         if (result.isConfirmed) {
//         formLogoutAdmin.submit();
//         } 
//     })
// })
</script>

