
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de estudiantes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
</head>
<body class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Gestión de estudiantes</h1>
        <a href="{{ route('estudiantes.create') }}" class="btn btn-success">
            Registrar estudiante
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('estudiantes.index') }}" method="GET" class="row g-2 mb-4">
        <div class="col-md-6">
            <input type="text" name="buscar" class="form-control"
                   placeholder="Buscar por nombre o correo"
                   value="{{ request('buscar') }}">
        </div>

        <div class="col-md-4">
            <select name="asignatura" class="form-select">
                <option value="">Todas las asignaturas</option>
                <option value="Ingeniería Informática" {{ request('asignatura') == 'Ingeniería Informática' ? 'selected' : '' }}>Ingeniería Informática</option>
                <option value="Ingeniería Industrial" {{ request('asignatura') == 'Ingeniería Industrial' ? 'selected' : '' }}>Ingeniería Industrial</option>
                <option value="Administración de Empresas" {{ request('asignatura') == 'Administración de Empresas' ? 'selected' : '' }}>Administración de Empresas</option>
            </select>
        </div>

        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Buscar</button>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Asignatura</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @forelse($estudiantes as $estudiante)
                    <tr>
                        <td>{{ $estudiante->ID }}</td>
                        <td>{{ $estudiante->Nombre }}</td>
                        <td>{{ $estudiante->Correo }}</td>
                        <td>{{ $estudiante->Asignatura }}</td>
                        <td>
                            <a href="{{ route('estudiantes.edit', $estudiante->ID) }}"
                               class="btn btn-warning btn-sm">Editar</a>

                            <form action="{{ route('estudiantes.destroy', $estudiante->ID) }}"
                                  method="POST" class="d-inline"
                                  onsubmit="return confirm('¿Seguro que deseas eliminar este estudiante?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">
                            No hay estudiantes registrados.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>
</html>
