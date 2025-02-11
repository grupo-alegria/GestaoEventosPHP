<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Participante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: rgb(255, 255, 255);
        }

        .header {
            background-color: rgb(238, 186, 130);
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
                        <li><a class="dropdown-item">Editar Perfil</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h2 class="mt-5">Seus Ingressos</h2>
        <p>Aqui estão os ingressos que você comprou.</p>

        <div class="row">
            <!-- Loop para listar os ingressos do participante -->
            @foreach($ingressos as $ingresso)
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('images/events/' . $ingresso->evento->imagem) }}" alt="{{ $ingresso->evento->nome }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $ingresso->evento->nome }}</h5>
                        <p class="card-text">Data: {{ $ingresso->evento->data }}</p>
                        <p class="card-text">Local: {{ $ingresso->evento->local }}</p>
                        <a href="{{ route('evento.show', $ingresso->evento->id) }}" class="btn btn-primary">Ver detalhes</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('eventos.disponiveis') }}" class="btn btn-success">Ver eventos disponíveis</a>
        </div>
    </div>
</body>
</html>
