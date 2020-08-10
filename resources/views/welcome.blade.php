<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 0;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .danger{
                background-color: red;
                opacity: .7;
                padding-top: 10px;
                padding-bottom: 10px;
                margin-bottom: 30px;
                color: white;
            }
            .success{
                background-color: #4aff4a;
                opacity: .7;
                padding-top: 10px;
                padding-bottom: 10px;
                margin-bottom: 30px;
                color: black;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>
                @if(Session::has('error'))
                    <div class="danger">
                        {{Session::get('error')}}
                    </div>
                @elseif(Session::has('success'))
                    <div class="success">
                        {{Session::get('success')}}
                    </div>
                    
                @endif
                <form action="{{route('users.import')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="file" name="arquivo_importacao" id="">
                    <input type="submit" value="Importar">
                </form>
                <div class="links">
                    <table>
                    <tr>
                        <th>
                            Name
                        </th>
                        <th>
                            CPF
                        </th>
                        <th>
                            Email
                        </th>
                        <th>Idade</th>
                        <th>Sexo</th>
                        <th>Gestante</th>
                    </tr>
                    
                    @forelse($users as $user)
                    <tr>
                        <td>
                            $user->name
                        </td>
                        <td>
                            $user->cpf
                            
                        </td>
                        <td>
                            $user->email
                        </td>
                        <td>$user->idade</td>
                        <td>$user->sexo</td>
                        <td>$user->gestante</td>
                    </tr>
                    @empty
                    @endforelse
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
