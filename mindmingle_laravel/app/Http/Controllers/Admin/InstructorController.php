<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DataTables;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables as DataTablesDataTables;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $instructors = User::select('id', 'full_name', 'email', 'username', 'status', 'created_at')->whereHas('roles', function ($query) {
                $query->where('role_name', 'Instructor');
            })->latest();

            return DataTablesDataTables::of($instructors)
                ->addIndexColumn()
                ->editColumn('status', function ($instructors) {
                    switch ($instructors->status):
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

                ->addColumn('action', function ($instructors) {
                    $actionBtn =  '
                    <div class="d-flex gap-2">
                    <a href=' . route('admin.instructors.show', $instructors->username) . ' class="btn btn-info"><i class="fas fa-search"></i></a>
                    <a href=' . route('admin.instructors.edit', $instructors->username) . ' class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                    <form method="POST" action=' . route('admin.instructors.destroy', $instructors->username) . ' id="data-' . $instructors->username . '">
                    ' . csrf_field() . '
                    <input name="_method" type="hidden" value="DELETE">
                    <button type="button" class="btn btn-danger" onclick="confirmDelete(' . '\'' . $instructors->username . '\'' . ')" data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></button>
                    </form>
                    </div>';
                    return $actionBtn;
                })
                ->editColumn('created_at', function ($instructors) {
                    $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $instructors->created_at)->format('d-M-Y H:i');
                    return $formatedDate;
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }

        return view('admin.instructors.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.instructors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validate = $request->validate([
            'name' => 'required|string|regex:/^[a-zA-Z\s]+$/|min:3|max:50',
            'email' => 'required|email:dns|unique:users|max:255',
            'username' => 'required|string|unique:users|max:50',
            'phone_number' => 'required|numeric|regex:/^[-0-9\+]+$/|min:10',
            'password' => 'required|string|min:8|confirmed',
            'job_title' => 'nullable|string|min:3|max:50 ',
            'picture' => 'required|image|file|mimes:jpg,png,jpeg|max:2024',
            'about' => 'nullable|string|regex:/[^0-9a-zA-Z:,]+/|min:3|max:400',
            'twitter' => 'nullable|string|regex:/^https:\/\/\w+(\.\w+)*(:[0-9]+)?\/?$/|max:50',
            'instagram' => 'nullable|string|regex:/^https:\/\/\w+(\.\w+)*(:[0-9]+)?\/?$/|max:50',
            'facebook' => 'nullable|string|regex:/^https:\/\/\w+(\.\w+)*(:[0-9]+)?\/?$/|max:50',
            'linkedin' => 'nullable|string|regex:/^https:\/\/\w+(\.\w+)*(:[0-9]+)?\/?$/|max:50',
            'youtube' => 'nullable|string|regex:/^https:\/\/\w+(\.\w+)*(:[0-9]+)?\/?$/|max:50',
        ]);


        $request->file('picture')->store('public/admin/instructors/uploaded');

        $user = User::create([
            'full_name' => $validate['name'],
            'username' => ucfirst(Str::slug($validate['username'])),
            'password' => Hash::make($validate['password']),
            'phone_number' => $validate['phone_number'],
            'email' => $validate['email'],
            'job_title' => $validate['job_title'],
            'profile_picture' => $request->file('picture')->hashName(),
            'about' => $validate['about'],
            'social_twitter' => $validate['twitter'],
            'social_instagram' => $validate['instagram'],
            'social_facebook' => $validate['facebook'],
            'social_linkedin' => $validate['linkedin'],
            'social_youtube' => $validate['youtube'],
            'email_verified_at' => Carbon::now(),
            'is_email_verified' => true,
            'status' => 'active',
            'role_id' => 3
        ]);
        if ($user) {
            Alert::success('Success', 'New instructor has beed created!');
        } else {
            Alert::error('Error', 'Failed to add instructor!');
            return redirect()->route('admin.instructors.index')->with('error', 'Failed to add instructor!');
        }

        return redirect()->route('admin.instructors.index')->with('message', 'New instructor has been created');
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
            $query->where('role_name', 'Instructor');
        })->firstOrFail();

        return view('admin.instructors.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($username)
    {
        $user = User::where('username', $username)->whereHas('roles', function ($query) {
            $query->where('role_name', 'Instructor');
        })->firstOrFail();

        return view('admin.instructors.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $username)
    {
        $validate = $request->validate([
            'name' => 'required|string|regex:/^[a-zA-Z\s]+$/|min:3|max:50',
            'email' => 'required|email:dns|unique:users,email,' . $request->user_id . '|max:255',
            'username' => 'required|string|unique:users,username, ' . $request->user_id . '|max:50',
            'phone_number' => 'required|numeric|unique:users,phone_number, ' . $request->user_id . '|regex:/^[-0-9\+]+$/|min:10',
            'password' => 'required|string|min:8|confirmed',
            'job_title' => 'nullable|string|min:3|max:50 ',
            'picture' => 'image|file|mimes:jpg,png,jpeg|max:2024',
            'about' => 'nullable|string|min:3|max:400',
            'twitter' => 'nullable|string|regex:/^https:\/\/\w+(\.\w+)*(:[0-9]+)?\/?$/|max:50',
            'instagram' => 'nullable|string|regex:/^https:\/\/\w+(\.\w+)*(:[0-9]+)?\/?$/|max:50',
            'facebook' => 'nullable|string|regex:/^https:\/\/\w+(\.\w+)*(:[0-9]+)?\/?$/|max:50',
            'linkedin' => 'nullable|string|regex:/^https:\/\/\w+(\.\w+)*(:[0-9]+)?\/?$/|max:50',
            'youtube' => 'nullable|string|regex:/^https:\/\/\w+(\.\w+)*(:[0-9]+)?\/?$/|max:50',
        ]);

        if ($request->file('picture')) {
            Storage::delete('storage/admin/instructors/uploaded/' . $request->oldPicture);
            $request->file('picture')->store('public/admin/instructors/uploaded');
            $validate['picture'] = $request->file('picture')->hashName();
        } else {
            $validate['picture'] = $request->oldPicture;
        }

        $user = User::where('username', $username)->whereHas('roles', function ($query) {
            $query->where('role_name', 'Instructor');
        })->firstOrFail()->update([
            'full_name' => $validate['name'],
            'username' => ucfirst(Str::slug($validate['username'])),
            'password' => Hash::make($validate['password']),
            'phone_number' => $validate['phone_number'],
            'email' => $validate['email'],
            'job_title' => $validate['job_title'],
            'profile_picture' => $validate['picture'],
            'about' => $validate['about'],
            'social_twitter' => $validate['twitter'],
            'social_instagram' => $validate['instagram'],
            'social_facebook' => $validate['facebook'],
            'social_linkedin' => $validate['linkedin'],
            'social_youtube' => $validate['youtube'],
        ]);
        if ($user) {
            Alert::success('Success', 'Instructor has updated!');
        } else {
            Alert::error('Error', 'Failed to edit instructor!');
            return redirect()->route('admin.instructors.index')->with('error', 'Failed to update Instructor!');
        }

        return redirect()->route('admin.instructors.index')->with('message', 'Instructor has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($username)
    {
        $user = User::where('username', $username)->whereHas('roles', function ($query) {
            $query->where('role_name', 'Instructor');
        })->firstOrFail()->delete();

        if ($user) {
            Alert::success('Success', 'The record has deleted!');
        } else {
            Alert::error('Error', 'Can\'t delete this record!');
            return back();
        }

        return back();
    }
}
