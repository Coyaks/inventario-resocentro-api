<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Maintenance;
use App\Models\User;
use Illuminate\Http\Request;
use Inc\Rsp;

class MaintenancesController extends Controller
{
    public function index(Request $req){
        $data = Maintenance::all();
        return Rsp::ok()
            ->setData($data);
    }

    public function create(Request $req){
        $item = new User();
        $item->name =$req->name;
        $item->email =$req->email;
        $item->password =$req->password;
        $item->save();

        $rsp = [
          'ok' => true,
          'msg' => 'Success',
          'data' => $item,
        ];
        return response()->json($rsp);
    }

    public function show(User $user){
        return response()->json($user);
    }

    public function destroy(User $user){
        $user->delete();
        $rsp = [
            'ok' => true,
            'msg' => 'Delete success',
            'data' => $user,
        ];
        return response()->json($rsp);
    }
}
