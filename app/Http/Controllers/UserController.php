<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        // Validar los datos de entrada
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:8',
        ]);

        // Crear un nuevo usuario con los datos validados
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Redirigir a la página de detalles del usuario recién creado
        return redirect()->route('users.show', $user->id)->with('success', 'Usuario creado exitosamente.');
    }


    public function show($id)
    {
        $user = User::findOrFail($id);
        $projects = $user->projects;

        return view('users.show', compact('user', 'projects'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Validar los datos de entrada
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
        ]);

        // Obtener el usuario a actualizar
        $user = User::findOrFail($id);

        // Actualizar los datos del usuario con los datos validados
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];

        // Actualizar la contraseña solo si se proporciona una nueva contraseña
        if ($request->filled('password')) {
            $user->password = Hash::make($validatedData['password']);
        }

        // Guardar los cambios en la base de datos
        $user->save();

        // Redirigir a la página de detalles del usuario actualizado
        return redirect()->route('users.show', $user->id)->with('success', 'Usuario actualizado exitosamente.');
    }


    public function destroy($id)
    {
        // Obtener el usuario a eliminar
        $user = User::findOrFail($id);

        // Eliminar el usuario
        $user->delete();

        // Redirigir a la página de lista de usuarios con un mensaje de éxito
        return redirect()->route('users.index')->with('success', 'Usuario eliminado exitosamente.');
    }

}