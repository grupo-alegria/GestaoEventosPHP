<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Participante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .header {
            background-color: rgb(42, 41, 39);
            color: white;
        }

        .card-img-top {
            width: 100%;
            height: 170px;
            /* Ajuste conforme necessário */
            object-fit: cover;
            /* Evita distorção */
        }

        .logout-btn {
            color: red;
            transition: background 0.3s, color 0.3s;
        }

        .logout-btn:hover {
            background: red;
            color: white;
        }

        .ticket-container {
            display: flex;
            justify-content: center;
        }

        body {
            background-color: rgb(243, 239, 239);
            min-height: calc(100vh - 40px);
            font-family: 'Lato', sans-serif;

            widget {
                filter: drop-shadow(1px 1px 3px rgba(0, 0, 0, 0.3));

                &[type="ticket"] {
                    width: 255px;

                    .top,
                    .bottom {
                        >div {
                            padding: 0 18px;

                            &:first-child {
                                padding-top: 15px;
                            }

                            &:last-child {
                                padding-bottom: 18px;
                            }
                        }

                        img {
                            padding: 18px 0;
                        }
                    }

                    .top,
                    .bottom,
                    .rip {
                        background-color: #fff;
                    }

                    .top {
                        border-top-right-radius: 5px;
                        border-top-left-radius: 5px;

                        .deetz {
                            padding-bottom: 10px !important;
                        }
                    }

                    .bottom {
                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                        border-bottom-right-radius: 5px;
                        border-bottom-left-radius: 5px;
                        padding: 10px 18px;
                        height: 40px;

                        .barcode {
                            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAF4AAAABCAYAAABXChlMAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAAYdEVYdFNvZnR3YXJlAHBhaW50Lm5ldCA0LjAuOWwzfk4AAACPSURBVChTXVAJDsMgDOsrVpELiqb+/4c0DgStQ7JMYogNh2gdvg5VfXFCRIZaC6BOtnoNFpvaumNmwb/71Frrm8XvgYkker1/g9WzMOsohaOGNziRs5inDsAn8yEPengTapJ5bmdZ2Yv7VvfPN6AH2NJx7nOWPTf1/78hoqgxhzw3ZqYG1Dr/9ur3y8vMxgNZhcAUnR4xKgAAAABJRU5ErkJggg==);
                            background-repeat: repeat-y;
                            min-width: 58px;
                            height: 30px;
                        }

                        .buy {
                            display: block;
                            font-size: 12px;
                            font-weight: bold;
                            background-color: #5D9CEC;
                            padding: 0 18px;
                            line-height: 30px;
                            border-radius: 15px;
                            color: #fff;
                            text-decoration: none;
                            white-space: nowrap;
                        }
                    }

                    .rip {
                        height: 20px;
                        margin: 0 10px;
                        background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAYAAAACCAYAAAB7Xa1eAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAAYdEVYdFNvZnR3YXJlAHBhaW50Lm5ldCA0LjAuOWwzfk4AAAAaSURBVBhXY5g7f97/2XPn/AcCBmSMQ+I/AwB2eyNBlrqzUQAAAABJRU5ErkJggg==);
                        background-size: 4px 2px;
                        background-repeat: repeat-x;
                        background-position: center;
                        position: relative;
                        box-shadow: 0 1px 0 0 #fff, 0 -1px 0 0 #fff;

                        &:before,
                        &:after {
                            content: '';
                            position: absolute;
                            width: 30px;
                            height: 30px;
                            top: 50%;
                            transform: translate(-50%, -50%) rotate(45deg);
                            border: 5px solid transparent;
                            border-top-color: #fff;
                            border-right-color: #fff;
                            border-radius: 100%;
                            pointer-events: none;
                        }

                        &:before {
                            left: -10px;
                        }

                        &:after {
                            transform: translate(-50%, -50%) rotate(225deg);
                            right: -40px;
                        }
                    }
                }

                .-bold {
                    font-weight: bold;
                }
            }
        }
    </style>
</head>

<body class="">
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
                        👤 Bem-vindo, {{ $organizador->nome }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a href="{{ route('organizador.edit', $organizador->id) }}" class="dropdown-item">Editar Perfil</a></li>
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
        <h2 class="mt-5">Seus Eventos</h2>
        <div class="d-flex align-items-center">
            <p class="mb-0">Aqui estão os seus eventos.</p>
            <a href="{{ route('evento.create') }}" class="btn btn-primary ms-3" href="#">Criar evento</a>
        </div>
        <div class="container-fluid d-flex justify-content-start align-items-center vh-100 p-4">
            @foreach($eventos as $evento)
            <div class="ticket-container row ms-3">
                <widget type="ticket" class="--flex-column">
                    <div class="top --flex-column">
                        <div class="bandname -bold">{{ $evento->nome }}</div>
                        <div class="tourname">{{ $evento->tipo }}</div>
                        @php
                        // Definir a imagem com base no tipo do evento
                        $imagemEvento = match($evento->tipo) {
                        'Show' => 'show1.png',
                        'Festas' => 'festas.jpg',
                        'Campeonatos esportivos' => 'esporte2.png',
                        default => 'alt3.png',
                        };
                        @endphp
                        <img class="card-img-top" src="{{ asset('images/events/' . $imagemEvento) }}" alt="{{ $evento->nome }}">
                        <div class="deetz --flex-row-j!sb">
                            <div class="event --flex-column">
                                <div class="date">{{ $evento->data }}</div>
                                <div class="location -bold">{{ $evento->local }}</div>
                            </div>
                            <div class="price --flex-column">
                                <div class="label">Price</div>
                                <div class="cost -bold">{{ $evento->valor }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="rip"></div>
                    <div class="bottom --flex-row-j!sb">
                        <div class="barcode"></div>
                        <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#eventoModal-{{ $evento->id }}">
                            Informações
                        </a>
                    </div>
                </widget>
            </div>

            <!-- Modal para cada evento -->
            <div class="modal fade" id="eventoModal-{{ $evento->id }}" tabindex="-1" aria-labelledby="modalLabel-{{ $evento->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel-{{ $evento->id }}">{{ $evento->nome }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('eventos.update', $evento->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label class="form-label">Nome do Evento</label>
                                    <input type="text" class="form-control" name="nome" value="{{ $evento->nome }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Descrição</label>
                                    <textarea class="form-control" name="descricao">{{ $evento->descricao }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Valor Ingresso</label>
                                    <input type="number" class="form-control" name="valor" value="{{ $evento->valor }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Data</label>
                                    <input type="date" class="form-control" name="data" value="{{ $evento->data }}">
                                </div>
                                <div class="d-flex justify-content-between">
                                    <form action="{{ route('eventos.update', $evento->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success">Salvar Alterações</button>
                                    </form>

                                    <form action="{{ route('eventos.destroy', $evento->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Excluir Evento</button>
                                    </form>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>