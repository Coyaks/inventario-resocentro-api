<?php

namespace App\Http\Controllers\test;

use App\Enums\StateEnum;
use App\Http\Controllers\Controller;
use App\Models\Person;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inc\Auth;
use Mpdf\Tag\A;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $menus = DB::table('modules as mo')
            ->select(
                'mo.*',
            )
            ->where('mo.state', 1)
            ->orderBy('mo.sort')
            ->get();
        return $menus;
        exit();
        return User::getUserWithPerson(1);
        exit();
        return $this->getQueryBuilder();
        exit();
        $me = Auth::user();
        dep($me);

        //Usar query builder haciendo relacion entre 2 tables
        $username = 'root@skoy.pe';
        #find user
        $user = DB::table('users')->where('username', 'root@focusit.pe')->get();
        return $user;

        //return $this->createJoin();

    }

    public function getQueryBuilder()
    {
        return User::getUserWithPersonOld();
    }

    public function getCustom()
    {
        $qb = DB::table('modules');
        $qb->select([
            'id',
            'name as us_name',
        ]);
        $qb->where('state', StateEnum::ENABLED);
        return $qb->get();
    }

    public function createJoinQueryBuilder()
    {
        $usersWithRoles = DB::table('users as us')
            ->select('us.id', 'us.username', 'ro.name as role_name')
            ->join('roles as ro', 'us.id_role', '=', 'ro.id')
            ->get();
        return $usersWithRoles;
    }

    public function createJoinQueryBuilderParts()
    {
        $qb = DB::table('users as us');
        $qb->select('us.id', 'us.username', 'ro.name as role_name');
        $qb->join('roles as ro', 'us.id_role', '=', 'ro.id');
        $data = $qb->get();
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
