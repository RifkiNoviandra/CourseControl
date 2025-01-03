<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseClassType;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables as DataTablesDataTables;

class ClassTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $classTypes = CourseClassType::select('class_type_id', 'class_type_name', 'class_type_slug')->latest();

            return DataTablesDataTables::of($classTypes)
                ->addIndexColumn()
                ->addColumn('action', function ($classTypes) {
                    $actionBtn =  '
                    <div class="d-flex gap-2">
                    <a href=' . route('admin.class-types.edit', $classTypes->class_type_slug) . ' class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                    <form method="POST" action=' . route('admin.class-types.destroy', $classTypes->class_type_slug) . ' id="data-' . $classTypes->class_type_slug . '">
                    ' . csrf_field() . '
                    <input name="_method" type="hidden" value="DELETE">
                    <button type="button" class="btn btn-danger" onclick="confirmDelete(' . '\'' . $classTypes->category_slug . '\'' . ')" data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></button>
                    </form>
                    </div>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.classTypes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.classTypes.create');
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
            'class_type_name' => 'required|string|regex:/^[a-zA-Z\s]+$/|min:3|max:50',
            'class_type_slug' => 'required|string|unique:course_class_types|min:3|max:50',
        ]);

        $classTypes = CourseClassType::create([
            'class_type_name' => $validate['class_type_name'],
            'class_type_slug' => ucfirst(Str::slug($validate['class_type_slug'])),
        ]);
        if ($classTypes) {
            Alert::success('Success', 'New Class type has been created!');
        } else {
            Alert::error('Error', 'Faild to add New Class type');
            return redirect()->route('admin.class-types.index')->with('error', 'Failed to add new Class type');
        }
        return redirect()->route('admin.class-types.index')->with('message', 'Class type has been created!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($class_type_slug)
    {
        $classTypes = CourseClassType::where('class_type_slug', $class_type_slug)->firstOrFail();
        return view('admin.classTypes.edit', compact('classTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $class_type_slug)
    {
        $validate = $request->validate([
            'class_type_name' => 'required|string|regex:/^[a-zA-Z\s]+$/|min:3|max:50',
            'class_type_slug' => 'required|string|unique:course_class_types,class_type_slug,' . $request->class_type_id . ',class_type_id|min:3|max:50'
        ]);

        $classTypes = CourseClassType::where('class_type_slug', $class_type_slug)->firstOrFail()->update([
            'class_type_name' => $validate['class_type_name'],
            'class_type_slug' => ucfirst(Str::slug($validate['class_type_slug'])),
        ]);
        if ($classTypes) {
            Alert::success('Success', 'Class Type has been edited!');
        } else {
            Alert::error('Error', 'Failed to edit class type ');
            return redirect()->route('admin.class-types.index')->with('error', 'Failed to edit new Class type');
        }
        return redirect()->route('admin.class-types.index')->with('message', 'New class type has been edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($class_type_slug)
    {
        $classTypes = CourseClassType::where('class_type_slug', $class_type_slug)->firstOrFail()->delete();
        if ($classTypes) {
            Alert::success('Success', 'The record has deleted!');
        } else {
            Alert::error('Error', 'Can\'t delete this record!');
            return back();
        }
        return back();
    }
}
