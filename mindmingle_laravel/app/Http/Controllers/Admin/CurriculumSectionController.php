<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseCurriculum;
use App\Models\CourseCurriculumSection;
use App\Models\CourseMasterclass;
use Illuminate\Http\Request;
use DataTables;
use RealRashid\SweetAlert\Facades\Alert;


class CurriculumSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request, $masterclass_slug)
    {
        // $curriculum_sections = CourseCurriculumSection::with('course_masterclasses')->whereHas('course_masterclasses', function ($query) use ($masterclass_slug) {
        //     $query->where('masterclass_slug', $masterclass_slug);
        // });
        $masterclasses = CourseMasterclass::with('course_curriculum_sections')->where('masterclass_slug', $masterclass_slug)->firstOrFail(['masterclass_slug', 'masterclass_name']);

        if ($request->ajax()) {
            $curriculum_sections = CourseCurriculumSection::with(['course_curriculums', 'course_masterclasses'])->whereHas('course_masterclasses', function ($query) use ($masterclass_slug) {
                $query->where('masterclass_slug', $masterclass_slug);
            });
            return Datatables::of($curriculum_sections)
                ->addIndexColumn()
                ->addColumn('action', function ($curriculum_sections) {
                    $actionBtn =  '
                    <div class="d-flex gap-2">
                    <a href=' . route('admin.masterclass.curriculum-section.edit', ['masterclass' => $curriculum_sections->course_masterclasses->masterclass_slug, 'curriculum_section' => $curriculum_sections->curriculum_section_id]) . ' class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                    <a href=' . route('admin.masterclass.curriculum-section.curriculum.index', ['masterclass' => $curriculum_sections->course_masterclasses->masterclass_slug, 'curriculum_section' => $curriculum_sections->curriculum_section_id]) . ' class="btn btn-primary"><i class="fas fa-book-open"></i></a>
                    <form method="POST" action=' . route('admin.masterclass.curriculum-section.destroy', ['masterclass' => $curriculum_sections->course_masterclasses->masterclass_slug, 'curriculum_section' => $curriculum_sections->curriculum_section_id]) . ' id="data-' . $curriculum_sections->curriculum_section_id . '">
                    ' . csrf_field() . '
                    <input name="_method" type="hidden" value="DELETE">
                    <button type="button" class="btn btn-danger" onclick="confirmDelete(' . '\'' . $curriculum_sections->curriculum_section_id . '\'' . ')" data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></button>
                    </form>
                    </div>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.curriculumSection.index', compact('masterclasses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($masterclass_slug)
    {
        $masterclasses = CourseMasterclass::with('course_curriculum_sections')->where('masterclass_slug', $masterclass_slug)->firstOrFail(['masterclass_slug', 'masterclass_name']);
        return view('admin.curriculumSection.create', compact('masterclasses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $masterclass_slug)
    {
        $validate = $request->validate([
            'curriculum_section_name' => 'required|string|max:50'
        ]);

        $masterclasses = CourseMasterclass::where('masterclass_slug', $masterclass_slug)->firstOrFail();
        $curriculum_sections = $masterclasses->course_curriculum_sections()->create($validate);

        if ($curriculum_sections) {
            Alert::success('Success', 'New curriculum section has been created!');
        } else {
            Alert::error('Error', 'Faied to create curriculum section');
            return redirect()->route('admin.masterclass.curriculum-section.index', $masterclasses->masterclass_slug)->with('error', 'Failed to create curriculum section');
        }
        return redirect()->route('admin.masterclass.curriculum-section.index', $masterclasses->masterclass_slug)->with('message', 'New curriculum section has been created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($masterclass_slug, $curriculum_sections)
    {
        $curriculum_sections = CourseCurriculumSection::with('course_masterclasses')->whereHas('course_masterclasses', function ($query) use ($masterclass_slug) {
            $query->where('masterclass_slug', $masterclass_slug);
        })->where('curriculum_section_id', $curriculum_sections)->firstOrFail();

        return view('admin.curriculumSection.edit', compact('curriculum_sections'));
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
            'curriculum_section_name' => 'required|string|max:50'
        ]);

        $masterclasses = CourseMasterclass::where('masterclass_slug', $masterclass_slug)->firstOrFail();
        $curriculum_sections = CourseCurriculumSection::with('course_masterclasses')->whereHas('course_masterclasses', function ($query) use ($masterclass_slug) {
            $query->where('masterclass_slug', $masterclass_slug);
        })->firstOrFail()->update($validate);

        if ($curriculum_sections) {
            Alert::success('Success', 'Curriculum section has been Edited!');
        } else {
            Alert::error('Error', 'Faied to create curriculum section');
            return redirect()->route('admin.masterclass.curriculum-section.index', $masterclasses->masterclass_slug)->with('error', 'Failed to create curriculum section');
        }
        return redirect()->route('admin.masterclass.curriculum-section.index', $masterclasses->masterclass_slug)->with('message', 'Curriculum section has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($masterclass_slug, $curriculum_sections)
    {
        $curriculum_sections = CourseCurriculumSection::with('course_masterclasses')->whereHas('course_masterclasses', function ($query) use ($masterclass_slug) {
            $query->where('masterclass_slug', $masterclass_slug);
        })->where('curriculum_section_id', $curriculum_sections)->firstOrFail()->delete();

        if ($curriculum_sections) {
            Alert::success('Success', 'The record has deleted!');
        } else {
            Alert::error('Error', 'Can\'t delete this record!');
            return back();
        }
        return back();
    }
}
