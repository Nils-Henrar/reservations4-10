<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $roles = Role::all(); // ou Db::select('select * from roles'); Db::table('roles')->get();
        return view('role.index', [
            'roles' => $roles,
            'resource' => 'roles'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 

        return view('role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $role = new Role();
        $role->role = $request->role;
        $role->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        $role = Role::find($id);

        return view('role.show', [
            'role' => $role,
        ]);
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