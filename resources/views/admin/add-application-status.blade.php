@extends('layouts.admin-layout', ['title' => 'Добавить статус заявки'])
@section('content')
    <div class="mt-28 mb-10 mx-auto max-w-screen-2xl overflow-x-auto shadow-md sm:rounded-lg m-auto p-8 bg-gray-900">
        <h1 class="service-title mb-5 text-3xl font-normal text-gray-500 dark:text-gray-400">
            Статусы заявок
        </h1>
        <div class="relative">
            <svg class="second-color absolute bottom-5 left-3" width="20px" height="23px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M3 10C3 8.34315 4.34315 7 6 7H14C15.6569 7 17 8.34315 17 10V18C17 19.6569 15.6569 21 14 21H6C4.34315 21 3 19.6569 3 18V10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M10 14V11M10 14V17M10 14H13M10 14H7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M7 3L18 3C19.6569 3 21 4.34315 21 6L21 17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
            <button name="add" type="submit"
                    class="py-2.5 px-10 my-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                Добавить статус заявки
            </button>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-white uppercase bg-gray-50 dark:bg-gray-700">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Название статуса
                </th>
                <th scope="col" class="px-6 py-3">
                    Дата добавления
                </th>
                <th scope="col" class="px-6 py-3">
                    Действие
                </th>
            </tr>
            </thead>
            <tbody>
            @forelse($statuses as $status)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4">
                        {{$status->status}}
                    </td>
                    <td class="px-6 py-4">
                        {{$status->created_at}}
                    </td>
                    <td class="px-6 py-4">
                        <details class="table-details">
                            <summary class="table-summary select-none">
                                Выбрать
                            </summary>
                            <button type="button" class="top-5 right-20 hover:bg-gray-500" name="edit"
                                 id="{{$status->id}}">Редактировать
                            </button>
                            <button type="button" class="top-5 right-0 hover:bg-gray-500" name="delete"
                                 id="{{$status->id}}">Удалить
                            </button>
                        </details>
                    </td>
                </tr>
            @empty
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th colspan="6" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Типы заявок не
                            найдены</h3>
                    </th>
                </tr>
            @endforelse
            </tbody>
        </table>
        <div class="pagination-control justify-center">
            {{ $statuses->withQueryString()->links() }}
        </div>
    </div>
    @include('components.admin.add-application-status-popup')
    @include('components.scripts.add-application-popup-control')
    @include('components.admin.delete-confirmation', ['route' => route('deleteApplicationStatus')])
@endsection
