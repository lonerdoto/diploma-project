@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="flash">
            {{$error}}
        </div>
        <script>
            setTimeout(() => {
                document.querySelectorAll('.flash').forEach(e => {
                    e.remove();
                })
            }, 3000)
        </script>
    @endforeach
@endif

@if(session('success'))
    <div class="flash">
        {{session('success')}}
    </div>
    <script>
        setTimeout(() => {
            document.querySelector('.flash').remove();

        }, 3000)
    </script>
@endif
