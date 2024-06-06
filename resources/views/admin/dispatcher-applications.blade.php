@extends('layouts.admin-layout', ['title' => 'Заявки сотрудников'])

@section('content')
    <div class="mt-28 mb-10 mx-auto max-w-screen-2xl overflow-x-auto shadow-md sm:rounded-lg m-auto p-8 bg-gray-900">
        <div class="flex justify-between mb-10">
            <h1 class="mb-5 text-3xl font-normal text-gray-900 dark:text-gray-400 first-color">Записи диспетчера</h1>
            <div class="flex gap-3">
                <div class="relative">
                    <svg class="second-color absolute bottom-5 left-3" width="20px" height="23px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M3 10C3 8.34315 4.34315 7 6 7H14C15.6569 7 17 8.34315 17 10V18C17 19.6569 15.6569 21 14 21H6C4.34315 21 3 19.6569 3 18V10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M10 14V11M10 14V17M10 14H13M10 14H7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M7 3L18 3C19.6569 3 21 4.34315 21 6L21 17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                    <button name="add" type="button"
                            class="py-2.5 px-10 my-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                        Создать новую запись
                    </button>
                </div>
                <div class="relative">
                    <svg class="second-color absolute bottom-5 left-3" width="20px" height="23px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M9.29289 1.29289C9.48043 1.10536 9.73478 1 10 1H18C19.6569 1 21 2.34315 21 4V9C21 9.55228 20.5523 10 20 10C19.4477 10 19 9.55228 19 9V4C19 3.44772 18.5523 3 18 3H11V8C11 8.55228 10.5523 9 10 9H5V20C5 20.5523 5.44772 21 6 21H7C7.55228 21 8 21.4477 8 22C8 22.5523 7.55228 23 7 23H6C4.34315 23 3 21.6569 3 20V8C3 7.73478 3.10536 7.48043 3.29289 7.29289L9.29289 1.29289ZM6.41421 7H9V4.41421L6.41421 7ZM19 12C19.5523 12 20 12.4477 20 13V19H23C23.5523 19 24 19.4477 24 20C24 20.5523 23.5523 21 23 21H19C18.4477 21 18 20.5523 18 20V13C18 12.4477 18.4477 12 19 12ZM11.8137 12.4188C11.4927 11.9693 10.8682 11.8653 10.4188 12.1863C9.96935 12.5073 9.86526 13.1318 10.1863 13.5812L12.2711 16.5L10.1863 19.4188C9.86526 19.8682 9.96935 20.4927 10.4188 20.8137C10.8682 21.1347 11.4927 21.0307 11.8137 20.5812L13.5 18.2205L15.1863 20.5812C15.5073 21.0307 16.1318 21.1347 16.5812 20.8137C17.0307 20.4927 17.1347 19.8682 16.8137 19.4188L14.7289 16.5L16.8137 13.5812C17.1347 13.1318 17.0307 12.5073 16.5812 12.1863C16.1318 11.8653 15.5073 11.9693 15.1863 12.4188L13.5 14.7795L11.8137 12.4188Z" fill="currentColor"></path> </g></svg>
                    <button name="export-excel" type="button" id="export-button"
                            class="py-2.5 px-10 my-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                        Экспорт в Excel
                    </button>
                </div>
            </div>
        </div>
        <form id="table-search-users" action="{{ route('dispatcherApplications') }}" method="GET"
              class="flex gap-3 items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4">
            <div class="flex gap-3 items-center flex-wrap">
                <label for="table-search" class="sr-only">Поиск</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 second-color" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input name="user-search" type="search" id="table-search-users"
                           class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 transition duration-300"
                           placeholder="Найти по имени принявшего заявку"
                           value="{{$user_search}}"
                    >
                </div>
                <div class="custom-select-wrapper">
                    <div class="relative custom-select rounded-xl">
                        <svg class="second-color absolute top-3 left-3" width="23" height="20" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2.875 9.167V10c0 4.142 3.862 7.5 8.625 7.5 4.764 0 8.625-3.358 8.625-7.5v-.833m-12.458 0L11.5 12.5m0 0 3.833-3.333M11.5 12.5v-10"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>

                        <div
                            class="custom-select-trigger py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 transition duration-300">
                            По статусу заявки
                        </div>
                        <div
                            class="custom-options text-sm font-medium text-gray-900 focus:outline-none bg-gray-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-gray-400 dark:border-gray-600">
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

            </div>
            <div class="flex gap-3">
                <a data-modal-hide="popup-modal" href="{{ route('dispatcherApplications') }}"
                   class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 transition duration-300">Сброс</a>
                <button data-modal-hide="popup-modal" type="submit"
                        class="py-2.5 px-10 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 transition duration-300">
                    Найти...
                </button>
            </div>

           <div class="w-full flex justify-between items-center">
               <div class="flex gap-3 items-center">
                   <label class="text-gray-400" for="date-start">Дата от:</label>
                   <input value="{{ $date_start }}" name="date-start" type="date" class="py-2.5 px-10 my-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
               </div>
               <div class="flex gap-3 items-center">
                   <label class="text-gray-400" for="date-end">Дата до:</label>
                   <input value="{{ $date_end }}" name="date-end" type="date" class="py-2.5 px-10 my-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
               </div>
           </div>
        </form>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-4" id="data-table">
            <thead class="text-xs uppercase bg-gray-700 text-white">
            <tr>
                <th scope="col" class="px-3 py-3 ">Дата</th>
                <th scope="col" class="px-3 py-3">Заявку принял</th>
                <th scope="col" class="px-3 py-3">Инициатор обслуживания или ремонта</th>
                <th scope="col" class="px-3 py-3">Наименование инженерной системы</th>
                <th scope="col" class="px-3 py-3">Планируемые работы</th>
                <th scope="col" class="px-3 py-3">Длительность работ</th>
                <th scope="col" class="px-3 py-3">Дата согласования работ</th>
                <th scope="col" class="px-3 py-3">Результат согласования остановки систем</th>
                <th scope="col" class="px-3 py-3">Кто сообщил инициатору работ о согласовании</th>
                <th scope="col" class="px-3 py-3">Статус заявки</th>
                @if(auth()->user()->role ==='admin')
                    <th scope="col" class="px-6 py-3">Действие</th>
                @endif
            </tr>
            </thead>
            <tbody class="dispatcher-applications">
            @forelse($dispatcherApplications as $dispatcherApplication)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4 dark:text-white">
                        {{   \Carbon\Carbon::parse($dispatcherApplication->created_at)->format('d.m.Y H:i')  ?? 'Не указан'}}

                    </td>
                    <td class="px-6 py-4 text-gray-900 dark:text-white">
                            <a class="text-base font-semibold" href="{{route('profile', ['id' => $dispatcherApplication->user->id])}}">{{$dispatcherApplication->user->name}}</a>
                    </td>

                    <td class="px-6 py-4 dark:text-white">
                        {{ $dispatcherApplication->initiator ?? 'Не указан'}}
                    </td>
                    <td class="px-6 py-4 cursor-pointer description" id="description">
                        {{ $dispatcherApplication->system_name ?? 'Не указано'}}
                    </td>
                    <td class="px-6 py-4 cursor-pointer description" id="description">
                        {{ $dispatcherApplication->planned_work ?? 'Не указаны'}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $dispatcherApplication->work_duration ?? 'Не указаны'}}
                    </td>
                    <td class="px-6 py-4">
                        {{   \Carbon\Carbon::parse($dispatcherApplication->approval_date)->format('d.m.Y H:i')  ?? 'Не указана'}}
                    </td>
                    <td class="px-6 py-4 cursor-pointer description" id="description">
                        {{ $dispatcherApplication->approval_result ?? 'Не указан'}}
                    </td>
                    <td class="px-6 py-4 dark:text-white">
                        {{ $dispatcherApplication->communicated_by ?? 'Не указано'}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $dispatcherApplication->status ?? 'Не указан'}}
                    </td>
                    @if(auth()->user()->role ==='admin')
                        <td class="px-6 py-4">
                            <details class="table-details">
                                <summary
                                    class="table-summary select-none cursor-pointer hover:text-blue-300 transition duration-300">
                                    Выбрать
                                </summary>
                                <button type="button"
                                        class="top-5 right-24 py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 transition duration-300"
                                        name="edit" id="{{$dispatcherApplication->id}}">Редактировать
                                </button>
                                <button type="button"
                                        class="top-5 right-0 py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 transition duration-300"
                                        name="delete" id="{{$dispatcherApplication->id}}">Удалить
                                </button>
                            </details>
                        </td>
                    @endif
                </tr>
            @empty
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td colspan="12" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <h3 class="mb-5 text-2xl font-normal text-white">Ничего не найдено</h3>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>


            <div class="pagination-control justify-center mt-4">
                {{ $dispatcherApplications->withQueryString()->links() }}
            </div>


        @vite('resources/js/export-to-excel.js')

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var dateInputs = document.querySelectorAll('input[type="date"]');

                dateInputs.forEach(function(input) {
                    input.addEventListener('focus', function() {
                        if (typeof input.showPicker === 'function') {
                            input.showPicker();
                        }
                    });
                });
            });
        </script>
    @include('components.scripts.custom-select-control')
    @include('components.scripts.enter-to-send-form')
    @include('components.admin.delete-confirmation', ['route' => route('deleteDispatcherApplication')])
    @include('components.admin.description-popup')
    @include('components.scripts.dispatcher-popup-control')
    @include('components.admin.dispatcher-application-modal')
@endsection
