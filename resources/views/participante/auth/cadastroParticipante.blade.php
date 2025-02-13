<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login do Participante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: rgb(44, 44, 44);
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow p-3 bg-black d-flex flex-row" style="width: 90%; max-width: 1200px; height: 500px;">
            <!-- Coluna da imagem -->
            <div class="w-50" style="overflow: hidden;">
                <img src="/images/banner-main.png" alt="Imagem de fundo" class="img-fluid h-100" style="object-fit: cover; width: 100%; height: 100%;">
            </div>

            <!-- Coluna do formulário -->
            <div class="w-50 p-3">
                <h3 class="mb-4 text-center mb-3 text-white" style="font-size: 1.5rem;">Login do Participante</h3>
                @if ($errors->any())
                <div class="alert alert-danger" style="font-size: 0.875rem;">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('participante.store') }}" method="POST">
                    @csrf
                    <div class="mb-4 d-flex gap-2 justify-content-center mx-auto">
                        <label class="form-label text-white" style="font-size: 0.875rem;">Nome</label>
                        <input type="text" name="nome" class="form-control form-control-sm w-50" required minlength="3">
                    </div>
                    <div class="mb-4 mt-2 d-flex gap-3 justify-content-center mx-auto">
                        <label class="form-label text-white" style="font-size: 0.875rem;">CPF</label>
                        <input type="text" name="cpf" class="form-control form-control-sm w-50" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" placeholder="000.000.000-00">
                    </div>
                    <div class="mb-4 d-flex gap-3 justify-content-center mx-auto">
                        <label class="form-label text-white" style="font-size: 0.875rem;">Data</label>
                        <input type="date" name="dataNasc" class="form-control form-control-sm w-50">
                    </div>
                    <div class="mb-4 d-flex gap-3 justify-content-center mx-auto">
                        <label class="form-label text-white" style="font-size: 0.875rem;">Email</label>
                        <input type="email" name="email" class="form-control form-control-sm w-50" required>
                    </div>
                    <div class="mb-4 d-flex gap-3 justify-content-center mx-auto">
                        <label class="form-label text-white" style="font-size: 0.875rem;">Senha</label>
                        <input type="password" name="senha" class="form-control form-control-sm w-50" required minlength="6">
                    </div>
                    <button type="submit" class="d-flex justify-content-center mx-auto btn btn-primary btn-sm w-50 mt-4">Entrar</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>