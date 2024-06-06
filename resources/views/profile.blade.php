@extends('layouts.layout', ['title' => "Сотрудник $user->name"])
@section('content')

    @include('components.scripts.get-role')
    <div class="container py-5 px-10 first-color mb-10">
        <h1 class="hidden mb-5 text-3xl font-normal text-gray-900 light:text-gray-400 first-color">Профиль</h1>
        <div class="relative flex flex-col min-w-0 break-words bg-gray-100 mb-6 rounded-lg">
            <div class="flex justify-between gap-5">
                <div class="flex gap-10">
                    <div class="flex flex-col items-center gap-5 justify-center relative">
                        <span class="hidden" id="user-id">{{$user->id}}</span>
                        <label for="avatar"
                               class="flex flex-col items-center gap-6 w-44 h-44 shadow-xl rounded-full align-middle border-none -top-12">
                            <img id="avatarPreview" alt="avatar"
                                 src="{{ $user->avatar === null ? asset('images/no-avatar.svg')  : url('uploads/' . $user->avatar ) }}"
                                 class="@if(auth()->id() === $user->id)  hover:scale-105 cursor-pointer @endif transition duration-300  w-44 h-44 shadow-xl rounded-full bg-gray-100">
                            @if (auth()->id() === $user->id)
                                <input id="avatar" name="avatar" type="file" class="hidden">
                            @endif
                        </label>
                        @if($user->avatar !== null)
                            @if (auth()->user()->role === "admin" || auth()->id() === $user->id)
                                <button class="hover:scale-105 transition duration-300 flex gap-2" href="#"
                                        type="button" name="delete">
                                    Удалить аватар
                                    <svg width="20px" height="23px" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                           stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path d="M4 7H20" stroke="#dd0000" stroke-width="2" stroke-linecap="round"
                                                  stroke-linejoin="round"></path>
                                            <path d="M6 7V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V7"
                                                  stroke="#dd0000" stroke-width="2" stroke-linecap="round"
                                                  stroke-linejoin="round"></path>
                                            <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z"
                                                  stroke="#dd0000" stroke-width="2" stroke-linecap="round"
                                                  stroke-linejoin="round"></path>
                                        </g>
                                    </svg>
                                </button>
                            @endif
                        @endif
                    </div>
                    <div class="flex flex-col justify-between">
                        <div class="mb-5">
                            <h3 class="text-4xl font-semibold leading-normal text-blueGray-700 mb-2">
                                {{ $user->name  }}
                            </h3>
                            <a class="text-sm leading-normal text-blueGray-400 font-bold uppercase" href="mailto:{{$user->email}}">
                                Email: {{ $user->email ?? 'Не указан' }}
                            </a>
                            <p>
                                Роль:
                                <span class="font-bold" id="role">
                                {{ getRole($user->role) ?? 'Не указана' }}
                            </span>
                            </p>

                        </div>
                        <div class="flex gap-5 flex-wrap">
                            @if(auth()->user()->role === "admin")
                                <div class="mb-2 text-blueGray-600">
                                    <p>Номер телефона: </p>
                                    <span class="flex gap-3 items-center font-bold justify-between" id="phone-number">
                                @if(empty($user->phone))
                                            <p>{{ $user->phone ?? 'Не указан' }}</p>
                                        @else
                                            <a class="underline" href="tel:{{$user->phone}}">{{ $user->phone ?? 'Не указан' }}</a>
                                        @endif
                                <svg class="cursor-pointer" width="24px" height="24px" viewBox="0 0 24 24" id="phone-display" title="Изменить номер телефона"
                                     fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier"
                                                                                       stroke-width="0"></g><g
                                        id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g
                                        id="SVGRepo_iconCarrier"> <path
                                            d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z"
                                            stroke="#013089" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path> <path
                                            d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13"
                                            stroke="#013089" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path> </g></svg>
                            </span>
                                    <form id="phone-form" style="display: none;" class="inline" method="POST"
                                          action="{{route('updatePhone', ['id' => $user->id])}}">
                                        @csrf
                                        <div class="flex flex-col gap-2 my-2">
                                            <input type="text" name="input-phone" id="input-phone"
                                                   value="{{ $user->phone ?? '' }}"
                                                   class="text-slate-900 px-3 py-0.5 border border-slate-300 rounded-xl">
                                            <button type="submit"
                                                    class="cta-btn-first py-0.5 px-2 text-sm border-first rounded-xl font-bold transition duration-300 ">
                                                Изменить
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="mb-2 text-blueGray-600">
                                    <p>ФИО руководителя: </p>
                                    <span class="flex gap-3 items-center font-bold justify-between" id="director-name">
                                   <p>{{ $user->{'director-name'} ?? 'Не указано' }}</p>
                                <svg class="cursor-pointer" width="24px" height="24px" viewBox="0 0 24 24" id="director-name-display" title="Изменить ФИО руководителя"
                                     fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier"
                                                                                       stroke-width="0"></g><g
                                        id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g
                                        id="SVGRepo_iconCarrier"> <path
                                            d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z"
                                            stroke="#013089" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path> <path
                                            d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13"
                                            stroke="#013089" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path> </g></svg>
                            </span>
                                    <form id="director-name-form" style="display: none;" class="inline" method="POST"
                                          action="{{route('updateDirectorName', ['id' => $user->id])}}">
                                        @csrf
                                        <div class="flex flex-col gap-2 my-2">
                                            <input type="text" name="input-director-name" id="input-director-name"
                                                   value="{{ $user->{'director-name'} ?? '' }}"
                                                   class="text-slate-900 px-3 py-0.5 border border-slate-300 rounded-xl">
                                            <button type="submit"
                                                    class="cta-btn-first py-0.5 px-2 text-sm border-first rounded-xl font-bold transition duration-300 ">
                                                Изменить
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="mb-2 text-blueGray-600">
                                    <p>Отдел сотрудника: </p>
                                    <span class="flex gap-3 items-center font-bold justify-between" id="department">
                                   <p>{{ $user->department ?? 'Не указано' }}</p>
                                <svg class="cursor-pointer" width="24px" height="24px" viewBox="0 0 24 24" id="department-display" title="Изменить отдел"
                                     fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier"
                                                                                       stroke-width="0"></g><g
                                        id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g
                                        id="SVGRepo_iconCarrier"> <path
                                            d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z"
                                            stroke="#013089" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path> <path
                                            d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13"
                                            stroke="#013089" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path> </g></svg>
                            </span>
                                    <form id="department-form" style="display: none;" class="inline" method="POST"
                                          action="{{route('updateDepartment', ['id' => $user->id])}}">
                                        @csrf
                                        <div class="flex flex-col gap-2 my-2">
                                            <input type="text" name="input-department" id="input-department"
                                                   value="{{ $user->department ?? '' }}"
                                                   class="text-slate-900 px-3 py-0.5 border border-slate-300 rounded-xl">
                                            <button type="submit"
                                                    class="cta-btn-first py-0.5 px-2 text-sm border-first rounded-xl font-bold transition duration-300 ">
                                                Изменить
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            @elseif(auth()->id() === $user->id)
                                <div class="mb-2 text-blueGray-600">
                                    <p>Номер телефона: </p>
                                    <span class="flex gap-3 items-center font-bold justify-between" id="phone-number">
                                @if(empty($user->phone))
                                            <p>{{ $user->phone ?? 'Не указан' }}</p>
                                        @else
                                            <a class="underline" href="tel:{{$user->phone}}">{{ $user->phone ?? 'Не указан' }}</a>
                                        @endif
                                <svg class="cursor-pointer" width="24px" height="24px" viewBox="0 0 24 24" id="phone-display" title="Изменить номер телефона"
                                     fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier"
                                                                                       stroke-width="0"></g><g
                                        id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g
                                        id="SVGRepo_iconCarrier"> <path
                                            d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z"
                                            stroke="#013089" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path> <path
                                            d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13"
                                            stroke="#013089" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path> </g></svg>
                            </span>
                                    <form id="phone-form" style="display: none;" class="inline" method="POST"
                                          action="{{route('updatePhone', ['id' => $user->id])}}">
                                        @csrf
                                        <div class="flex flex-col gap-2">
                                            <input type="text" name="input-phone" id="input-phone"
                                                   value="{{ $user->phone ?? '' }}"
                                                   class="text-slate-900 px-3 py-0.5 border border-slate-300 rounded-xl">
                                            <button type="submit"
                                                    class="cta-btn-first py-0.5 px-2 text-sm border-first rounded-xl font-bold transition duration-300 ">
                                                Изменить
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="mb-2 text-blueGray-600">
                                    <p>ФИО руководителя: </p>
                                    <span class="flex gap-3 items-center font-bold justify-between">
                                {{ $user->{'director-name'} ?? 'Не указано' }}
                            </span>
                                </div>
                                <div class="mb-2 text-blueGray-600">
                                    <p>Отдел сотрудника: </p>
                                    <span class="flex gap-3 items-center font-bold justify-between">
                                {{ $user->department ?? 'Не указан' }}
                            </span>
                                </div>
                            @else
                                <div class="mb-2 text-blueGray-600">
                                    <p>Номер телефона: </p>
                                    <span class="flex gap-3 items-center font-bold justify-between" id="phone-number">
                                @if(empty($user->phone))
                                            <p>{{ $user->phone ?? 'Не указан' }}</p>
                                        @else
                                            <a class="underline" href="tel:{{$user->phone}}">{{ $user->phone ?? 'Не указан' }}</a>
                                        @endif
                            </span>
                                </div>
                                <div class="mb-2 text-blueGray-600">
                                    <p>ФИО руководителя: </p>
                                    <span class="flex gap-3 items-center font-bold justify-between" id="director-name">
                                   <p>{{ $user->{'director-name'} ?? 'Не указано' }}</p>
                            </span>

                                </div>
                                <div class="mb-2 text-blueGray-600">
                                    <p>Отдел сотрудника: </p>
                                    <span class="flex gap-3 items-center font-bold justify-between" id="department">
                                   <p>{{ $user->department ?? 'Не указано' }}</p>
                               </span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="flex flex-col justify-between gap-5 gradient rounded-xl p-5 text-gray-100">
                    <h2 class="text-3xl">Статистика<br>сотрудника</h2>
                   <div class="flex flex-col gap-2">
                       <div class="flex flex-col">
                           <p>Отправленных заявок:</p>
                           <span class="text-md font-bold" id="sent-applications">
                                @include('components.admin.profile-preloader')
                           </span>
                       </div>
                       <div class="flex flex-col">
                           <p>Принятых заявок:</p>
                           <span class="text-md font-bold" id="accepted-applications">
                                @include('components.admin.profile-preloader')
                           </span>
                       </div>
                       <div class="flex flex-col">
                           <p>Отклоненных заявок:</p>
                           <span class="text-md font-bold" id="declined-applications">
                                @include('components.admin.profile-preloader')
                           </span>
                       </div>
                   </div>
                </div>
            </div>
        </div>
        @if(auth()->id() === $user->id)
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const avatarInput = document.getElementById('avatar');
                    const avatarPreview = document.getElementById('avatarPreview');
                    const userAvatar = document.getElementById('user-avatar');

                    if (avatarInput && avatarPreview && userAvatar) {
                        avatarInput.addEventListener('change', function () {
                            const file = this.files[0];
                            if (file) {
                                const reader = new FileReader();
                                reader.onload = function (e) {

                                    avatarPreview.src = e.target.result;
                                    userAvatar.src = e.target.result;
                                    const formData = new FormData();
                                    formData.append('avatar', file);

                                    fetch('{{ route('updateAvatar', ['id' => $user->id]) }}', {
                                        method: 'POST',
                                        body: formData,
                                        headers: {
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                        }
                                    })
                                        .then(response => {
                                            if (!response.ok) {
                                                throw new Error('Network response was not ok');
                                            }
                                            return response.json();
                                        })
                                        .then(data => {
                                            console.log('Avatar updated successfully:', data);
                                        })
                                        .catch(error => {
                                            console.error('Error updating avatar:', error);
                                        });
                                };
                                reader.readAsDataURL(file);
                            }
                        });
                    } else {
                        console.error('Element with id "avatar", "avatarPreview" or "user-avatar" not found.');
                    }
                });
            </script>
    @endif
        <script>
            document.addEventListener("DOMContentLoaded", async function() {
                const userId = document.getElementById('user-id').innerText;
                const biggerThanZero = (value) => {
                    return value > 0 ? value + " шт" : value
                }
                await fetch(`/api/get-user-stat/${userId}`)
                    .then(response => response.json())
                    .then(data => {
                        console.log(data)
                        document.getElementById('sent-applications').textContent = biggerThanZero(data.total);
                        document.getElementById('accepted-applications').textContent = biggerThanZero(data.accepted);
                        document.getElementById('declined-applications').textContent = biggerThanZero(data.declined);
                    })
                    .catch(error => console.error('Error fetching application data:', error));
            });
        </script>
    @if (auth()->user()->role === "admin" || auth()->id() === $user->id)
        @include('components.admin.delete-confirmation-light')
        @include('components.scripts.profile-popup-control')
        @include('components.scripts.profile-control')
    @endif
@endsection
