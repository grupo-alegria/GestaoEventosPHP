<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login do Organizador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom, rgb(139, 100, 21), rgb(53, 47, 41));
            /* Gradiente de roxo para azul */
            height: 100vh;
            /* Garantir que o fundo cubra toda a altura da tela */
            margin: 0;
        }

        .card {
            background-color: rgb(85, 84, 82);
            color: white;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 30px;
        }

        .btn-custom {
            background-color: rgb(155, 116, 38);
            color: white;

        }

        .btn-custom:hover {
            background-color: #f8f9fa;
            border-color: #f8f9fa;
            color: black;
        }
    </style>
</head>

<body>
    <div class="position-relative">
        @if ($errors->any())
        <div class="alert alert-danger position-absolute top-0 start-50 translate-middle-x w-75 text-center shadow" style="z-index: 1050; font-size: 0.875rem;">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    <div class="container d-flex justify-content-center align-items-center vh-100">

        <div class="card shadow p-0 d-flex flex-row" style="width: 90%; max-width: 1200px; height: 500px;">
            <!-- Coluna da imagem com uma div auxiliar -->
            <div class="w-50" style="position: relative; height: 100%; overflow: hidden;">
                <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0;">
                    <img src="/images/banner-main.png" alt="Imagem de fundo" class="img-fluid" style="object-fit: cover; width: 100%; height: 100%; border-radius: 30px 0px 0px 30px">
                </div>
            </div>

            <!-- Coluna do formulário -->
            <div class="w-50 p-3">
                <h2 class="mb-2 mt-2 text-center mb-3 text-white">Cadastro do Organizador</h2>
                <form action="{{ route('organizador.store') }}" method="POST">
                    @csrf
                    <div class="col-md-10 mx-auto mb-2">
                        <label class="form-label text-white" style="font-size: 0.875rem;">Nome</label>
                        <input type="text" name="nome" class="form-control form-control-sm" required minlength="3">
                    </div>
                    <div class="col-md-10 mx-auto mb-2">
                        <label class="form-label text-white" style="font-size: 0.875rem;">CNPJ (Opcional)</label>
                        <input type="text" name="cnpj" class="form-control form-control-sm" pattern="\d{2}\.\d{3}\.\d{3}/\d{4}-\d{2}" placeholder="00.000.000/0000-00">
                    </div>
                    <div class="col-md-10 mx-auto mb-2">
                        <label class="form-label text-white" style="font-size: 0.875rem;">CPF (Opcional)</label>
                        <input type="text" name="cpf" class="form-control form-control-sm" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" placeholder="000.000.000-00">
                    </div>
                    <div class="col-md-10 mx-auto mb-2">
                        <label class="form-label text-white" style="font-size: 0.875rem;">E-mail</label>
                        <input type="email" name="email" class="form-control form-control-sm" required>
                    </div>
                    <div class="col-md-10 mx-auto mb-4">
                        <label class="form-label text-white" style="font-size: 0.875rem;">Senha</label>
                        <input type="password" name="senha" class="form-control form-control-sm" required minlength="6">
                    </div>
                    <div class="col-md-6 mx-auto d-flex justify-content-center">
                        <button type="submit" class="btn btn-custom btn-sm w-100">Cadastrar</button>
                        <a href="{{ route('home') }}" class="text-white ms-5"> Voltar </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>