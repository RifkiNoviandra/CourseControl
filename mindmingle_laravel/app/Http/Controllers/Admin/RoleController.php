<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use DataTables;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $Roles = Role::latest();

            return Datatables::of($Roles)
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.roles.index');
    }
}
