@extends('layouts.layout', ['title' => 'Мои заявления'])
@section('content')
    <div class="overflow-x-auto shadow-md sm:rounded-lg mx-auto p-8 bg-gray-100 ">
        <h1 class="mb-5 text-3xl font-normal text-gray-900 light:text-gray-400 first-color">Мои заявки</h1>
        <form id="table-search-users" action="{{ route('applications') }}" method="GET"
              class="flex items-center gap-3 justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4">
            <label for="table-search" class="sr-only">Поиск</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 light:text-gray-400" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input name="user-search" type="search" id="table-search-users"
                       class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 focus:ring-blue-500 focus:border-blue-500 light:bg-gray-700 light:border-gray-600 bg-gray-100 light:placeholder-gray-400 light:text-gray-100 light:focus:ring-blue-500 light:focus:border-blue-500 transition duration-300"
                       placeholder="Найти по описанию"
                       value="{{ $userSearch }}">
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
                        class="custom-select-trigger py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-gray-100 rounded-lg border border-gray-300 hover:bg-gray-50 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 transition duration-300">
                        По типу заявки
                    </div>
                    <div
                        class="custom-options text-sm font-medium text-gray-900 focus:outline-none bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-200">
                        <input type="hidden" name="application-type-id" id="application-type-id">
                        <input type="hidden" name="application-type" id="selected_option">
                        @forelse($applicationTypes as $applicationType)
                            <span
                                class="custom-option py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none rounded-lg hover:bg-gray-50 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 transition duration-300"
                                id="{{$applicationType->id}}"
                                data-value="{{$applicationType->type}}">{{$applicationType->type}}</span>
                        @empty
                            <span
                                class="custom-option py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none rounded-lg hover:bg-gray-50 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 transition duration-300"
                                data-value="none">Нет типов заявок</span>
                        @endforelse
                    </div>
                </div>
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
                        class="custom-select-trigger py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-gray-100 rounded-lg border border-gray-300 hover:bg-gray-50 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 transition duration-300">
                        По статусу заявки
                    </div>
                    <div
                        class="custom-options text-sm font-medium text-gray-900 focus:outline-none bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-200">
                        <input type="hidden" name="application-status-id" id="application-status-id">
                        <input type="hidden" name="application-status" id="selected_option_status">
                        @forelse($statuses as $status)
                            <span
                                class="custom-option py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none rounded-lg hover:bg-gray-50 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 transition duration-300"
                                id="{{$status->id}}" data-value="{{$status->status}}">{{$status->status}}</span>
                        @empty
                            <span
                                class="custom-option py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none rounded-lg hover:bg-gray-50 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 transition duration-300"
                                data-value="none">Нет статусов заявок</span>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="flex gap-3">
                <a data-modal-hide="popup-modal" href="{{ route('applications') }}"
                   class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-gray-100 rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 light:focus:ring-gray-700 light:bg-gray-800 light:text-gray-400 light:border-gray-600 light:hover:text-gray-100 light:hover:bg-gray-700 transition duration-300">Сброс</a>
                <button data-modal-hide="popup-modal" type="submit"
                        class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-gray-100 rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 light:focus:ring-gray-700 light:bg-gray-800 light:text-gray-400 light:border-gray-600 light:hover:text-gray-100 light:hover:bg-gray-700 transition duration-300">
                    Найти...
                </button>
            </div>
        </form>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 light:text-gray-400 mt-4">
            <thead class="text-xs uppercase bg-second text-gray-100">
            <tr>
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
            </tr>
            </thead>
            <tbody class="employee-applications">
            @forelse($employeeApplications as $employeeApplication)
                <tr class="bg-gray-100 border-b light:bg-gray-800 light:border-gray-700 hover:bg-gray-50 light:hover:bg-gray-600 transition duration-300">
                    <td class="px-6 py-4 font-bold">
                        {{   \Carbon\Carbon::parse($employeeApplication->created_at)->format('d.m.Y H:i')  ?? 'Не указана'}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $employeeApplication->type ?? 'Не указан'}}
                    </td>
                    <td class="px-6 py-4 break-all cursor-pointer description transition" id="description">
                        {{ $employeeApplication->description ?? 'Не указано'}}
                    </td>
                    <td class="px-6 py-4 files flex-wrap">
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
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"
                                               transform="translate(0,0), scale(1)">
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
                    <td class="px-6 py-4 font-bold">
                        {{ $employeeApplication->status ?? 'Не указан'}}
                    </td>
                </tr>
            @empty
                <tr class="bg-gray-100 border-b light:bg-gray-800 light:border-gray-700 hover:bg-gray-50 light:hover:bg-gray-600">
                    <td colspan="6" class="px-6 py-4 whitespace-nowrap ext-gray-900">
                        <h3 class="mb-5 text-2xl font-normal">Ничего не найдено</h3>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>


        <div class="pagination-control justify-center mt-4">
            {{ $employeeApplications->withQueryString()->links() }}
        </div>

    </div>
    @include('components.scripts.enter-to-send-form')
    @include('components.scripts.popup-control')
    @include('components.scripts.close-all-details-summary')
    @include('components.admin.delete-confirmation', ['route' => route('deleteUser')])
    @include('components.scripts.custom-select-control')
    @include('components.admin.description-popup-light')
@endsection
