<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Http\Requests\Admin\TeacherUserRequest;

class TeacherUserController extends Controller
{
    public function index()
    {
        $teachers = User::role('teacher')->get();
        return view('admin.teacher.index', compact('teachers'));
    }

    public function create()
    {
        return view('admin.teacher.create');
    }

    public function store(TeacherUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        event(new Registered($user));
        $role = Role::where('name', 'teacher')->first();
        $user->assignRole($role);
        return redirect()->route('admin.teacher.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(User $teacher)
    {
        return view('admin.teacher.edit', compact('teacher'));
    }

    public function update(TeacherUserRequest $request, User $teacher)
    {
        $teacher = User::find($teacher)->first();
        if (!$teacher) {
            return redirect()->route('admin.teacher.index')->with(['error' => 'Data tidak ditemukan!']);
        }
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->save();
        return redirect()->route('admin.teacher.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy(User $teacher)
    {
        $teacher->delete();
        return redirect()->route('admin.teacher.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
