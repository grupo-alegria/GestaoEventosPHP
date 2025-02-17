<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Atkinson+Hyperlegible+Mono:ital,wght@0,200..800;1,200..800&family=Caveat:wght@400..700&family=Grechen+Fuemen&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
    <style>
        .login-container {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            height: 100vh;
            padding-right: 90px;
        }

        .custom-card {
            border: 2px solid #464322;
            border-radius: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .card {
            background-color: rgb(30, 29, 29);
        }

        .btn {
            background-color: #464322;
        }

        .text {
            color: rgb(255, 255, 255);
        }
    </style>
</head>

<body>
    <div class="login-container bg-black">
        <div class="container ms-5">
            <div class="col-md-4 d-flex align-items-center ms-5">
                <h3 class="text-white" style="font-family: 'Poppins', sans-serif;">Bem-Vindo Novamente!</h3>
            </div>
            <div class="row justify-content-end">
                <div class="col-md-6">
                    <div class="card text-white custom-card">
                        <div class="card-header text-center">
                            <h3 class="text">LOGIN</h3>
                        </div>
                        <div class="card-body">
                            <!-- Exibe mensagens de erro ou sucesso -->
                            @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                            @endif

                            <form action="{{ route('login.submit') }}" method="POST">
                                @csrf

                                <!-- Campo de Email -->
                                <div class="mb-3">
                                    <label for="email" class="form-label text-white">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>

                                <!-- Campo de Senha -->
                                <div class="mb-3">
                                    <label for="senha" class="form-label text-white">Senha</label>
                                    <input type="password" class="form-control" id="senha" name="senha" required>
                                </div>

                                <!-- Botão de Seleção (Organizador ou Participante) -->
                                <div class="mb-3">
                                    <label class="form-label text-white">Tipo de Usuário</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="tipo" id="organizador" value="organizador" required>
                                            <label class="form-check-label text-white" for="organizador">Organizador</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="tipo" id="participante" value="participante" required>
                                            <label class="form-check-label text-white" for="participante">Participante</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Botão de Envio -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-warning text-white">Entrar</button>
                                </div>
                            </form>

                            <!-- Link para Cadastro -->
                            <div class="mt-3 text-center">
                                <a href="{{ route('home') }}" class="text"> Voltar </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 d-flex justify-content-start" style="position: absolute; bottom: 100px; left: -20px;">
                    <img src="{{ asset('images/tarsierLogin2.png') }}" alt="Logo" class="img-fluid" style="width: 600px; height: auto;">
                </div>
            </div>
        </div>
    </div>
</body>


</html>