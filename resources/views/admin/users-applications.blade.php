@extends('layouts.admin-layout', ['title' => 'Заявки сотрудников'])

@section('content')
    <div class="mt-28 mb-10 mx-auto max-w-screen-2xl overflow-x-auto shadow-md sm:rounded-lg m-auto p-8 bg-gray-900">
        <div class="flex justify-between mb-10">
            <h1 class="mb-5 text-3xl font-normal text-gray-900 dark:text-gray-400 first-color">Заявки сотрудников</h1>
                <div class="relative">
                    <svg class="text-white absolute bottom-5 left-3" width="20px" height="23px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M9.29289 1.29289C9.48043 1.10536 9.73478 1 10 1H18C19.6569 1 21 2.34315 21 4V9C21 9.55228 20.5523 10 20 10C19.4477 10 19 9.55228 19 9V4C19 3.44772 18.5523 3 18 3H11V8C11 8.55228 10.5523 9 10 9H5V20C5 20.5523 5.44772 21 6 21H7C7.55228 21 8 21.4477 8 22C8 22.5523 7.55228 23 7 23H6C4.34315 23 3 21.6569 3 20V8C3 7.73478 3.10536 7.48043 3.29289 7.29289L9.29289 1.29289ZM6.41421 7H9V4.41421L6.41421 7ZM19 12C19.5523 12 20 12.4477 20 13V19H23C23.5523 19 24 19.4477 24 20C24 20.5523 23.5523 21 23 21H19C18.4477 21 18 20.5523 18 20V13C18 12.4477 18.4477 12 19 12ZM11.8137 12.4188C11.4927 11.9693 10.8682 11.8653 10.4188 12.1863C9.96935 12.5073 9.86526 13.1318 10.1863 13.5812L12.2711 16.5L10.1863 19.4188C9.86526 19.8682 9.96935 20.4927 10.4188 20.8137C10.8682 21.1347 11.4927 21.0307 11.8137 20.5812L13.5 18.2205L15.1863 20.5812C15.5073 21.0307 16.1318 21.1347 16.5812 20.8137C17.0307 20.4927 17.1347 19.8682 16.8137 19.4188L14.7289 16.5L16.8137 13.5812C17.1347 13.1318 17.0307 12.5073 16.5812 12.1863C16.1318 11.8653 15.5073 11.9693 15.1863 12.4188L13.5 14.7795L11.8137 12.4188Z" fill="currentColor"></path> </g></svg>
                    <button name="export-excel" type="button" id="export-button"
                            class="py-2.5 px-10 my-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                        Экспорт в Excel
                    </button>
                </div>
        </div>
        <form id="table-search-users" action="{{ route('usersApplications') }}" method="GET"
              class="flex gap-3 items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4">
            <label for="table-search" class="sr-only">Поиск</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-white" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input name="user-search" type="search" id="table-search-users"
                       class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 transition duration-300"
                       placeholder="Найти по описанию или имени сотрудника"
                       value="{{ $userSearch }}"
                >
            </div>
            <div class="custom-select-wrapper">
                <div class="relative custom-select rounded-xl">
                    <svg class="text-white absolute top-3 left-3" width="23" height="20" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2.875 9.167V10c0 4.142 3.862 7.5 8.625 7.5 4.764 0 8.625-3.358 8.625-7.5v-.833m-12.458 0L11.5 12.5m0 0 3.833-3.333M11.5 12.5v-10"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                    <div class="custom-select-trigger py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 transition duration-300">
                        По типу заявки
                    </div>
                    <div class="custom-options text-sm font-medium text-gray-900 focus:outline-none bg-gray-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-gray-400 dark:border-gray-600">
                        <input type="hidden" name="application-type-id" id="application-type-id">
                        <input type="hidden" name="application-type" id="selected_option">
                        @forelse($applicationTypes as $applicationType)
                            <span
                                class="custom-option py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 transition duration-300"
                                id="{{$applicationType->id}}"
                                data-value="{{$applicationType->type}}">{{$applicationType->type}}</span>
                        @empty
                            <span
                                class="custom-option py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 transition duration-300"
                                data-value="none">Нет типов заявок</span>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="custom-select-wrapper">
                <div class="relative custom-select rounded-xl">
                    <svg class="text-white absolute top-3 left-3" width="23" height="20" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2.875 9.167V10c0 4.142 3.862 7.5 8.625 7.5 4.764 0 8.625-3.358 8.625-7.5v-.833m-12.458 0L11.5 12.5m0 0 3.833-3.333M11.5 12.5v-10"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                    <div class="custom-select-trigger py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 transition duration-300">
                        По статусу заявки
                    </div>
                    <div class="custom-options text-sm font-medium text-gray-900 focus:outline-none bg-gray-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-gray-400 dark:border-gray-600">
                        <input type="hidden" name="application-status-id" id="application-status-id">
                        <input type="hidden" name="application-status" id="selected_option_status">
                        @forelse($statuses as $status)
                            <span
                                class="custom-option py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 transition duration-300"
                                id="{{$status->id}}"
                                data-value="{{$status->status}}">{{$status->status}}</span>
                        @empty
                            <span
                                class="custom-option py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 transition duration-300"
                                data-value="none">Нет статусов заявок</span>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="flex gap-3">
                <a data-modal-hide="popup-modal" href="{{ route('usersApplications') }}"
                   class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 transition duration-300" >Сброс</a>
                <button data-modal-hide="popup-modal" type="submit"
                        class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 transition duration-300">
                    Найти...
                </button>
            </div>
        </form>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-4" id="data-table">
            <thead class="text-xs uppercase bg-gray-700 text-white">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ФИО
                </th>
                <th scope="col" class="px-6 py-3">
                    Дата
                </th>
                <th class="px-6 py-3">
                    Тип заявки
                </th>
                <th scope="col" class="px-6 py-3">
                    Описание
                </th>
                <th scope="col" class="px-6 py-3">
                    Приложенные файлы
                </th>
                <th scope="col" class="px-6 py-3">
                    Статус
                </th>
                <th scope="col" class="px-6 py-3">
                    Действие
                </th>
            </tr>
            </thead>
            <tbody class="employee-applications">
            @forelse($employeeApplications as $employeeApplication)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 transition duration-300 items-center align-middle">
                    <td class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <div class="flex items-center">
                            <img class="w-10 h-10 rounded-full"
                                 src="{{$employeeApplication->user->avatar === null ? asset('images/no-avatar.svg')  : url('uploads/' . $employeeApplication->user->avatar) }}">
                            <div class="ps-3 flex flex-col items-start">
                                <div class="text-base font-semibold">{{$employeeApplication->user->name}}</div>
                                <div class="font-normal text-gray-500">{{$employeeApplication->user->email}}</div>
                            </div>
                        </div>

                    </td>
                    <td class="px-6 py-4 font-bold">
                        {{   \Carbon\Carbon::parse($employeeApplication->created_at)->format('d.m.Y H:i')  ?? 'Не указан'}}

                    </td>
                    <td class="px-6 py-4">
                        {{ $employeeApplication->type ?? 'Не указан'}}
                    </td>
                    <td class="px-6 py-4 break-all cursor-pointer description" id="description">
                        {{ $employeeApplication->description ?? 'Не указано'}}
                    </td>
                    <td class="px-6 py-4 files">
                        <div class="flex gap-2 flex-wrap justify-center">
                            @forelse(json_decode($employeeApplication->files) as $file)
                                @if (preg_match('/\.(jpeg|jpg|png|gif|svg)$/i', $file))
                                    <a href="{{ url('uploads/' . $file) }}" download>
                                        <img src="{{ url('uploads/' . $file) }}" alt="Image"
                                             class="w-14 h-14 border border-slate-200 p-2 rounded-2xl hover:scale-110 transition duration-300">
                                    </a>
                                @else
                                    <a href="{{ url('uploads/' . $file) }}" download
                                       class="w-14 h-14 border border-slate-200 p-2 rounded-2xl flex items-center flex-col">
                                        <svg width="64px" height="64px" viewBox="-4.32 -4.32 32.64 32.64" fill="none"
                                             xmlns="http://www.w3.org/2000/svg"
                                             transform="matrix(1, 0, 0, 1, 0, 0)rotate(0)">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0" transform="translate(0,0), scale(1)">
                                                <rect x="-4.32" y="-4.32" width="32.64" height="32.64" rx="16.32"
                                                      fill="#36639c" strokewidth="0"></rect>
                                            </g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"
                                               stroke="#CCCCCC" stroke-width="0.096"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    d="M17 17L21 21M21 17L17 21M13 3H8.2C7.0799 3 6.51984 3 6.09202 3.21799C5.71569 3.40973 5.40973 3.71569 5.21799 4.09202C5 4.51984 5 5.0799 5 6.2V17.8C5 18.9201 5 19.4802 5.21799 19.908C5.40973 20.2843 5.71569 20.5903 6.09202 20.782C6.51984 21 7.0799 21 8.2 21H13M13 3L19 9M13 3V7.4C13 7.96005 13 8.24008 13.109 8.45399C13.2049 8.64215 13.3578 8.79513 13.546 8.89101C13.7599 9 14.0399 9 14.6 9H19M19 9V14"
                                                    stroke="#000000" stroke-width="2.04" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </g>
                                        </svg> @endif
                                    </a>
                                    @empty
                        </div>
                                    Не приложены
                                @endforelse
                    </td>
                    <td class="px-6 py-4">
                        {{ $employeeApplication->status ?? 'Не указан'}}
                    </td>
                    <td class="px-6 py-4">
                        <details class="table-details">
                            <summary
                                class="table-summary select-none cursor-pointer hover:text-blue-300 transition duration-300">
                                Выбрать
                            </summary>
                            <button type="button"
                                 class="top-5 right-20 py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 transition duration-300"
                                 name="edit" id="{{$employeeApplication->id}}">Редактировать
                            </button>
                            <button type="button"
                                 class="top-5 right-0 py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 transition duration-300"
                                 name="delete" id="{{$employeeApplication->id}}">Удалить
                            </button>
                        </details>
                    </td>
                </tr>
            @empty
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td colspan="7" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <h3 class="mb-5 text-2xl font-normal text-white">Ничего не найдено</h3>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <div class="pagination-control justify-center mt-4">
            {{ $employeeApplications->withQueryString()->links() }}
        </div>
    @vite('resources/js/export-to-excel.js')
    @include('components.scripts.custom-select-control')
    @include('components.scripts.enter-to-send-form')
    @include('components.admin.delete-confirmation', ['route' => route('deleteUserApplication')])
    @include('components.admin.users-applications-popup')
    @include('components.admin.description-popup')
    @include('components.scripts.users-applications-popup-control')
@endsection
