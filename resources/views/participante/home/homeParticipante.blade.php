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
            /* font-family: 'Inknut Antiqua', serif;
            font-family: 'Ravi Prakash', cursive;
            font-family: 'Lora', serif;
            font-family: 'Indie Flower', cursive;
            font-family: 'Cabin', sans-serif; */
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
        .pay,
        .cancel {
            color: #fff;
            padding: 6px 14px;
            float: right;
            margin-top: 10px;
            margin-left: 10px;
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

        .bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom-right-radius: 5px;
            border-bottom-left-radius: 5px;
            padding: 10px 18px;
            height: 50px;

            .barcode {
                background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAF4AAAABCAYAAABXChlMAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAAYdEVYdFNvZnR3YXJlAHBhaW50Lm5ldCA0LjAuOWwzfk4AAACPSURBVChTXVAJDsMgDOsrVpELiqb+/4c0DgStQ7JMYogNh2gdvg5VfXFCRIZaC6BOtnoNFpvaumNmwb/71Frrm8XvgYkker1/g9WzMOsohaOGNziRs5inDsAn8yEPengTapJ5bmdZ2Yv7VvfPN6AH2NJx7nOWPTf1/78hoqgxhzw3ZqYG1Dr/9ur3y8vMxgNZhcAUnR4xKgAAAABJRU5ErkJggg==);
                background-repeat: repeat-y;
                min-width: 90px;
                height: 30px;
            }
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
            <div class="row align-items-center container-fluid">
                <div class="col-md-4 d-flex align-items-center">
                    <img src="{{ asset('images/tarsierLogo.png') }}" alt="Logo" class="img-fluid" style="width: 100px; height: auto;">
                    <div class="d-flex ms-4">
                        <h2 class="mb-0"><b>Tarsier</b></h2>
                        <h2 class="mb-0 ms-2"><b>Eventos</b></h2>
                    </div>
                </div>

                <div class="col-md-4 ms-auto text-md-end mt-3">
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            👤 Bem-vindo, {{ $participante->nome }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a href="{{ route('participante.edit', $participante->id) }}" class="dropdown-item">
                                    Editar Perfil
                                </a></li>
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
        <div class="d-flex justify-content-between align-items-center mt-5">
            <h2 class="mb-0">Seus Ingressos</h2>
            <a href="{{ route('eventos.show', $participante->id) }}" class="btn btn-success mb-3">
                Descobrir mais eventos
            </a>
        </div>

        <div class="row g-4 mt-4">
            @foreach($ingressos as $ingresso)
            <div class="col-md-6">
                <div class="ticket-container d-flex">
                    <div class="item w-100">
                        <div class="item-right">
                            <h2 class="num">{{ \Carbon\Carbon::parse($ingresso->evento->data)->format('d') }}</h2>
                            <p class="day">{{ \Carbon\Carbon::parse($ingresso->evento->data)->locale('pt_BR')->translatedFormat('M') }}</p>
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
                            @if($ingresso->status == 'Não pago')
                            <button class="pay btn-warning" data-bs-toggle="modal" data-bs-target="#qrcodeModal-{{ $ingresso->id }}">
                                A Pagar
                            </button>
                            @else
                            <button class="booked btn-success">Pago</button>
                            @endif

                            <button type="button" class="cancel btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#cancelModal-{{ $ingresso->id }}">
                                Cancelar
                            </button>

                            <!-- Modal de Confirmação -->
                            <div class="modal fade" id="cancelModal-{{ $ingresso->id }}" tabindex="-1" aria-labelledby="cancelModalLabel-{{ $ingresso->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="cancelModalLabel-{{ $ingresso->id }}">Confirmar Cancelamento</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                                        </div>
                                        <div class="modal-body">
                                            Tem certeza de que deseja cancelar este ingresso para <strong>{{ $ingresso->evento->nome }}</strong>?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                                            <form action="{{ route('participante.cancelarIngresso', ['id' => $ingresso->id, 'participanteId' => $ingresso->participante_id]) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-danger">Sim, Cancelar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- MODAL QR CODE -->
                            <div class="modal fade" id="qrcodeModal-{{ $ingresso->id }}" tabindex="-1" aria-labelledby="qrcodeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="qrcodeModalLabel">Pagamento do Ingresso</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <p>Escaneie o QR Code para realizar o pagamento:</p>
                                            <!-- QR Code falso -->
                                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=https://www.youtube.com/watch?v=hNeKo_hlB5w" alt="QR Code" class="img-fluid">
                                        </div>
                                        <div class="modal-footer">
                                            <!-- Formulário para marcar como pago -->
                                            <form action="{{ route('participante.pagarIngresso', $ingresso->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-success">Ingresso Pago</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- Fim item-left -->
                    </div> <!-- Fim item -->
                </div> <!-- Fim ticket-container -->
            </div> <!-- Fim col-md-6 -->
            @endforeach
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
