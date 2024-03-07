    <!-- detalle del proyecto con título, descripción y autor -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle del proyecto') }}
        </h2>
    </x-slot>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 1rem;
        }

        p {
            color: #333;
            margin-bottom: 1rem;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 4px;
            font-weight: bold;
            text-decoration: none;
            margin-left: 20px;
            margin-bottom: 1rem;
            cursor: pointer;
        
        }

        .bg-gray-500 {
            background-color: #808080;
        }

        .bg-gray-500:hover {
            background-color: #696969;
        }

        .bg-indigo-500 {
            background-color: #4a90e2;
        }

        .bg-indigo-500:hover {
            background-color: #357ae8;
        }

        .bg-red-500 {
            background-color: #ff0000;
        }

        .bg-red-500:hover {
            background-color: #cc0000;
        }

        .text-white {
            color: #fff;
        }

        .rounded {
            border-radius: 4px;
        }

        .ml-2 {
            margin-left: 0.5rem;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold mb-4">{{ $project->name }}</h1>
                    <p class="text-gray-700 mb-4">
                        {{ __('Autor') }}: {{ $project->user->name }}
                    </p>
                    <p class="text-gray-700 mb-4">{{ $project->description }}</p>
                    <p class="text-gray-700">{{ $project->created_at->diffForHumans() }}</p>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('projects.index') }}" class="btn bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded ml-2">{{ __('Volver') }}</a>
                    <a href="{{ route('projects.edit', $project) }}" class="btn bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">{{ __('Editar') }}</a>
                    <form action="{{ route('projects.destroy', $project) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2">{{ __('Eliminar') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
