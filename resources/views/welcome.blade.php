<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarsier Eventos</title>
    <!-- Link para o Bootstrap -->
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
                <a href="{{ route('login') }}" class="btn btn-primary btn-sm btn-custom">Entrar com seu perfil</a>
                <div class="dropdown d-inline">
                    <button class="btn btn-outline-primary btn-sm btn-custom dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        Cadastre-se
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('auth.cadastroOrganizador') }}">Organizador</a></li>
                        <li><a class="dropdown-item" href="{{ route('auth.cadastroParticipante') }}">Participante</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h2 class="mt-5">Bem-vindo à página de eventos!</h2>
        <p>Conheça eventos que organizamos.</p>
        <div class="d-flex">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="images/events/show.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Show</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card ms-4" style="width: 18rem;">
                <img class="card-img-top" src="images/events/festas.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Festas</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card ms-4" style="width: 18rem;">
                <img class="card-img-top" src="images/events/taca.webp" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Campeonato Esportes</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card ms-4" style="width: 18rem;">
                <img class="card-img-top" src="images/events/rinhaDeGalo.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Rinha de Galo Robo</h5>
                    <p class="card-text"> Criamos por amor, eles brigam por esporte</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>

    </div>



    <!-- Adicionando o JavaScript do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>