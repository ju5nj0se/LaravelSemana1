<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Audit; // <-- Agrega el modelo Audit

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $users = User::query()
            ->when($request->filled('search'), function ($query) use ($request) {
                $query->where('email', 'like', '%' . $request->search . '%');
            })
            ->latest()
            ->paginate(10);

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Auditoría: creación
        Audit::create([
            'user_id' => auth()->id(),
            'auditable_type' => User::class,
            'auditable_id' => $user->id,
            'event' => 'created',
            'old_values' => null,
            'new_values' => $user->toArray(),
        ]);

        return redirect()->route('users.index')->with('success', 'El usuario se creo :D');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        $oldValues = $user->toArray();

        $user->update($request->only('name', 'email'));

        // Auditoría: actualización
        Audit::create([
            'user_id' => auth()->id(),
            'auditable_type' => User::class,
            'auditable_id' => $user->id,
            'event' => 'updated',
            'old_values' => $oldValues,
            'new_values' => $user->toArray(),
        ]);

        return redirect()->route('users.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    public function destroy(User $user)
    {
        $oldValues = $user->toArray();

        $user->delete();

        // Auditoría: eliminación
        Audit::create([
            'user_id' => auth()->id(),
            'auditable_type' => User::class,
            'auditable_id' => $user->id,
            'event' => 'deleted',
            'old_values' => $oldValues,
            'new_values' => null,
        ]);

        return redirect()->route('users.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}
