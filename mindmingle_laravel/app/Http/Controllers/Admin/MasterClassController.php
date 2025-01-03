<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseCategory;
use App\Models\CourseClassType;
use App\Models\CourseMasterclass;
use App\Models\CourseMasterclassLevel;
use App\Models\CoursePriceType;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use DataTables;

class MasterClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $masterclasses = CourseMasterclass::with(['course_class_types', 'course_categories', 'course_class_prices', 'course_masterclass_levels']);

            return Datatables::eloquent($masterclasses)
                ->addIndexColumn()
                ->editColumn('course_categories', function (CourseMasterclass $masterclasses) {
                    return $masterclasses->course_categories->category_name;
                })
                ->editColumn('course_masterclass_levels', function (CourseMasterclass $masterclasses) {
                    switch ($masterclasses->course_masterclass_levels->masterclass_level_name):
                        case 'Advance':
                            $price = '<span class="badge rounded-pill badge-soft-primary me-2">Advance</span>';
                            return $price;
                            break;
                        case 'Beginner':
                            $price = '<span class="badge rounded-pill badge-soft-success me-2">Beginner</span>';
                            return $price;
                            break;
                        case 'Master':
                            $price = '<span class="badge rounded-pill badge-soft-dark me-2">Master</span>';
                            return $price;
                            break;
                        case 'Intermediate':
                            $price = '<span class="badge rounded-pill badge-soft-danger me-2">Intermediate</span>';
                            return $price;
                            break;
                        default:
                            $level = '<span class="badge rounded-pill badge-soft-info me-2">All Level</span>';
                            return $level;
                            break;
                    endswitch;
                })
                ->editColumn('course_class_types', function (CourseMasterclass $masterclasses) {
                    return $masterclasses->course_class_types->class_type_name;
                })
                ->editColumn('course_class_prices', function (CourseMasterclass $masterclasses) {
                    if ($masterclasses->course_class_prices->price_type_name === 'Paid') {
                        $price = '<span class="badge rounded-pill badge-soft-warning me-2">Paid</span>';
                        return $price;
                    } else if ($masterclasses->course_class_prices->price_type_name === 'Free') {
                        $price = '<span class="badge rounded-pill badge-soft-success me-2">Free</span>';
                        return $price;
                    }
                })
                ->editColumn('action', function ($masterclasses) {
                    $actionBtn =  '
                    <div class="d-flex gap-2">
                    <a href=' . route('admin.masterclasses.show', $masterclasses->masterclass_slug) . ' class="btn btn-info"><i class="fas fa-search"></i></a>
                    <a href=' . route('admin.masterclass.curriculum-section.index', $masterclasses->masterclass_slug) . ' class="btn btn-primary"><i class="fas fa-book"></i></a>
                    <a href=' . route('admin.masterclasses.edit', $masterclasses->masterclass_slug) . ' class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>

                    <form method="POST" action=' . route('admin.masterclasses.destroy', $masterclasses->masterclass_slug) . ' id="data-' . $masterclasses->masterclass_slug . '">
                    ' . csrf_field() . '
                    <input name="_method" type="hidden" value="DELETE">
                    <button type="button" class="btn btn-danger" onclick="confirmDelete(' . '\'' . $masterclasses->masterclass_slug . '\'' . ')" data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></button>
                    </form>
                    </div>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'course_class_prices', 'course_masterclass_levels'])
                ->make(true);
        }
        return view('admin.masterclasses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $masterclass_levels = CourseMasterclassLevel::get(['masterclass_level_id', 'masterclass_level_name']);
        $price_types = CoursePriceType::get(['price_type_id', 'price_type_name']);
        $class_types = CourseClassType::get(['class_type_id', 'class_type_name']);
        $categories = CourseCategory::get(['category_id', 'category_name']);
        return view('admin.masterclasses.create', compact('masterclass_levels', 'price_types', 'class_types', 'categories'));
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
            'masterclass_name' => 'required|string|unique:course_masterclasses|max:80',
            'masterclass_short_description' => 'required|string|max:120',
            'masterclass_level' => 'required',
            'category' => 'required',
            'masterclass_level' => 'required',
            'class_type' => 'required',
            'price_type' => 'required',
            'thumbnail' => 'required|image|file|mimes:jpg,png,jpeg|max:2024',
            'masterclass_price' => 'nullable|string',
            'masterclass_discount' => 'nullable|string',
            'masterclass_total_duration' => 'nullable|string|min:7|max:7',
            'masterclass_description' => 'required|string',
            'masterclass_video_preview' => 'required|file|mimes:mp4,mkv,mov|max:20000'
        ]);

        $request->file('thumbnail')->store('public/masterclass/thumbnail');
        $request->file('masterclass_video_preview')->store('public/masterclass/video/preview');

        $masterclass = CourseMasterclass::create([
            'masterclass_name' => $validate['masterclass_name'],
            'masterclass_short_desc' => $validate['masterclass_short_description'],
            'masterclass_slug' => Str::slug($validate['masterclass_name']),
            'masterclass_level_id' => $validate['masterclass_level'],
            'class_type_id' => $validate['class_type'],
            'price_type_id' => $validate['price_type'],
            'masterclass_price' => $request->masterclass_price,
            'category_id' => $validate['category'],
            'masterclass_thumbnail' => $request->file('thumbnail')->hashName(),
            'masterclass_video_preview' => $request->file('masterclass_video_preview')->hashName(),
            'masterclass_description' => $validate['masterclass_description'],
            'masterclass_total_duration' => $validate['masterclass_total_duration'],
            'masterclass_discount' => $request->masterclass_discount,
        ]);

        if ($masterclass) {
            Alert::success('Success', 'New masterclass has been created!');
        } else {
            Alert::error('Error', 'Failed to add masterclass!');
            return redirect()->route('admin.masterclasses.index')->with('error', 'Failed to add masterclass!');
        }
        return redirect()->route('admin.masterclasses.index')->with('message', 'New masterclass has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($masterclass_slug)
    {
        $masterclass = CourseMasterclass::with(['course_class_types', 'course_categories', 'course_class_prices', 'course_masterclass_levels'])
            ->where('masterclass_slug', $masterclass_slug)->firstOrFail();
        return view('admin.masterclasses.show', compact('masterclass'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($masterclass_slug)
    {
        $masterclass_levels = CourseMasterclassLevel::get(['masterclass_level_id', 'masterclass_level_name']);
        $price_types = CoursePriceType::get(['price_type_id', 'price_type_name']);
        $class_types = CourseClassType::get(['class_type_id', 'class_type_name']);
        $categories = CourseCategory::get(['category_id', 'category_name']);
        $masterclass = CourseMasterclass::where('masterclass_slug', $masterclass_slug)->firstOrFail();
        return view('admin.masterclasses.edit', compact('masterclass', 'masterclass_levels', 'price_types', 'class_types', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $masterclass_slug)
    {
        $validate = $request->validate([
            'masterclass_name' => 'required|string|unique:course_masterclasses,masterclass_name,' . $request->masterclass_id . ',masterclass_id|min:5|max:80',
            'masterclass_short_description' => 'required|string|max:120',
            'masterclass_level' => 'required',
            'category' => 'required',
            'masterclass_level' => 'required',
            'class_type' => 'required',
            'price_type' => 'required',
            'thumbnail' => 'image|file|mimes:jpg,png,jpeg|max:2024',
            'masterclass_price' => 'nullable|string',
            'masterclass_discount' => 'nullable|string',
            'masterclass_total_duration' => 'nullable|string',
            'masterclass_description' => 'required|string',
            'masterclass_video_preview' => 'file|mimes:mp4,mkv,mov|max:20000'
        ]);

        if ($request->file('thumbnail')) {
            Storage::delete('storage/masterclass/thumbnail/' . $request->oldThumbnail);
            $request->file('thumbnail')->store('public/masterclass/thumbnail');
            $validate['thumbnail'] = $request->file('thumbnail')->hashName();
        } else {
            $validate['thumbnail'] = $request->oldThumbnail;
        }

        if ($request->file('masterclass_video_preview')) {
            Storage::delete('storage/masterclass/video/preview', $request->oldVideoPreview);
            $request->file('masterclass_video_preview')->store('public/masterclass/video/preview');
            $validate['masterclass_video_preview'] = $request->file('masterclass_video_preview')->hashName();
        } else {
            $validate['masterclass_video_preview'] = $request->oldVideoPreview;
        }

        $masterclass = CourseMasterclass::where('masterclass_slug', $masterclass_slug)->firstOrFail()->update([
            'masterclass_name' => $validate['masterclass_name'],
            'masterclass_short_desc' => $validate['masterclass_short_description'],
            'masterclass_slug' => Str::slug($validate['masterclass_name']),
            'masterclass_level_id' => $validate['masterclass_level'],
            'class_type_id' => $validate['class_type'],
            'price_type_id' => $validate['price_type'],
            'masterclass_price' => $request->masterclass_price,
            'category_id' => $validate['category'],
            'masterclass_thumbnail' => $validate['thumbnail'],
            'masterclass_video_preview' => $validate['masterclass_video_preview'],
            'masterclass_description' => $validate['masterclass_description'],
            'masterclass_total_duration' => $validate['masterclass_total_duration'],
            'masterclass_discount' => $request->masterclass_discount,
        ]);

        if ($masterclass) {
            Alert::success('Success', 'Masterclass has updated!');
        } else {
            Alert::error('Error', 'Faild to edit masterclass!');
            return redirect()->route('admins.masterclasses.index')->with('error', 'Faild to udate masterclass');
        }
        return redirect()->route('admin.masterclasses.index')->with('message', 'Masterclass has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($masterclass_slug)
    {
        $masterclass = CourseMasterclass::where('masterclass_slug', $masterclass_slug)->firstOrFail()->delete();
        if ($masterclass) {
            Alert::success('Success', 'The record has deleted!');
        } else {
            Alert::error('Error', 'Can\'t delete this record!');
            return back();
        }
        return back();
    }
}
