<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Login</h3>
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
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <!-- Campo de Senha -->
                            <div class="mb-3">
                                <label for="senha" class="form-label">Senha</label>
                                <input type="password" class="form-control" id="senha" name="senha" required>
                            </div>

                            <!-- Botão de Seleção (Organizador ou Participante) -->
                            <div class="mb-3">
                                <label class="form-label">Tipo de Usuário</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="tipo" id="organizador" value="organizador" required>
                                        <label class="form-check-label" for="organizador">Organizador</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="tipo" id="participante" value="participante" required>
                                        <label class="form-check-label" for="participante">Participante</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Botão de Envio -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Entrar</button>
                            </div>
                        </form>

                        <!-- Link para Cadastro -->
                        <div class="mt-3 text-center">
                            <a href="{{ route('home') }}"> Voltar </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>