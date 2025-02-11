<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login do Participante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow p-4" style="width: 400px;">
            <h3 class="text-center mb-4">Login do Participante</h3>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('participante.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nome</label>
                    <input type="text" name="nome" class="form-control" required minlength="3">
                </div>
                <div class="mb-3">
                    <label class="form-label">CPF</label>
                    <input type="text" name="cpf" class="form-control" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" placeholder="000.000.000-00">
                </div>
                <div class="mb-3">
                    <label class="form-label">Data de Nascimento</label>
                    <input type="date" name="dataNasc" class="form-control">
                </div>                
                <div class="mb-3">
                    <label class="form-label">E-mail</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Senha</label>
                    <input type="password" name="senha" class="form-control" required minlength="6">
                </div>
                <button type="submit" class="btn btn-primary w-100">Entrar</button>
            </form>
        </div>
    </div>
</body>
</html>
