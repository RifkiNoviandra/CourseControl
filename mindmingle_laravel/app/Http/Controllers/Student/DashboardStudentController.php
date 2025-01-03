<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardStudentController extends Controller
{
    public function index()
    {
        $data = User::where('id', Auth::user()->id)->first();

        return view('student.dashboard')->with('user', $data);
    }

    public function setting()
    {
        $data = User::where('id', Auth::user()->id)->first();

        return view('student.setting')->with('user', $data);
    }

    public function deleteAccount()
    {
        return view('student.delete');
    }

    public function profile()
    {

        return view('student.setting');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(User $user)
    {
        $user = User::where('role_id', $user->role_id)->where('username', $user->username);
        return view('student.setting', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->first();

        $update_val = [];

        if ($request->username != $user['username'] && $request->username) {

            $validate = $request->validate([
                'username' => 'string|unique:users|regex:/^[a-zA-Z\s]+$/|min:5|max:50',
            ]);
            $update_val['username'] = $request->username;
        }

        if ($request->full_name != $user['full_name'] && $request->full_name) {

            $validate = $request->validate([
                'full_name' => 'string',
            ]);
            $update_val['full_name'] = $request->full_name;
        }

        if ($request->email != $user['email'] && $request->email) {
            $validate = $request->validate([
                'email' => 'string|email:dns|unique:users|max:255',
            ]);
            $update_val['email'] = $request->email;
        }

        if ($request->about != $user['about'] && $request->about) {
            $validate = $request->validate([
                'about' => 'string',
            ]);
            $update_val['about'] = $request->about;
        }

        if ($request->phone_number != $user['phone_number'] && $request->phone_number) {
            $validate = $request->validate([
                'phone_number' => 'string',
            ]);
            $update_val['phone_number'] = $request->phone_number;
        }

        $update = $user->update($update_val);

        if ($update) {
            Alert::success('Success', 'Data Updated!');
        } else {
            Alert::error('Error', 'Failed to Update Profile');
            return redirect()->route('student.setting')->with('error', 'Failed to add new Course category');
        }
        return redirect()->route('student.setting')->with('message', 'Data Profile Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
