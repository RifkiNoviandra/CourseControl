<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\CourseCategory;

class CourseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $courseCategories = CourseCategory::select('category_id', 'category_name', 'category_slug', 'category_desc')->latest();

            return Datatables::of($courseCategories)
                ->addIndexColumn()
                ->addColumn('action', function ($courseCategories) {
                    $actionBtn =  '
                    <div class="d-flex gap-2">
                    <a href=' . route('admin.course-categories.edit', $courseCategories->category_slug) . ' class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                    <form method="POST" action=' . route('admin.course-categories.destroy', $courseCategories->category_slug) . ' id="data-' . $courseCategories->category_slug . '">
                    ' . csrf_field() . '
                    <input name="_method" type="hidden" value="DELETE">
                    <button type="button" class="btn btn-danger" onclick="confirmDelete(' . '\'' . $courseCategories->category_slug . '\'' . ')" data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></button>
                    </form>
                    </div>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.courseCategories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.courseCategories.create');
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
            'category_name' => 'required|string|regex:/^[a-zA-Z\s]+$/|min:3|max:50',
            'category_slug' => 'required|string|unique:course_categories|min:3|max:50',
            'category_desc' => 'required|string',
        ]);

        $courseCategories = CourseCategory::create([
            'category_name' => $validate['category_name'],
            'category_slug' => ucfirst(Str::slug($validate['category_slug'])),
            'category_desc' => $validate['category_desc'],
        ]);
        if ($courseCategories) {
            Alert::success('Success', 'New Course Category has been created!');
        } else {
            Alert::error('Error', 'Faild to add New Course Category');
            return redirect()->route('admin.course-categories.index')->with('error', 'Failed to add new Course category');
        }
        return redirect()->route('admin.course-categories.index')->with('message', 'New category course has been created!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($category_slug)
    {
        $category = CourseCategory::where('category_slug', $category_slug)->firstOrFail();
        return view('admin.courseCategories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category_slug)
    {
        $validate = $request->validate([
            'category_name' => 'required|string|regex:/^[a-zA-Z\s]+$/|min:3|max:50',
            'category_slug' => 'required|string|unique:course_categories,category_slug,' . $request->category_id . ',category_id|min:3|max:50',
            'category_desc' => 'required|string',
        ]);

        $courseCategories = CourseCategory::where('category_slug', $category_slug)->firstOrFail()->update([
            'category_name' => $validate['category_name'],
            'category_slug' => ucfirst(Str::slug($validate['category_slug'])),
            'category_desc' => $validate['category_desc'],
        ]);
        if ($courseCategories) {
            Alert::success('Success', 'Course Category has been edited!');
        } else {
            Alert::error('Error', 'Failed to edit Course Category');
            return redirect()->route('admin.course-categories.index')->with('error', 'Failed to edit new Course category');
        }
        return redirect()->route('admin.course-categories.index')->with('message', 'New category course has been edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category_slug)
    {
        $courseCategories = CourseCategory::where('category_slug', $category_slug)->firstOrFail()->delete();
        if ($courseCategories) {
            Alert::success('Success', 'The record has deleted!');
        } else {
            Alert::error('Error', 'Can\'t delete this record!');
            return back();
        }
        return back();
    }
}
