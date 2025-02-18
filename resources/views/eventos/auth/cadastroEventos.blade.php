<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Evento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .rounded-pill {
            padding: 10px 15px;
            border-radius: 50px;
        }

        @media (max-width: 768px) {
            .card {
                height: auto;
                padding: 20px;
            }
        }

        @media (max-width: 576px) {
            .container {
                padding: 10px;
            }

            .card {
                padding: 15px;
            }
        }
    </style>
</head>

<body style="background: linear-gradient(135deg,rgb(109, 93, 65), #2e2e2e);">
    <div class="container py-5" style="min-height: 100vh">
        <div class="card shadow-lg p-4">
            <h2 class="mb-4 text-center">Criar Novo Evento</h2>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('eventos.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf

                <div class="mb-3">
                    <label for="nome" class="form-label fw-bold">Nome do Evento</label>
                    <input type="text" name="nome" id="nome" class="form-control rounded-pill" value="{{ old('nome') }}" required>
                </div>

                <div class="mb-3">
                    <label for="tipo" class="form-label fw-bold">Tipo do Evento</label>
                    <select name="tipo" id="tipo" class="form-select rounded-pill" required>
                        <option value="" disabled selected>Selecione o tipo</option>
                        <option value="Show" {{ old('tipo') == 'Show' ? 'selected' : '' }}>Show</option>
                        <option value="Festas" {{ old('tipo') == 'Festas' ? 'selected' : '' }}>Festas</option>
                        <option value="Campeonatos esportivos" {{ old('tipo') == 'Campeonatos esportivos' ? 'selected' : '' }}>Campeonatos esportivos</option>
                        <option value="Outros" {{ old('tipo') == 'Outros' ? 'selected' : '' }}>Outros</option>
                    </select>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="local" class="form-label fw-bold">Local</label>
                        <input type="text" name="local" id="local" class="form-control rounded-pill" value="{{ old('local') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="data" class="form-label fw-bold">Data</label>
                        <input type="date" name="data" id="data" class="form-control rounded-pill" value="{{ old('data') }}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="valor" class="form-label fw-bold">Valor dos Ingressos (R$)</label>
                        <input type="number" name="valor" id="valor" class="form-control rounded-pill" step="0.01" min="0" value="{{ old('valor') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lotacaoMax" class="form-label fw-bold">Lotação Máxima</label>
                        <input type="number" name="lotacaoMax" id="lotacaoMax" class="form-control rounded-pill" min="1" value="{{ old('lotacaoMax') }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="descricao" class="form-label fw-bold">Descrição</label>
                    <textarea name="descricao" id="descricao" class="form-control" rows="4" required>{{ old('descricao') }}</textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('organizador.home') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Criar Evento</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
