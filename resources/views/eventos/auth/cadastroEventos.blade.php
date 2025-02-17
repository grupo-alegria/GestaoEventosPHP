<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Evento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h2 class="mt-4">Criar Novo Evento</h2>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('eventos.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nome" class="form-label">Nome do Evento</label>
                <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome') }}" required>
            </div>

            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo do Evento</label>
                <select name="tipo" id="tipo" class="form-control" required>
                    <option value="" disabled selected>Selecione o tipo</option>
                    <option value="Show" {{ old('tipo') == 'Show' ? 'selected' : '' }}>Show</option>
                    <option value="Festas" {{ old('tipo') == 'Festas' ? 'selected' : '' }}>Festas</option>
                    <option value="Campeonatos esportivos" {{ old('tipo') == 'Campeonatos esportivos' ? 'selected' : '' }}>Campeonatos esportivos</option>
                    <option value="Outros" {{ old('tipo') == 'Outros' ? 'selected' : '' }}>Outros</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="local" class="form-label">Local</label>
                <input type="text" name="local" id="local" class="form-control" value="{{ old('local') }}" required>
            </div>

            <div class="mb-3">
                <label for="data" class="form-label">Data</label>
                <input type="date" name="data" id="data" class="form-control" value="{{ old('data') }}" required>
            </div>

            <div class="mb-3">
                <label for="valor" class="form-label">Valor dos Ingressos(R$)</label>
                <input type="number" name="valor" id="valor" class="form-control" step="0.01" min="0" value="{{ old('valor') }}" required>
            </div>

            <div class="mb-3">
                <label for="lotacaoMax" class="form-label">Lotação Máxima</label>
                <input type="number" name="lotacaoMax" id="lotacaoMax" class="form-control" min="1" value="{{ old('lotacaoMax') }}" required>
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea name="descricao" id="descricao" class="form-control" rows="4" required>{{ old('descricao') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Criar Evento</button>
            <a href="{{ route('organizador.home') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>

</html>