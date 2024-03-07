<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            font-size: 1.5rem;
            color: #333;
        }

        label {
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
            display: block;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ddd;
            margin-bottom: 10px;
        }

        .error {
            color: #ff0000;
            font-size: 0.8rem;
            margin-top: 5px;
        }

        .flex {
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 4px;
            font-weight: bold;
            text-decoration: none;
            margin-left: 10px;
        }

        .cancel-btn {
            background-color: #808080;
            color: #fff;
        }

        .submit-btn {
            background-color: #4a90e2;
            color: #fff;
        }
    </style>
</head>
<body>

<div class="container">

    <h2>{{ $title }}</h2>

    <form action="{{ $action }}" method="POST">
        @csrf
        @isset ($method)
            @method($method)
        @endif

        <div>
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" value="{{ old('name', $project->name) }}">
            @error('name')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description">Descripción</label>
            <textarea name="description" id="description">{{ old('description', $project->description) }}</textarea>
            @error('description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex">
            <a href="{{ route('projects.index') }}" class="btn cancel-btn">Cancelar</a>
            <button type="submit" class="btn submit-btn">{{ $buttonText }}</button>
        </div>
    </form>

</div>

</body>
</html>
