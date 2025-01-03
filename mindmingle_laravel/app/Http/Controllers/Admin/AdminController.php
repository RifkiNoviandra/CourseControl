<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use Carbon\Carbon;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $admins = User::select('id', 'full_name', 'email', 'username', 'status', 'created_at')->whereHas('roles', function ($query) {
                $query->where('role_name', 'Admin');
            })->latest();

            return Datatables::of($admins)
                ->addIndexColumn()
                ->editColumn('status', function ($admins) {
                    switch ($admins->status):
                        case 'active':
                            $status = '<span class="badge rounded-pill badge-soft-success me-2">Active</span>';
                            return $status;
                            break;
                        case 'deactivated':
                            $status = '<span class="badge rounded-pill badge-soft-dark me-2">Deactivated</span>';
                            return $status;
                            break;
                        default:
                            $status = '<span class="badge rounded-pill badge-soft-danger me-2">Inactive</span>';
                            return $status;
                            break;
                    endswitch;
                })

                ->addColumn('action', function ($admins) {
                    $actionBtn =  '
                    <div class="d-flex gap-2">
                    <a href=' . route('admin.admins.show', $admins->username) . ' class="btn btn-info"><i class="fas fa-search"></i></a>
                    </div>';
                    return $actionBtn;
                })
                ->editColumn('created_at', function ($admins) {
                    $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $admins->created_at)->format('d-M-Y H:i');
                    return $formatedDate;
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }
        return view('admin.admins.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        $user = User::where('username', $username)->whereHas('roles', function ($query) {
            $query->where('role_name', 'Admin');
        })->firstOrFail();

        return view('admin.admins.show', compact('user'));
    }
}
