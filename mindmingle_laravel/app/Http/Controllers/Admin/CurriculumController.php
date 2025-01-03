<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseCurriculum;
use App\Models\CourseCurriculumSection;
use App\Models\CourseMasterclass;
use Illuminate\Http\Request;
use DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class CurriculumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request, $masterclass_slug, $curriculum_section)
    {
        $masterclasses = CourseMasterclass::where('masterclass_slug', $masterclass_slug)->first();
        $curriculums = CourseCurriculumSection::where('curriculum_section_id', $curriculum_section)->first();

        // $curriculums = CourseCurriculum::with(['course_curriculum_sections' => function ($query) use ($curriculum_section, $masterclass_slug) {
        //     $query->where('curriculum_section_id', $curriculum_section)->with('course_masterclasses')->whereHas('course_masterclasses', function ($query) use ($masterclass_slug) {
        //         $query->where('masterclass_slug', $masterclass_slug);
        //     });
        // }]);
        // dd($curriculums);

        // $curriculums = CourseMasterclass::with(['course_curriculum_sections' => function ($query) use ($curriculum_section) {
        //     $query->where('curriculum_section_id', $curriculum_section)->with(['course_curriculums' => function ($query) {
        //         $query->select('curriculum_id', 'curriculum_name', 'curriculum_description');
        //     }]);
        // }])->where('masterclass_slug', $masterclass_slug)->get();
        // dd($curriculums);
        // $curriculums = CourseCurriculum::with(['course_curriculum_sections' => function ($query) use ($curriculum_section, $masterclass_slug) {
        //     $query->select('curriculum_section_id', 'curriculum_section_name')->where('curriculum_section_id', $curriculum_section)->with('course_masterclasses')->whereHas('course_masterclasses', function ($query) use ($masterclass_slug) {
        //         $query->where('masterclass_slug', $masterclass_slug);
        //     });
        // }])->get();
        // dd($curriculums);

        // $curriculums = CourseCurriculum::join('course_curriculum_sections', 'course_curriculum_sections.curriculum_section_id', 'course_curriculums.curriculum_section_id')
        //     ->join('course_masterclasses', 'course_curriculum_sections.masterclass_id', 'course_masterclasses.masterclass_id')
        //     ->where('course_masterclasses.masterclass_slug', $masterclass_slug)->orWhere('course_curriculum_sections.curriculum_section_id', $curriculum_section)->get();
        // dd($curriculums);
        if ($request->ajax()) {
            // $curriculums = CourseMasterclass::with(['course_curriculum_sections' => function ($query) use ($curriculum_section) {
            //     $query->where('curriculum_section_id', $curriculum_section)->with(['course_curriculums' => function ($query) {
            //         $query->select('curriculum_id', 'curriculum_name', 'curriculum_description');
            //     }]);
            // }])->where('masterclass_slug', $masterclass_slug);
            $curriculums = CourseCurriculum::join('course_curriculum_sections', 'course_curriculum_sections.curriculum_section_id', 'course_curriculums.curriculum_section_id')
                ->join('course_masterclasses', 'course_curriculum_sections.masterclass_id', 'course_masterclasses.masterclass_id')
                ->where('course_masterclasses.masterclass_slug', $masterclass_slug)->orWhere('course_curriculum_sections.curriculum_section_id', $curriculum_section);


            // $masterclasses = CourseMasterclass::where('masterclass_slug', $masterclass_slug)->firstOrFail();
            return DataTables::of($curriculums)
                ->addIndexColumn()
                ->addColumn('action', function ($curriculums) {
                    $actionBtn =  '
                    <div class="d-flex gap-2">
                    <a href=' . route('admin.masterclass.curriculum-section.curriculum.edit', ['masterclass' => $curriculums->masterclass_slug, 'curriculum_section' => $curriculums->curriculum_section_id, 'curriculum' => $curriculums->curriculum_id]) . ' class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                    <form method="POST" action=' . route('admin.masterclass.curriculum-section.curriculum.destroy', ['masterclass' => $curriculums->masterclass_slug, 'curriculum_section' => $curriculums->curriculum_section_id, 'curriculum' => $curriculums->curriculum_id]) . ' id="data-' . $curriculums->curriculum_id . '">
                    ' . csrf_field() . '
                    <input name="_method" type="hidden" value="DELETE">
                    <button type="button" class="btn btn-danger" onclick="confirmDelete(' . '\'' . $curriculums->curriculum_id . '\'' . ')" data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></button>
                    </form>
                    </div>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.curriculum.index', compact('masterclasses', 'curriculums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($masterclass_slug, $curriculum_section)
    {
        $masterclasses = CourseMasterclass::where('masterclass_slug', $masterclass_slug)->firstOrFail(['masterclass_slug', 'masterclass_name']);
        $curriculum_section = CourseCurriculumSection::where('curriculum_section_id', $curriculum_section)->firstOrFail(['curriculum_section_id', 'curriculum_section_name']);
        return view('admin.curriculum.create', compact('masterclasses', 'curriculum_section'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $masterclass_slug, $curriculum_section)
    {
        $validate = $request->validate([
            'curriculum_name' => 'required|string|max:100',
            'curriculum_description' => 'required|string',
            'curriculum_video' => 'required|file|mimes:mp4,mkv,mov|max:20000'
        ]);

        $request->file('curriculum_video')->store('public/masterclass/video/curriculum');
        $curriculum_section = CourseCurriculumSection::where('curriculum_section_id', $curriculum_section)->firstOrFail();
        $curriculum = $curriculum_section->course_curriculums()->create([
            'curriculum_name' => $validate['curriculum_name'],
            'curriculum_description' => $validate['curriculum_description'],
            'curriculum_video' => $request->file('curriculum_video')->hashName()
        ]);

        if ($curriculum) {
            Alert::success('Success', 'New curriculum has been created!');
        } else {
            Alert::error('Error', 'Failed to add curriculum!');
            return redirect()->route('admin.masterclass.curriculum-section.curriculum.index', ['masterclass' => $masterclass_slug, 'curriculum_section' => $curriculum_section->curriculum_section_id])->with('error', 'Failed to add curriculum!');
        }
        return redirect()->route('admin.masterclass.curriculum-section.curriculum.index', ['masterclass' => $masterclass_slug, 'curriculum_section' => $curriculum_section->curriculum_section_id])->with('Success', 'New curriculum has been created!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($masterclass_slug, $curriculum_section, $curriculum)
    {
        $masterclasses = CourseMasterclass::where('masterclass_slug', $masterclass_slug)->firstOrFail(['masterclass_slug', 'masterclass_name']);
        $curriculum_section = CourseCurriculumSection::where('curriculum_section_id', $curriculum_section)->firstOrFail(['curriculum_section_id', 'curriculum_section_name']);
        return view('admin.curriculum.create', compact('masterclasses', 'curriculum_section'));
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
        //
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
