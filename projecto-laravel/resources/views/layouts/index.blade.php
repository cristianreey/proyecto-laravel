<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyectos</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        h2 {
            font-size: 1.5rem;
            color: #333;
        }

        .create-btn {
            display: inline-block;
            background-color: #4a90e2;
            color: #fff;
            padding: 10px 20px;
            font-weight: bold;
            text-decoration: none;
            border-radius: 4px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .actions {
            width: 260px;
        }

        .view-btn, .edit-btn, .delete-btn {
            display: inline-block;
            margin-right: 5px;
            margin-bottom: 5px;
            padding: 8px 12px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
        }

        .view-btn {
            background-color: #1e90ff;
            color: #fff;
        }

        .edit-btn {
            background-color: #32cd32;
            color: #fff;
        }

        .delete-btn {
            background-color: #ff4500;
            color: #fff;
        }

        .empty-row {
            background-color: #ff6347;
            color: #fff;
            text-align: center;
        }

        .pagination {
            margin-top: 20px;
            text-align: center;
        }

        .pagination a {
            display: inline-block;
            padding: 8px 16px;
            text-decoration: none;
            background-color: #ddd;
            color: #333;
            border-radius: 4px;
            margin: 0 4px;
        }

        .pagination span {
            display: inline-block;
            padding: 8px 16px;
            background-color: #4a90e2;
            color: #fff;
            border-radius: 4px;
            margin: 0 4px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h2>Proyectos</h2>
    </div>

    <a href="{{ route('projects.create') }}" class="create-btn">Crear proyecto</a>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($projects as $project)
                <tr>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->description }}</td>
                    <td class="actions">
                        <a href="{{ route('projects.show', $project) }}" class="view-btn">Ver</a>
                        <a href="{{ route('projects.edit', $project) }}" class="edit-btn">Editar</a>
                        <form action="{{ route('projects.destroy', $project) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr class="empty-row">
                    <td colspan="3">No hay proyectos para mostrar</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    @if ($projects->hasPages())
        <div class="pagination">
            {{ $projects->links() }}
        </div>
    @endif
</div>

</body>
</html>
