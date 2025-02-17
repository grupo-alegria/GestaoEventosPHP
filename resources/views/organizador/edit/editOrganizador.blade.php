<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Organizador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .avatar-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        @media (max-width: 768px) {
            .card {
                max-width: 95%;
                padding: 20px !important;
            }

            .avatar-container img {
                width: 70px;
            }

            h3 {
                font-size: 1.25rem;
            }

            .form-label {
                font-size: 0.9rem;
            }

            .form-control {
                font-size: 0.9rem;
                padding: 8px 12px;
            }

            .btn {
                font-size: 0.9rem;
                padding: 10px;
            }

            .rounded-pill {
                padding: 8px 12px;
            }
        }

        @media (max-width: 480px) {
            .card {
                max-width: 90%;
                padding: 15px !important;
            }

            .avatar-container img {
                width: 60px;
            }

            h3 {
                font-size: 1.1rem;
            }

            .form-label {
                font-size: 0.85rem;
            }

            .form-control {
                font-size: 0.85rem;
                padding: 6px 10px;
            }

            .btn {
                font-size: 0.85rem;
                padding: 8px;
            }

            .rounded-pill {
                padding: 6px 10px;
            }
        }

        .rounded-pill {
            padding: 10px 15px;
        }
    </style>
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh; min-width: 100%; background: linear-gradient(135deg,rgb(109, 93, 65), #2e2e2e);">
        <div class="card shadow-lg p-4 p-md-5 rounded-4" style="max-width: 800px; width: 90%; background: #f8f9fa; border: none; min-height: 400px;">
            <div class="text-center mb-4">
                <div class="avatar-container mb-3">
                    <img src="/images/avatar-placeholder-2.png" alt="Avatar" class="rounded-circle shadow" width="100">
                </div>
                <h3 class="fw-bold text-primary">
                    <i class="bi bi-person-circle"></i> Editar Perfil
                </h3>
                <p class="text-muted">Personalize seu perfil e mantenha suas informações sempre atualizadas.</p>
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

            <form action="{{ route('organizador.update', $organizador->id) }}" method="POST" class="needs-validation" novalidate>
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-semibold">Nome</label>
                    <input type="text" name="nome" class="form-control rounded-pill" value="{{ old('nome', $organizador->nome) }}" required minlength="3">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">CNPJ</label>
                    <input type="text" name="cnpj" class="form-control rounded-pill" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" value="{{ old('cnpj', $organizador->cnpj) }}" placeholder="00.000.000/0000-00" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">CPF</label>
                    <input type="text" name="cpf" class="form-control rounded-pill" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" value="{{ old('cpf', $organizador->cpf) }}" placeholder="000.000.000-00" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">E-mail</label>
                    <input type="email" name="email" class="form-control rounded-pill" value="{{ old('email', $organizador->email) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Nova Senha <small class="text-muted">(opcional)</small></label>
                    <input type="password" name="senha" class="form-control rounded-pill" minlength="6" placeholder="Digite sua nova senha">
                </div>

                <button type="submit" class="btn btn-primary w-100 rounded-pill shadow-sm" style="transition: 0.3s; font-weight: 600;">
                    <i class="bi bi-check-circle"></i> Atualizar
                </button>
            </form>

            <div class="text-center mt-4 d-flex justify-content-between align-items-center">
                <a href="{{ route('organizador.home') }}" class="text-decoration-none text-secondary fw-semibold">
                    <i class="bi bi-arrow-left"></i> Voltar
                </a>
                <button class="btn btn-outline-danger fw-semibold px-3" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
                    <i class="bi bi-trash"></i> Excluir Conta
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
