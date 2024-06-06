<div id="popup-edit" tabindex="-1" class="hidden modal delete-modal absolute flex justify-center items-center overflow-y-auto overflow-x-hidden z-40 w-full inset-0 h-screen">
    <div class="z-50 p-4 w-full max-w-md max-h-full">
        <div class=" rounded-lg shadow bg-gray-700">
            <form class="flex flex-col items-stretch gap-5 p-5" action="{{route('editApplicationType')}}" method="POST">
                <h3 class="modal-title mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Редактирование типа заявки</h3>
                @csrf
                @method('PATCH')
                <input name="user-id" type="hidden" class="hidden" id="user-id">
                <div class="relative">
                    <input type="text" name="type" id="input-name" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{old('input-name', '')}}" />
                    <label for="floating_filled" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Название типа заявки</label>
                </div>

                <div class="flex justify-between text-center">
                    <button type="submit" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Редактировать
                    </button>
                    <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Отмена</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="popup-add" tabindex="-1" class="hidden modal delete-modal absolute flex justify-center items-center overflow-y-auto overflow-x-hidden z-40 w-full inset-0 h-screen">
    <div class="z-50 p-4 w-full max-w-md max-h-full">
        <div class=" rounded-lg shadow bg-gray-700">
            <form class="flex flex-col items-stretch gap-5 p-5" action="{{route('addApplicationType')}}" method="POST">
                <h3 class="modal-title mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Новый тип заявки</h3>
                @csrf
                @method('POST')
                <input name="user-id" type="hidden" class="hidden" id="user-id">
                <div class="relative">
                    <input type="text" name="type" id="input-name" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{old('input-name', '')}}" />
                    <label for="floating_filled" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Название типа заявки</label>
                </div>

                <div class="flex justify-between text-center">
                    <button type="submit" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Добавить
                    </button>
                    <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Отмена</button>
                </div>
            </form>
        </div>
    </div>
</div>
