<?php

namespace App\Http\Controllers;

use App\Role;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $title = 'Data User';
        $data = Users::orderBy('created_at', 'desc')->where('role_id', 3)->get();
        return view('users.index', compact('title', 'data'));
    }

    public function add()
    {
        $title = 'Tambah Data user';
        $level = Role::get();
        return view('users.add', compact('title', 'level'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'role_id' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $data = new Users();
        $data->name = $request->name;
        $data->role_id = $request->role_id;
        $data->email = $request->email;
        $data->status_pilih = 2;
        $data->password = Hash::make($request->password);
        $data->save();

        \Session::flash('sukses', 'Data berhasil ditambahkan');

        return redirect('users');
    }

    public function profile()
    {
        $title = 'Profile';
        $dt = Users::find(Auth::id());
        return view('profile', compact('title', 'dt'));
    }

    public function edit($id)
    {
        $title = 'Profile';
        $dt = Users::find($id);
        return view('users.edit', compact('title', 'dt'));
    }

    public function updateprofile(Request $request)
    {
        $data = Users::find(Auth::id());
        $data->name = $request->name;
        $data->email = $request->email;

        $file = $request->file('photo');
        if ($file) {
            $file->move('uploads', $file->getClientOriginalName());
            $data->photo = $file->getClientOriginalName();
        }
        $data->save();

        \Session::flash('sukses', 'Data berhasil ubah');

        return redirect()->back();
    }

    public function updatepassword(Request $request)
    {
        $this->validate($request, [
            'oldpassword' => 'required',
            'password' => 'required', 'string', 'min:8', 'confirmed'
        ]);

        $ubahPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $ubahPassword)) {
            $user = Users::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->back();
        }
    }

    public function reset()
    {
        //Reset table users dengan role id sama dengan 3, dan mengubah status update menjadi 1
        DB::table('users')
            ->where('role_id', 3)
            ->update(['status_pilih' => 1]);

        DB::table('kandidat')->update(['jumlah_suara' => 0]);

        DB::table('pemilih')->update(['status_id' => 2]);

        \Session::flash('sukses', 'Semua User berhasil di Reset');

        return redirect()->back();
    }

    public function verify()
    {
        //verifikasi semua user
        DB::table('users')->where('role_id', 3)->update(['status_pilih' => 1]);

        \Session::flash('sukses', 'Semua User berhasil di Verifikasi');
        return redirect()->back();
    }

    public function vertifikasi($id)
    {
        //verifikasi user berdasarkan id
        DB::table('users')->where('id', $id)->update(['status_pilih' => 1]);

        \Session::flash('sukses', 'User berhasil di Verifikasi');
        return redirect()->back();
    }

    public function destroy()
    {
        //hapus semua user
        DB::table('users')->where('role_id', 3)->delete();

        \Session::flash('sukses', ' Semua User berhasil di hapus');

        return redirect()->back();
    }

    public function delete($id)
    {
        //hapus user berdasrkan id
        Users::find($id)->delete();

        \Session::flash('sukses', 'Data berhasil di hapus');

        return redirect()->back();
    }
}
