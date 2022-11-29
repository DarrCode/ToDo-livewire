<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    @livewireStyles
</head>
<body>
    <div class="container-todo">
        <div class="container">
            <div class="row my-5 justify-content-center">
                <div class="col-12 col-md-8 mt-5">
                    <div class="card rounded-3 border-0">
                        <div class="card-body px-5" style="padding: 60px 0">
                            @livewire('auth.login-register')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewireScripts
</body>
</html>