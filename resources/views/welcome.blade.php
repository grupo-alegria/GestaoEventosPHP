<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tarsier Eventos</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,100..900;1,100..900&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: 'Montserrat', sans-serif;
            }

            .header {
                background-color: rgb(42, 41, 39);
                color: white;
            }

            .hero {
                background: url('images/banner-main.png') center/cover no-repeat;
                color: black;
                height: 90vh;
                display: flex;
                flex-direction: column;
                justify-content: center;
                text-align: center;
                padding: 20px;
            }

            .section {
                padding: 60px 0;
                text-align: center;
            }

            .eventos img {
                width: 100%;
                border-radius: 10px;
            }

            .footer {
                background: #222;
                color: white;
                padding: 20px 0;
                text-align: center;
            }

            .img-hoverable:hover {
                cursor: pointer;
                transform: scale(1.05);
                transition: transform 0.2s ease-in-out;
            }

            .img-hoverable {
                transition: transform 0.2s ease-in-out;
            }

        </style>
    </head>
    <body>
        <!-- Header -->
        <div class="container-fluid header" style="position: relative; z-index: 1;">
            <div class="row align-items-center container-fluid">
                <div class="col-md-4 d-flex align-items-center">
                    <img src="{{ asset('images/tarsierLogo.png') }}" alt="Logo" class="img-fluid" style="width: 100px; height: auto;">
                    <div class="d-flex ms-4">
                        <h2 class="mb-0"><b>Tarsier</b></h2>
                        <h2 class="mb-0 ms-2"><b>Eventos</b></h2>
                    </div>
                </div>

                <div class="col-md-4 ms-auto text-md-end mt-3">
                    <a href="{{ route('login') }}" class="btn btn-primary btn-sm btn-custom">Entrar com seu perfil</a>
                    <div class="dropdown d-inline">
                        <button class="btn btn-outline-primary btn-sm btn-custom dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            Cadastre-se
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('organizador.auth.cadastroOrganizador') }}">Organizador</a></li>
                            <li><a class="dropdown-item" href="{{ route('participante.auth.cadastroParticipante') }}">Participante</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hero Section -->
        <div class="hero d-flex flex-column align-items-center justify-content-center position-relative">
            <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0, 0, 0, 0.6);"></div>
            <h1 class="position-relative" style="color: white"><b>Bem-vindo ao Tarsier Eventos</b></h1>
            <h6 class="position-relative" style="color: white"><b>Sua plataforma para participar, criar e gerenciar eventos!</b></h6>
        </div>

        <!-- Seção de Shows (Cards) -->
        <div class="section bg-light">
            <h2>Shows ao Vivo</h2>
            <p>Experimente a emoção de grandes apresentações musicais de nomes renomados da música internacional.</p>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 img-hoverable"><img src="images/events/show1.png" alt="Show 1" class="img-fluid" style="height: 450px"></div>
                    <div class="col-md-6 img-hoverable"><img src="images/events/show2.jpg" alt="Show 2" class="img-fluid" style="height: 450px"></div>
                </div>
                <br/>
                <div class="d-flex flex-column align-items-center justify-content-center position-relative">
                    <div class="col-md-12 img-hoverable"><img src="images/events/show3.jpg" alt="Show 3" class="img-fluid" style="height: 600px; width: 80%"></div>
                </div>
            </div>
        </div>

        <!-- Seção de Festas (Texto e Imagem) -->
        <div class="section d-flex flex-column align-items-center">
            <h2>Festas Exclusivas</h2>
            <p class="col-md-6">As festas mais animadas e inesquecíveis esperam por você. Aproveite noites incríveis com música ao vivo, drinks especiais e uma atmosfera única com seus amigos!.</p>
            <img src="images/events/festas.jpg" alt="Festas" class="img-fluid w-50 img-hoverable">
        </div>

        <!-- Seção de Campeonatos (Cards) -->
        <div class="section bg-light">
            <h2>Campeonatos Esportivos</h2>
            <p>Competições emocionantes para os amantes do esporte e da competição.</p>
            <div class="container">
                <div class="row">
                    <div class="col-md-6"><img src="images/events/esporte2.png" alt="Campeonato 2" class="img-fluid img-hoverable" style="height: 325px; width: 90%"></div>
                    <div class="col-md-6"><img src="images/events/esporte4.png" alt="Campeonato 4" class="img-fluid img-hoverable" style="height: 325px; width: 90%"></div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-md-6"><img src="images/events/esporte3.png" alt="Campeonato 3" class="img-fluid img-hoverable" style="height: 325px; width: 90%"></div>
                    <div class="col-md-6"><img src="images/events/esporte1.png" alt="Campeonato 1" class="img-fluid img-hoverable" style="height: 325px; width: 90%"></div>
                </div>
            </div>
        </div>

        <!-- Seção de Rinha de Galo Robô (Texto e Imagem)
        <div class="section d-flex flex-column align-items-center">
            <h2>Rinha de Galo Robô</h2>
            <p class="col-md-6">Uma competição inovadora onde a tecnologia e a estratégia se encontram. Nossos galos robóticos são programados para desafiar uns aos outros em batalhas épicas.</p>
            <img src="images/events/rinhaDeGalo.jpg" alt="Rinha de Galo Robô" class="img-fluid w-50">
        </div> -->

        <!-- Seção de Bônus (Texto e Imagem) -->
        <div class="section">
            <h2>Tudo isso e muito mais</h2>
            <p>Organizamos eventos dos mais diversos tipos, bora pra festa!</p>
            <div class="container">
                <div class="row">
                    <div class="col-md-6"><img src="images/events/alt1.png" alt="Alternativo 1" class="img-fluid img-hoverable" style="height: 400px; width: 90%"></div>
                    <div class="col-md-6"><img src="images/events/alt2.png" alt="Alternativo 2" class="img-fluid img-hoverable" style="height: 400px; width: 90%"></div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-md-6"><img src="images/events/alt3.png" alt="Alternativo 3" class="img-fluid img-hoverable" style="height: 400px; width: 90%"></div>
                    <div class="col-md-6"><img src="images/events/alt4.png" alt="Alternativo 4" class="img-fluid img-hoverable" style="height: 400px; width: 90%"></div>
                </div>
            </div>
        </div>

        <!-- Rodapé -->
        <div class="footer">
            <p>&copy; 2025 Tarsier Eventos. Todos os direitos reservados.</p>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
