<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Organizador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow-lg p-4 rounded-4" style="max-width: 500px; width: 100%;">
            <div class="text-center mb-4">
                <h3 class="fw-bold">
                    <i class="bi bi-pencil-square"></i> Editar Perfil
                </h3>
                <p class="text-muted">Atualize suas informações</p>
            </div>

            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Ops!</strong> Corrija os seguintes erros:
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <form action="{{ route('organizador.update', $organizador->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-semibold">Nome</label>
                    <input type="text" name="nome" class="form-control rounded-3" value="{{ old('nome', $organizador->nome) }}" required minlength="3">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">CNPJ</label>
                    <input type="text" name="cpf" class="form-control rounded-3" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" value="{{ old('cnpj', $organizador->cnpj) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">CPF</label>
                    <input type="text" name="cpf" class="form-control rounded-3" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" value="{{ old('cpf', $organizador->cpf) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">E-mail</label>
                    <input type="email" name="email" class="form-control rounded-3" value="{{ old('email', $organizador->email) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Nova Senha <small class="text-muted">(opcional)</small></label>
                    <input type="password" name="senha" class="form-control rounded-3" minlength="6">
                </div>

                <button type="submit" class="btn btn-primary w-100 rounded-3 shadow-sm" style="transition: 0.3s;">
                    <i class="bi bi-check-circle"></i> Atualizar
                </button>
            </form>

            <div class="text-center mt-3 d-flex justify-content-between">
                <a href="{{ route('participante.home') }}" class="text-decoration-none text-secondary">
                    <i class="bi bi-arrow-left"></i> Voltar para o perfil
                </a>
                <!-- Botão para abrir o modal de exclusão -->
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
                    Excluir Conta
                </button>
            </div>
        </div>
    </div>

    <!-- Modal de confirmação -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Excluir Conta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Você tem certeza de que deseja excluir sua conta? Esta ação não pode ser desfeita.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form action="{{ route('organizador.destroy', $organizador->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir Conta</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
