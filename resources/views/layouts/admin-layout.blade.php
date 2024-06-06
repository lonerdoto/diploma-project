<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('images/favicon.svg') }}">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{asset('build/assets/app-BCtKanTu.css')}}">
    @vite('resources/css/app.css')
    @include('components.scripts.flash-control')
</head>
<body class="relative bg-gray-700">
<nav class="fixed top-0 z-40 w-full bg-white border-b dark:bg-gray-800 border-slate-500">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex gap-4 items-center">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                            type="button"
                            class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                  d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                        </svg>
                    </button>
                    <a href="{{route('home')}}" class="">
                        <img src="{{asset('images/logo-second.svg')}}" alt="" width="160px" height="100px">
                    </a>
                </div>
            </div>
            <div class="flex items-center">
                <div class="flex items-center ms-3 gap-3">
                    <div>
                        <p class="text-gray-500 dark:text-gray-400">{{auth()->user()->name}}</p>
                    </div>
                    <a href="{{route('profile', ['id' => auth()->id()] )}}">
                        <button type="button"
                                class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-12 h-12 rounded-full"
                                 src="{{auth()->user()->avatar === null ? asset('images/no-avatar.svg')  : url('uploads/' . auth()->user()->avatar ) }}"
                                 alt="user photo">
                        </button>
                    </a>

                    <div
                        class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                        id="dropdown-user">
                        <div class="px-4 py-3" role="none">
                            <p class="text-sm text-gray-900 dark:text-white" role="none">
                                Neil Sims
                            </p>
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                                neil.sims@flowbite.com
                            </p>
                        </div>
                        <ul class="py-1" role="none">
                            <li>
                                <a href="#"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                   role="menuitem">Dashboard</a>
                            </li>
                            <li>
                                <a href="#"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                   role="menuitem">Settings</a>
                            </li>
                            <li>
                                <a href="#"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                   role="menuitem">Earnings</a>
                            </li>
                            <li>
                                <a href="#"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                   role="menuitem">Sign out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<aside id="logo-sidebar"
       class="fixed top-0 left-0 z-30 w-64 h-screen pt-20 bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700 sidebar-transition transform -translate-x-full"
       aria-label="Sidebar">
    <div class="relative sidebar-list h-full bg-scroll px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <li>
                <details class="details-sidebar">
                    <summary
                        class="open:bg-white cursor-pointer flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg
                            class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M11.25 2.07324C10.6437 2.18634 9.93159 2.43011 8.83772 2.80454L8.26491 3.00062C5.25832 4.02978 3.75503 4.54436 3.37752 5.08223C3.00825 5.60836 3.00018 7.14957 3 10.2093L11.25 7.45925V2.07324Z" fill="currentColor"></path> <path d="M11.25 9.04039L3 11.7904V11.9912C3 17.6293 7.23896 20.3653 9.89856 21.5271C10.4093 21.7502 10.7392 21.8943 11.25 21.9595V9.04039Z" fill="currentColor"></path> <path d="M12.75 21.9595V9.04039L21 11.7904V11.9912C21 17.6293 16.761 20.3653 14.1014 21.5271C13.5907 21.7502 13.2608 21.8943 12.75 21.9595Z" fill="currentColor"></path> <path d="M12.75 7.45925V2.07324C13.3563 2.18634 14.0684 2.43011 15.1623 2.80454L15.7351 3.00062C18.7417 4.02978 20.245 4.54436 20.6225 5.08223C20.9918 5.60836 20.9998 7.14957 21 10.2093L12.75 7.45925Z" fill="currentColor"></path> </g></svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Администратор</span>
                    </summary>
                    <a href="{{route('admin')}}"
                       class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <span class="pl-5 flex-1 ms-3 whitespace-nowrap">Админ-панель</span>
                    </a>
                </details>
            </li>

            <li>
                <details class="details-sidebar">
                    <summary
                        class="open:bg-white cursor-pointer flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg
                            class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Диспетчер</span>
                    </summary>
                    <a href="{{route('dispatcherApplications')}}"
                       class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <span class="pl-5 flex-1 ms-3 whitespace-nowrap">Посмотреть записи</span>
                    </a>
                </details>
            </li>
            <li>
                <details class="details-sidebar">
                    <summary
                        class="open:bg-white cursor-pointer flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg
                            class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 18 18">
                            <path
                                d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Система</span>
                    </summary>
                    <a href="{{route('showAddApplicationType')}}"
                       class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <span class="pl-5 flex-1 ms-3 whitespace-nowrap">Типы заявок</span>
                    </a>
                    <a href="{{route('showApplicationStatus')}}"
                       class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <span class="pl-5 flex-1 ms-3 whitespace-nowrap">Статусы заявок</span>
                    </a>


                </details>
            </li>
            <li>
                <details class="details-sidebar">
                    <summary
                        class="open:bg-white cursor-pointer flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg
                            class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 18">
                            <path
                                d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Сотрудники</span>
                    </summary>
                    <a href="{{route('usersList')}}"
                       class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <span class="pl-5 flex-1 ms-3 whitespace-nowrap">Список сотрудников</span>
                    </a>
                    <a href="{{route('usersApplications')}}"
                       class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <span class="pl-5 flex-1 ms-3 whitespace-nowrap">Заявки сотрудников</span>
                    </a>
                </details>
            </li>
        </ul>
    </div>
    <div class="toggle-sidebar bg-gray-800 border-r border-slate-500 cursor-pointer" id="sidebar-toggle">
        <svg class="text-gray-100" width="20px" height="20px"viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M8.49388 9.56443C8.80561 9.29167 8.83719 8.81785 8.56443 8.50612C8.29167 8.19439 7.81785 8.16281 7.50612 8.43557L8.49388 9.56443ZM3.50612 11.9356C3.19439 12.2083 3.16281 12.6822 3.43557 12.9939C3.70833 13.3056 4.18215 13.3372 4.49388 13.0644L3.50612 11.9356ZM4 11.75C3.58579 11.75 3.25 12.0858 3.25 12.5C3.25 12.9142 3.58579 13.25 4 13.25V11.75ZM20 13.25C20.4142 13.25 20.75 12.9142 20.75 12.5C20.75 12.0858 20.4142 11.75 20 11.75V13.25ZM4.49388 11.9356C4.18215 11.6628 3.70833 11.6944 3.43557 12.0061C3.16281 12.3178 3.19439 12.7917 3.50612 13.0644L4.49388 11.9356ZM7.50612 16.5644C7.81785 16.8372 8.29167 16.8056 8.56443 16.4939C8.83719 16.1822 8.80561 15.7083 8.49388 15.4356L7.50612 16.5644ZM20.4939 13.0644C20.8056 12.7917 20.8372 12.3178 20.5644 12.0061C20.2917 11.6944 19.8178 11.6628 19.5061 11.9356L20.4939 13.0644ZM15.5061 15.4356C15.1944 15.7083 15.1628 16.1822 15.4356 16.4939C15.7083 16.8056 16.1822 16.8372 16.4939 16.5644L15.5061 15.4356ZM19.5061 13.0644C19.8178 13.3372 20.2917 13.3056 20.5644 12.9939C20.8372 12.6822 20.8056 12.2083 20.4939 11.9356L19.5061 13.0644ZM16.4939 8.43557C16.1822 8.16281 15.7083 8.19439 15.4356 8.50612C15.1628 8.81785 15.1944 9.29167 15.5061 9.56443L16.4939 8.43557ZM7.50612 8.43557L3.50612 11.9356L4.49388 13.0644L8.49388 9.56443L7.50612 8.43557ZM4 13.25H20V11.75H4V13.25ZM3.50612 13.0644L7.50612 16.5644L8.49388 15.4356L4.49388 11.9356L3.50612 13.0644ZM19.5061 11.9356L15.5061 15.4356L16.4939 16.5644L20.4939 13.0644L19.5061 11.9356ZM20.4939 11.9356L16.4939 8.43557L15.5061 9.56443L19.5061 13.0644L20.4939 11.9356Z" fill="currentColor"></path> </g></svg>
    </div>
</aside>




<main class="main">
    @yield('content')
</main>
@include('components.scripts.save-scroll-position')
@include('components.scripts.showFlash')
@include('components.scripts.close-all-details-summary')
<script>
    const sidebar = document.getElementById('logo-sidebar');
    document.addEventListener('click', function(event) {
        if (!sidebar.contains(event.target)) {
            sidebar.classList.add('-translate-x-full');
            sidebar.classList.remove('translate-x-0');
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
        const sidebarToggle = document.getElementById('sidebar-toggle');

        sidebarToggle.addEventListener('click', function () {

            sidebar.classList.toggle('-translate-x-full');
            sidebar.classList.toggle('translate-x-0');
        });
    });
</script>
@vite('resources/js/app.js')
</body>
</html>





