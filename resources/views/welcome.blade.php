@extends('layouts.layout', ['title' => 'О сервисе'])
@section('content')
    <div class="py-5 px-10 flex flex-col gap-52 my-10 overflow-hidden">
        <div class="flex even:flex-row-reverse justify-between gap-10 first-color">
            <div class="max-w-xl flex flex-col gap-8 items-start animate-left">
                <h1 class="text-4xl">Что это за сервис?</h1>
                <p class="text-right-">Данный сервис предоставляет возможность сотрудникам &laquo;ФармФирма&nbsp;&laquo;Сотекс&raquo;
                    отправлять заявку, нацеленную на&nbsp;улучшение рабочей деятельности, в&nbsp;соответствии с&nbsp;типом
                    заявки</p>
                <div class="flex-grow"></div>
                <a href="{{route('showCreateApplication')}}"
                   class="cta-btn-first  transition duration-300 py-4 px-12 border-first rounded-2xl font-bold">Оставить
                    заявку</a>
            </div>
            <div class="animate-right">
                <img class="hover:scale-105 transition duration-300 " src="{{asset('images/request-illust.png')}}"
                     alt="illustration">
            </div>
        </div>
        <div class="even:flex-row-reverse justify-between  flex gap-10 first-color">
            <div class="max-w-xl flex flex-col gap-8 items-start animate-right">
                <p class="text-right">Хотите предложить улучшение для какого-либо процесса или деятельности?</p>
                <div class="flex-grow"></div>
                <a href="{{route('showCreateApplication')}}"
                   class="cta-btn-second transition duration-300  self-end py-4 px-12 bg-first rounded-2xl font-bold text-white">
                    Предложить улучшение
                </a>
            </div>
            <div class="animate-left">
                <img class="hover:scale-105 transition duration-300 " src="{{asset('images/idea-illust.png')}}"
                     loading="lazy" alt="illustration">
            </div>
        </div>
        <div class="even:flex-row-reverse flex justify-between gap-10 first-color">
            <div class="max-w-xl flex flex-col gap-8 items-start animate-left">
                <p class="text-left">Имеется возможность оставить отзыв о внутренней деятельности компании</p>
                <div class="flex-grow"></div>
                <a href="{{route('showCreateApplication')}}"
                   class="cta-btn-second transition duration-300  self-start py-4 px-12 bg-first rounded-2xl font-bold text-white">Оставить
                    отзыв</a>
            </div>
            <div class="animate-right">
                <img class="hover:scale-105 transition duration-300 " src="{{asset('images/feedback-illust.png')}}"
                     loading="lazy" alt="illustration">
            </div>
        </div>
        <div class="even:flex-row-reverse justify-between  flex gap-10 first-color">
            <div class="max-w-xl flex flex-col gap-8 items-start animate-right">
                <p class="text-right">Или Вас что-то не устраивает? Отправьте претензию! Мы всегда заботимся о Вашем
                    комфорте</p>
                <div class="flex-grow"></div>
                <a href="{{route('showCreateApplication')}}"
                   class="cta-btn-second transition duration-300  self-end py-4 px-12 bg-first rounded-2xl font-bold text-white">Оставить
                    претензию</a>
            </div>
            <div class="animate-left">
                <img class="hover:scale-105 transition duration-300 " src="{{asset('images/report-illust.png')}}"
                     loading="lazy" alt="illustration">
            </div>
        </div>
    </div>
    <div class="flex flex-col m-auto text-center items-center gap-5 my-10 first-color">
        <p>
            Зарегистрируйтесь и отправьте заявку сейчас<br>
            Мы обязательно свяжемся с Вами
        </p>
        <a href="{{route('showCreateApplication')}}"
           class="cta-btn-first  transition duration-300 first-color py-4 px-12 border-first rounded-2xl font-bold border-sky-500">Оставить
            заявку</a>
    </div>
    @include('components.scripts.scroll-animate')
@endsection
