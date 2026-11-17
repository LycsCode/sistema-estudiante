
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar estudiante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
</head>
<body class="container mt-5">

    <div class="card p-4 shadow">
        <h2 class="text-center mb-4">Registrar estudiante</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('estudiantes.store') }}" method="POST">
            @csrf

            <label class="form-label">Nombre completo</label>
            <input type="text" name="Nombre" class="form-control mb-3"
                   value="{{ old('Nombre') }}" required>

            <label class="form-label">Cédula (ID)</label>
            <input type="number" name="ID" class="form-control mb-3"
                   value="{{ old('ID') }}" required>

            <label class="form-label">Correo electrónico</label>
            <input type="email" name="Correo" class="form-control mb-3"
                   value="{{ old('Correo') }}" required>

            <label class="form-label">Asignatura</label>
            <select name="Asignatura" class="form-select mb-4" required>
                <option value="">Seleccione una asignatura</option>
                <option value="Ingeniería Informática" {{ old('Asignatura') == 'Ingeniería Informática' ? 'selected' : '' }}>Ingeniería Informática</option>
                <option value="Ingeniería Industrial" {{ old('Asignatura') == 'Ingeniería Industrial' ? 'selected' : '' }}>Ingeniería Industrial</option>
                <option value="Administración de Empresas" {{ old('Asignatura') == 'Administración de Empresas' ? 'selected' : '' }}>Administración de Empresas</option>
            </select>

            <button type="submit" class="btn btn-success w-100">
                Registrar estudiante
            </button>

            <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary w-100 mt-2">
                Volver al listado
            </a>
        </form>
    </div>

</body>
</html>
