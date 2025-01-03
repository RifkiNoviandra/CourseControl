<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseMasterclassLevel;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class CourseLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $masterclassLevels = CourseMasterclassLevel::select('masterclass_level_id', 'masterclass_level_name', 'masterclass_level_slug')->latest();

            return Datatables::of($masterclassLevels)
                ->addIndexColumn()
                ->addColumn('action', function ($masterclassLevels) {
                    $actionBtn =  '
                    <div class="d-flex gap-2">
                    <a href=' . route('admin.course-levels.edit', $masterclassLevels->masterclass_level_slug) . ' class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                    <form method="POST" action=' . route('admin.course-levels.destroy', $masterclassLevels->masterclass_level_slug) . ' id="data-' . $masterclassLevels->masterclass_level_slug . '">
                    ' . csrf_field() . '
                    <input name="_method" type="hidden" value="DELETE">
                    <button type="button" class="btn btn-danger" onclick="confirmDelete(' . '\'' . $masterclassLevels->masterclass_level_slug . '\'' . ')" data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></button>
                    </form>
                    </div>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.courseLevels.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.courseLevels.create');
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
            'masterclass_level_name' => 'required|string|regex:/^[a-zA-Z\s]+$/|min:3|max:50',
            'masterclass_level_slug' => 'required|string|unique:course_masterclass_levels|min:3|max:50',
        ]);

        $masterclassLevels = CourseMasterclassLevel::create([
            'masterclass_level_name' => $validate['masterclass_level_name'],
            'masterclass_level_slug' => ucfirst(Str::slug($validate['masterclass_level_slug'])),
        ]);
        if ($masterclassLevels) {
            Alert::success('Success', 'New masterclass level has been created!');
        } else {
            Alert::error('Error', 'Faild to add masterclass level');
            return redirect()->route('admin.course-levels.index')->with('error', 'Failed to add masterclass level');
        }
        return redirect()->route('admin.course-levels.index')->with('message', 'Masterclass level has been created!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($masterclass_level_slug)
    {
        $masterclassLevels = CourseMasterclassLevel::where('masterclass_level_slug', $masterclass_level_slug)->firstOrFail();
        return view('admin.courseLevels.edit', compact('masterclassLevels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $masterclass_level_slug)
    {
        $validate = $request->validate([
            'masterclass_level_name' => 'required|string|regex:/^[a-zA-Z\s]+$/|min:3|max:50',
            'masterclass_level_slug' => 'required|string|unique:course_masterclass_levels,masterclass_level_slug,' . $request->masterclass_level_id . ',masterclass_level_id|min:3|max:50'
        ]);

        $masterclassLevels = CourseMasterclassLevel::where('masterclass_level_slug', $masterclass_level_slug)->firstOrFail()->update([
            'masterclass_level_name' => $validate['masterclass_level_name'],
            'masterclass_level_slug' => ucfirst(Str::slug($validate['masterclass_level_slug'])),
        ]);
        if ($masterclassLevels) {
            Alert::success('Success', 'Masterclass level has been edited!');
        } else {
            Alert::error('Error', 'Failed to edit masterclass level ');
            return redirect()->route('admin.course-levels.index')->with('error', 'Failed to edit new masterclass level');
        }
        return redirect()->route('admin.course-levels.index')->with('message', 'Masterclass level has been edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($masterclass_level_slug)
    {
        $masterclassLevels = CourseMasterclassLevel::where('masterclass_level_slug', $masterclass_level_slug)->firstOrFail()->delete();
        if ($masterclassLevels) {
            Alert::success('Success', 'The record has deleted!');
        } else {
            Alert::error('Error', 'Can\'t delete this record!');
            return back();
        }
        return back();
    }
}
