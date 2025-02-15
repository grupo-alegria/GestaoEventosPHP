<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Participante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin|Indie+Flower|Inknut+Antiqua|Lora|Ravi+Prakash" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <style>
        body {
            background-color: rgb(255, 255, 255);
        }

        .header {
            background-color: rgb(42, 41, 39);
            color: white;
        }

        .card {
            transform: scale(1);
            transition: transform 0.3s ease-in-out, border-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.05);
            border-color: #007bff;
            box-shadow: 0 8px 16px rgba(0, 123, 255, 0.2);
        }

        .logout-btn {
            color: red;
            transition: background 0.3s, color 0.3s;
        }

        .logout-btn:hover {
            background: red;
            color: white;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background: #DDD;
            font-family: 'Inknut Antiqua', serif;
            font-family: 'Ravi Prakash', cursive;
            font-family: 'Lora', serif;
            font-family: 'Indie Flower', cursive;
            font-family: 'Cabin', sans-serif;
        }

        div.container {
            max-width: 1350px;
            margin: 0 auto;
            overflow: hidden
        }

        .upcomming {
            font-size: 45px;
            text-transform: uppercase;
            border-left: 14px solid rgba(255, 235, 59, 0.78);
            padding-left: 12px;
            margin: 18px 8px;
        }

        .container .item {
            width: 42%;
            float: left;
            padding: 0 20px;
            background: #fff;
            overflow: hidden;
            margin: 10px
        }

        .container .item-right,
        .container .item-left {
            float: left;
            padding: 20px
        }

        .container .item-right {
            padding: 79px 50px;
            margin-right: 20px;
            width: 25%;
            position: relative;
            height: 286px
        }

        .container .item-right .up-border,
        .container .item-right .down-border {
            padding: 14px 15px;
            background-color: #ddd;
            border-radius: 50%;
            position: absolute
        }

        .container .item-right .up-border {
            top: -8px;
            right: -35px;
        }

        .container .item-right .down-border {
            bottom: -13px;
            right: -35px;
        }

        .container .item-right .num {
            font-size: 60px;
            text-align: center;
            color: #111
        }

        .container .item-right .day,
        .container .item-left .event {
            color: #555;
            font-size: 20px;
            margin-bottom: 9px;
        }

        .container .item-right .day {
            text-align: center;
            font-size: 25px;
        }

        .container .item-left {
            width: 71%;
            padding: 34px 0px 19px 46px;
            border-left: 3px dotted #999;
        }

        .container .item-left .title {
            color: #111;
            font-size: 34px;
            margin-bottom: 12px
        }

        .container .item-left .sce {
            margin-top: 5px;
            display: block
        }

        .container .item-left .sce .icon,
        .container .item-left .sce p,
        .container .item-left .loc .icon,
        .container .item-left .loc p {
            float: left;
            word-spacing: 5px;
            letter-spacing: 1px;
            color: #888;
            margin-bottom: 10px;
        }

        .container .item-left .sce .icon,
        .container .item-left .loc .icon {
            margin-right: 10px;
            font-size: 20px;
            color: #666
        }

        .container .item-left .loc {
            display: block
        }

        .fix {
            clear: both
        }

        .container .item .tickets,
        .booked,
        .cancel {
            color: #fff;
            padding: 6px 14px;
            float: right;
            margin-top: 10px;
            font-size: 18px;
            border: none;
            cursor: pointer
        }

        .container .item .tickets {
            background: #777
        }

        .container .item .booked {
            background: #3D71E9
        }

        .container .item .cancel {
            background: #DF5454
        }

        .linethrough {
            text-decoration: line-through
        }

        @media only screen and (max-width: 1150px) {
            .container .item {
                width: 100%;
                margin-right: 20px
            }

            div.container {
                margin: 0 20px auto
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid header" style="position: relative; z-index: 1;">
        <div class="row align-items-center container-fluid">
            <div class="col-md-4 d-flex align-items-center">
                <img src="{{ asset('images/tarsierLogo.png') }}" alt="Logo" class="img-fluid w-25">
                <div class="d-flex ms-4">
                    <h3 class="mb-0">Tarsier</h3>
                    <h3 class="mb-0 ms-2">Eventos</h3>
                </div>
            </div>
            <div class="col-md-4 ms-auto text-md-end mt-3">
                <div class="dropdown">
                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        👤 Bem-vindo, {{ $participante->nome }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a href="{{ route('participante.edit', $participante->id) }}" class="dropdown-item">Editar Perfil</a></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item logout-btn">Sair</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @if(session('success'))
    <div class="alert alert-success" id="alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger" id="alert-error">
        {{ session('error') }}
    </div>
    @endif
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const successAlert = document.getElementById('alert-success');
            const errorAlert = document.getElementById('alert-error');

            if (successAlert) {
                setTimeout(function() {
                    successAlert.style.display = 'none';
                }, 3000);
            }

            if (errorAlert) {
                setTimeout(function() {
                    errorAlert.style.display = 'none';
                }, 3000);
            }
        });
    </script>

    <div class="container">
        <h2 class="mt-5">Seus Ingressos</h2>
        <p>Aqui estão os ingressos que você adquiriu.</p>
        <a href="{{ route('eventos.index', $participante->id) }}" class="btn btn-success mb-3">
            Ver eventos disponíveis
        </a>

        <div class="row">
            <!-- Loop para listar os ingressos do participante -->
            <div class="row d-flex flex-wrap gap-4">
                @foreach($ingressos as $ingresso)
                <div class="container d-flex">
                    <div class="item w-100">
                        <div class="item-right">
                            <h2 class="num">{{ \Carbon\Carbon::parse($ingresso->evento->data)->format('d') }}</h2>
                            <p class="day">{{ \Carbon\Carbon::parse($ingresso->evento->data)->locale('pt_BR')->translatedFormat('F') }}</p>
                            <span class="up-border"></span>
                            <span class="down-border"></span>
                        </div>

                        <div class="item-left">
                            <p class="event">{{ $ingresso->evento->tipo }}</p>
                            <h2 class="title">{{ $ingresso->evento->nome }}</h2>

                            <div class="sce">
                                <div class="icon">
                                    <i class="fa fa-table"></i>
                                </div>
                                <p>{{ \Carbon\Carbon::parse($ingresso->evento->data)->format('d/m/Y H:i') }}</p>
                            </div>
                            <div class="fix"></div>
                            <div class="loc">
                                <div class="icon">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <p>{{ $ingresso->evento->local }}</p>
                            </div>
                            <div class="fix"></div>
                            <button class="booked">Confirmado</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- @foreach($ingressos as $ingresso)
            <div class="col-md-6">
                <div class="card">
                    <Exibindo a imagem do evento relacionado ao ingresso
                    <img class="card-img-top" src="{{ asset('images/events/' . $ingresso->evento->imagem) }}" alt="{{ $ingresso->evento->nome }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $ingresso->evento->nome }}</h5>
                        <p class="card-text">
                            <strong>Data do Evento:</strong> {{ \Carbon\Carbon::parse($ingresso->evento->data)->format('d/m/Y H:i') }}<br>
                            <strong>Local:</strong> {{ $ingresso->evento->local }}<br>
                            <strong>Código do Ingresso:</strong> {{ $ingresso->codigo }}<br>
                            <strong>Status:</strong> {{ $ingresso->status }}
                        </p>
                        <a class="btn btn-primary">Ver detalhes</a>
                    </div>
                </div>
            </div>
            @endforeach -->
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
