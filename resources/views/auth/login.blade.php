@extends('layouts.layout', ['title' => 'Вход'])
@section('content')
    <div class="py-5 px-10 gradient">
       <div class="my-5 flex justify-around items-center">
           <svg class="text-gray-100" width="400" height="400" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M200 400c110.457 0 200-89.543 200-200S310.457 0 200 0 0 89.543 0 200s89.543 200 200 200ZM166.56 82.969c9.056-4.59 18.512-7.148 28.775-7.786 2.442-.152 5.16-.224 6.039-.16.879.064 3.277.214 5.329.332 8.249.477 18.8 3.449 26.973 7.597l4.466 2.267-18.889.095c-10.39.052-27.495.052-38.012 0l-19.122-.095 4.441-2.25ZM144.512 99.17c1.087-1.176 3.381-3.356 5.097-4.845l3.12-2.707h94.79l2.239 1.92 2.239 1.92-11.028.096-11.028.097-2.284 2.372-2.283 2.371h-25.153l-2.354 1.728a84.425 84.425 0 0 0-4.564 3.657l-2.21 1.928h-26.654c-14.66 0-26.654-.1-26.654-.222 0-.342 4.509-5.914 6.727-8.315Zm-17.552 29.763c-.38-.633 2.816-8.196 5.762-13.638l1.931-3.565 65.244.005c35.884.003 65.42.127 65.636.274.216.148 1.07 1.544 1.897 3.103l1.505 2.834h-38.984l-2.286 2.374-2.286 2.374-22.886.094-22.887.094-1.338 2.743c-.736 1.508-1.522 2.95-1.746 3.204-.32.363-5.613.458-24.885.447-14.132-.008-24.563-.153-24.677-.343Zm-3.923 16.803c.225-2.594 1.494-9.528 1.988-10.865l.308-.836h149.823l.588 2.752c.323 1.515.587 2.913.587 3.109 0 .226-8.419.355-23.19.355h-23.19l-2.289 2.377-2.288 2.377h-26.541c-24.972 0-26.552.037-26.722.639-.099.353-.288 1.587-.42 2.743l-.239 2.102H122.477l.177-1.188c.097-.653.269-2.258.383-3.565Zm1.091 25.139c-.811-3.92-1.619-10.643-1.619-13.484v-1.537l36.827.243c20.255.134 55.185.243 77.622.243h40.794l-.003 1.188c-.001.654-.104 2.053-.227 3.108l-.224 1.92H229.951l-2.289 2.377-2.288 2.377h-52.866l.223 1.371c.123.754.322 1.741.442 2.194l.219.823h-49.093l-.171-.823Zm6.341 19.106c-1.775-3.645-4.316-10.045-4.631-11.666l-.22-1.132h24.71c24.398 0 24.713.009 24.935.731.225.726.538.731 49.581.731 27.146 0 49.346.123 49.333.274-.012.151-.452 1.509-.977 3.017l-.954 2.743-21.15.094-21.15.094-2.286 2.374-2.286 2.374h-22.125c-12.168 0-22.124.126-22.124.281 0 .154.4.886.888 1.626.489.74.888 1.437.888 1.55 0 .112-11.456.162-25.459.111l-25.459-.094-1.514-3.108Zm171.047 20.659 2.265-12.334c.619-3.365 1.224-5.998 1.347-5.851.121.147 1.137 5.534 2.257 11.969 1.119 6.436 2.158 11.942 2.307 12.236.182.36 2.718 1.035 7.697 2.052l7.426 1.515-1.95.594c-1.073.326-4.428 1.4-7.457 2.388l-5.506 1.795-2.307 16.495c-1.27 9.072-2.39 16.494-2.49 16.494-.1 0-1.174-7.425-2.386-16.501-1.211-9.076-2.258-16.558-2.325-16.627-.107-.111-4.401-.608-17.136-1.986-1.953-.212-4.831-.54-6.394-.729-1.563-.19-6.102-.673-10.088-1.075-3.985-.401-7.304-.79-7.376-.864-.071-.074 1.591-.239 3.694-.368 2.103-.129 9.338-.648 16.079-1.153 6.741-.506 13.535-1.01 15.098-1.119 3.818-.268 5.938-.482 6.029-.609.041-.058.589-2.903 1.216-6.322Zm-155.414 1.482c-2.781-2.595-6.577-7.103-9.176-10.897l-1.69-2.469H187.387l1.021 1.097 1.021 1.097h36.879c20.283 0 36.879.126 36.879.28 0 .154-.98 1.552-2.179 3.108l-2.179 2.829h-28.878l-2.298 2.386-2.298 2.386-10.836-.03c-5.96-.016-10.815.102-10.79.264.025.161.904.74 1.954 1.284l1.908.992-29.486.011-29.485.012-2.518-2.35Zm78.435 18.44c-22.403 7.56-46.692 4.385-66.503-8.692l-2.309-1.524 44.369-.008 44.37-.008-2.45 1.676c-3.786 2.59-12.637 6.922-17.477 8.556ZM79.033 288.104c3.218-4.688 8.416-8.226 13.813-9.399 5.952-1.294 12.456-.123 17.503 3.152l1.851 1.202-3.232 6.024c-1.778 3.313-3.297 6.095-3.375 6.181-.079.086-.581-.276-1.116-.803-2.552-2.516-7.154-3.325-10.42-1.831-3.809 1.742-5.803 4.878-5.759 9.059.033 3.048.728 4.937 2.537 6.887 2.14 2.307 3.705 2.973 6.985 2.973 3.402 0 4.928-.691 7.253-3.287 1.178-1.316 1.611-1.601 1.852-1.22.173.274 1.457 2.555 2.853 5.069 1.396 2.513 2.834 5.008 3.196 5.543.361.535.573 1.193.471 1.462-.233.617-3.73 2.954-5.89 3.937-11.234 5.112-25.63-.247-30.466-11.34-3.374-7.74-2.614-16.967 1.944-23.609Zm49.16-7.378c1.661-.828 4.139-1.755 5.507-2.059 1.657-.369 3.634-.5 5.928-.392 10.34.485 18.907 7.506 21.414 17.549.719 2.88.704 8.807-.03 11.875-.791 3.312-3.022 7.605-5.221 10.049-2.436 2.708-6.847 5.379-10.62 6.43-8.844 2.463-19.321-.954-24.596-8.023-3.23-4.328-4.569-8.537-4.601-14.459-.039-7.04 1.758-11.703 6.358-16.5 2.276-2.375 3.442-3.264 5.861-4.47Zm158.979 14.732c2.097-8.492 8.678-14.865 17.353-16.808 4.826-1.08 10.171-.359 14.969 2.02 2.049 1.016 3.179 1.431 3.482 2.181.385.95-.555 2.435-2.629 6.351-1.773 3.349-3.341 6.088-3.486 6.088-.145 0-.631-.403-1.081-.896-1.398-1.531-3.804-2.464-6.391-2.477-5.66-.028-9.616 3.988-9.608 9.753.007 5.732 4.137 10.075 9.58 10.075 2.95 0 6.196-1.695 7.646-3.992.391-.619.843-1.08 1.005-1.025.316.107 6.988 11.855 6.988 12.304 0 .501-3.198 2.634-5.777 3.853-3.256 1.539-6.033 2.126-9.854 2.085-4.736-.051-10.634-1.974-13.855-4.517-4.013-3.168-7.064-7.73-8.184-12.236-.864-3.477-.94-9.595-.158-12.759Zm-122.388-2.481c0-.167.669-3.169 1.487-6.674l1.488-6.37h16.808c9.244 0 16.807.081 16.807.181 0 .184-2.2 9.107-2.863 11.611l-.363 1.371h-4.219c-2.321 0-4.473.1-4.782.222-.5.198-.562 1.91-.562 15.541v15.318H175.086v-31.046l-5.151.074c-2.834.041-5.152-.062-5.151-.228Zm40.853.088c0-.364 2.689-11.622 3.028-12.675.115-.357 3.654-.457 16.104-.457h15.956l-1.646 6.756-1.647 6.757-7.814.099-7.815.1.038 1.645.037 1.646 7.368.099c5.647.076 7.33.203 7.207.548-.089.248-.697 2.708-1.352 5.469l-1.191 5.02-6.032.099-6.031.1.024 1.28c.013.704.043 1.486.065 1.737.033.351 1.864.457 7.858.457 4.298 0 7.815.101 7.815.224s-.549 2.221-1.221 4.662a439.19 439.19 0 0 0-1.612 5.992l-.391 1.554H208.834v-30.715h-1.598c-.914 0-1.599-.17-1.599-.397Zm40.143.175c0-.173 2.147-9.088 2.874-11.936l.351-1.371h13.116l.023 7.953.023 7.953 1.204-2.661c.662-1.463 2.196-5.042 3.409-7.953l2.205-5.292h7.424c4.084 0 7.355.123 7.27.274-.92 1.636-10.9 20.584-10.9 20.694 0 .161 2.348 4.355 8.446 15.087 2.183 3.842 4.071 7.257 4.194 7.587.204.548-.494.602-7.759.602h-7.984l-3.751-7.77-3.752-7.77-.026 7.77-.026 7.77h-13.158l.024-15.266.024-15.266-1.615-.112c-.889-.061-1.616-.193-1.616-.293Zm-97.466 9.311c.466-3.628-1.678-7.648-5.073-9.511a9.535 9.535 0 0 0-6.416-1.012c-1.767.347-2.659.798-4.473 2.261-3.152 2.544-4.196 7.949-2.282 11.821 2.429 4.915 7.966 7.013 12.511 4.739 2.145-1.074 3.277-2.103 4.437-4.034.931-1.551.96-1.647 1.296-4.264Z" fill="currentColor"/></svg>
           <form class="form-control px-10 py-12 bg-gray-100 rounded-3xl shadow-2xl flex flex-col justify-between gap-5" action="">
               <h1 class="form-header text-3xl first-color">Вход</h1>
               <div class="gap-3 form-group relative">
                   <input name="email" class="pl-12 p-2 w-full rounded-xl border border-slate-200 bg-gray-100" type="text" placeholder="Введите логин" oninput="deleteInvalidOnInput(this)">
                   <svg class="second-color absolute top-3 left-3" width="23" height="20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M21.083 10c0 3.143 0 4.714-1.122 5.69-1.123.977-2.93.977-6.544.977H9.583c-3.614 0-5.42 0-6.544-.977-1.122-.976-1.122-2.547-1.122-5.69 0-3.143 0-4.714 1.122-5.69 1.123-.977 2.93-.977 6.544-.977h3.834c3.614 0 5.42 0 6.544.977.626.544.902 1.273 1.025 2.357" stroke="#36639C" stroke-width="2" stroke-linecap="round"/><path d="M8.625 10c0 .46-.43.833-.958.833-.53 0-.959-.373-.959-.833 0-.46.43-.833.959-.833.529 0 .958.373.958.833ZM12.458 10c0 .46-.429.833-.958.833-.53 0-.958-.373-.958-.833 0-.46.429-.833.958-.833.53 0 .958.373.958.833ZM16.292 10c0 .46-.43.833-.959.833-.529 0-.958-.373-.958-.833 0-.46.429-.833.958-.833.53 0 .959.373.959.833Z" fill="currentColor"/></svg>
               </div>
               <div class="gap-3 form-group relative">
                   <input name="password" class="pl-12 p-2 w-full rounded-xl border border-slate-200 bg-gray-100" type="password" placeholder="Введите пароль" oninput="deleteInvalidOnInput(this)">
                   <svg class="second-color absolute top-3 left-3" width="23" height="21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.5 8.833v3.334m-1.66-2.5 3.32 1.666m0-1.666-3.32 1.666M6.452 8.833v3.334m-1.66-2.5 3.32 1.666m0-1.666-3.32 1.666M16.549 8.833v3.334m-1.66-2.5 3.319 1.666m0-1.666-3.32 1.666" stroke="#36639C" stroke-linecap="round"/><path d="M21.083 10.5c0 3.143 0 4.714-1.122 5.69-1.123.977-2.93.977-6.544.977H9.583c-3.614 0-5.42 0-6.544-.977-1.122-.976-1.122-2.547-1.122-5.69 0-3.143 0-4.714 1.122-5.69 1.123-.977 2.93-.977 6.544-.977h3.834c3.614 0 5.42 0 6.544.977.626.544.902 1.273 1.025 2.357" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
               </div>
               <a class="second-color text-xl" href="{{route('register')}}">Регистрация</a>
               <button class="bg-first items-center flex flex-col rounded-xl p-1">
                   <svg class="text-white" width="30" height="30" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M21.25 9.063a.937.937 0 0 0-.938.937v10a.938.938 0 0 0 1.875 0V10a.937.937 0 0 0-.937-.938ZM7.813 15c0 .518.42.938.937.938h6.487l-2.15 2.15a.937.937 0 0 0 1.326 1.325l3.75-3.75a.938.938 0 0 0 0-1.326l-3.75-3.75a.937.937 0 0 0-1.326 1.326l2.15 2.15H8.75a.937.937 0 0 0-.938.937Z" fill="currentColor"/><path fill-rule="evenodd" clip-rule="evenodd" d="M15.51 2c2.885 0 5.146 0 6.91.237 1.806.243 3.231.75 4.35 1.868 1.118 1.119 1.625 2.544 1.868 4.35.237 1.764.237 4.025.237 6.91v.144c0 2.886 0 5.147-.237 6.911-.243 1.806-.75 3.231-1.868 4.35-1.119 1.118-2.544 1.625-4.35 1.868-1.764.237-4.025.237-6.91.237h-.144c-2.886 0-5.147 0-6.911-.237-1.806-.243-3.231-.75-4.35-1.868-1.118-1.119-1.625-2.544-1.868-4.35C2 20.656 2 18.395 2 15.51v-.144c0-2.886 0-5.147.237-6.911.243-1.806.75-3.231 1.868-4.35C5.224 2.987 6.65 2.48 8.455 2.237 10.219 2 12.48 2 15.365 2h.144Zm9.934 3.431c-.712-.712-1.675-1.12-3.273-1.336-1.625-.218-3.76-.22-6.733-.22s-5.109.002-6.734.22c-1.598.215-2.56.624-3.273 1.336-.712.712-1.12 1.675-1.335 3.273-.219 1.625-.221 3.76-.221 6.733s.002 5.109.22 6.734c.215 1.598.624 2.56 1.336 3.273.712.712 1.675 1.12 3.273 1.335 1.625.219 3.76.221 6.733.221s5.109-.002 6.734-.22c1.598-.215 2.56-.624 3.273-1.336.712-.712 1.12-1.675 1.335-3.273.219-1.625.221-3.76.221-6.733s-.002-5.109-.22-6.734c-.215-1.598-.624-2.56-1.336-3.273Z" fill="currentColor"/></svg>
               </button>
           </form>
       </div>
    </div>
    @include('components.ajax.auth-ajax')
    @include('components.scripts.deleteOnInput')
@endsection