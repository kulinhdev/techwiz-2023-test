<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\View\Components\Alert;

class AdminController extends Controller
{
    
    public function dashboard(Request $request): View
    {
        return view('admin.dashboard', [
            'user' => $request->user(),
        ]);
    }

    public function userManage(Request $request): View
    {
        $users = DB::table('users')->where('role', 'user')->paginate(6);
        
        return view('admin.user-manage', [
            'users' => $users
        ]);
    }

    public function userProfile(Request $request): View
    {
        $id = $request->id;
        $user = DB::table('users')->find($id);
        return view('admin.user-profile', [
            'user' => $user
        ]);
    }

    public function updateStatus(Request $request) {
        $id = $request->input('id');
        $isActive = $request->input('isActive');
        $affected = DB::table('users')
        ->where('id', $id)
        ->update(['is_active' => $isActive]);
$data = ['message' => 'Status updated successfully'];

        return response()->json($data);
    }

    public function searchUser(Request $request) {
        $all = $request->all();
        $name = $all['name'];
        $email = $all['email'];
        $address = $all['address'];
        $phone = $all['phone'];
        $status = $all['status'];

        $query = DB::table('users');

        $query->when($name, function ($query, $name) {
            return $query->where('name', 'like', '%' . $name . '%');
        });

        $query->when($email, function ($query, $email) {
            return $query->where('email', 'like', '%' . $email . '%');
        });

        $query->when($address, function ($query, $address) {
            return $query->where('address', 'like', '%' . $address . '%');
        });

        $query->when($phone, function ($query, $phone) {
            return $query->where('phone', $phone);
        });

        $query->when($status, function ($query, $status) {
            return $query->where('is_active', $status);
        });
    
        $users = $query->paginate(6);
        $users->withPath('/admin/search-user?name='. $name .'&email='. $email .'&address='. $address .'&phone='. $phone .'&status='. $status);
        return view('admin.user-manage', [
            'users' => $users
        ]);
    }

    public function notFound(Request $request): View
    {
        return view('admin.404');
    }
}