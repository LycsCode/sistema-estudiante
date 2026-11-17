
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar estudiante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
</head>
<body class="container mt-5">

    <div class="card p-4 shadow">
        <h2 class="text-center mb-4">Editar estudiante</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('estudiantes.update', $estudiante->ID) }}" method="POST">
            @csrf
            @method('PUT')

            <label class="form-label">Cédula (ID)</label>
            <input type="number" class="form-control mb-3"
                   value="{{ $estudiante->ID }}" disabled>

            <label class="form-label">Nombre completo</label>
            <input type="text" name="Nombre" class="form-control mb-3"
                   value="{{ old('Nombre', $estudiante->Nombre) }}" required>

            <label class="form-label">Correo electrónico</label>
            <input type="email" name="Correo" class="form-control mb-3"
                   value="{{ old('Correo', $estudiante->Correo) }}" required>

            <label class="form-label">Asignatura</label>
            <select name="Asignatura" class="form-select mb-4" required>
                <option value="Ingeniería Informática"
                    {{ old('Asignatura', $estudiante->Asignatura) == 'Ingeniería Informática' ? 'selected' : '' }}>
                    Ingeniería Informática
                </option>

                <option value="Ingeniería Industrial"
                    {{ old('Asignatura', $estudiante->Asignatura) == 'Ingeniería Industrial' ? 'selected' : '' }}>
                    Ingeniería Industrial
                </option>

                <option value="Administración de Empresas"
                    {{ old('Asignatura', $estudiante->Asignatura) == 'Administración de Empresas' ? 'selected' : '' }}>
                    Administración de Empresas
                </option>
            </select>

            <button type="submit" class="btn btn-primary w-100">
                Guardar cambios
            </button>

            <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary w-100 mt-2">
                Cancelar
            </a>
        </form>
    </div>

</body>
</html>
