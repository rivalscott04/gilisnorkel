<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPasswordRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function data(DataTables $dataTables)
    {
        $data = User::query()->latest();

        return $dataTables->eloquent($data)
            ->addColumn("role", fn($data) => ucfirst($data->role))
            ->addColumn('action', function ($data) {
                $edit = "<a href='" . route('admin.user.edit', $data->id) . "' class='text-success' title='Edit Data'><i class='bx bxs-edit bx-sm'></i></a>";
                $password = "<a href='" . route('admin.user.password.edit', $data->id) . "' class='text-warning ms-2' title='Ubah Password'><i class='bx bxs-lock bx-sm'></i></a>";

                return $edit . '  ' . $password;
            })
            ->rawColumns(['action'])
            ->toJson();
    }

    public function index()
    {
        return view('pages.user.index');
    }

    public function edit(User $user)
    {
        return view('pages.user.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
        try {
            $user->update($request->validated());

            alert()->success('Success', 'Data user berhasil diupdate!');
            return redirect()->route('admin.user.index');
        } catch (\Exception $e) {
            alert()->error('Ooppss!', 'Proses update data gagal!');
            return back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function editPassword(User $user)
    {
        return view('pages.user.password', compact('user'));
    }

    public function updatePassword(UserPasswordRequest $request, User $user)
    {
        try {
            $user->update([
                'password' => Hash::make($request->password)
            ]);

            alert()->success('Success', 'Password user berhasil diupdate!');
            return redirect()->route('admin.user.index');
        } catch (\Exception $e) {
            alert()->error('Ooppss!', 'Proses update password gagal!');
            return back()->withInput()->withErrors($e->getMessage());
        }
    }
}



