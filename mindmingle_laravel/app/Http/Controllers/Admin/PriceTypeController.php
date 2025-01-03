<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CoursePriceType;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class PriceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $priceType = CoursePriceType::select('price_type_id', 'price_type_name', 'price_type_slug')->latest();

            return Datatables::of($priceType)
                ->addIndexColumn()
                ->addColumn('action', function ($priceType) {
                    $actionBtn =  '
                    <div class="d-flex gap-2">
                    <a href=' . route('admin.price-types.edit', $priceType->price_type_slug) . ' class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                    <form method="POST" action=' . route('admin.price-types.destroy', $priceType->price_type_slug) . ' id="data-' . $priceType->price_type_slug . '">
                    ' . csrf_field() . '
                    <input name="_method" type="hidden" value="DELETE">
                    <button type="button" class="btn btn-danger" onclick="confirmDelete(' . '\'' . $priceType->price_type_slug . '\'' . ')" data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></button>
                    </form>
                    </div>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.priceTypes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.priceTypes.create');
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
            'price_type_name' => 'required|string|regex:/^[a-zA-Z\s]+$/|min:3|max:50',
            'price_type_slug' => 'required|string|unique:course_price_types|min:3|max:50',
        ]);

        $classTypes = CoursePriceType::create([
            'price_type_name' => $validate['price_type_name'],
            'price_type_slug' => ucfirst(Str::slug($validate['price_type_slug'])),
        ]);
        if ($classTypes) {
            Alert::success('Success', 'New price type has been created!');
        } else {
            Alert::error('Error', 'Faild to add New Price type');
            return redirect()->route('admin.price-types.index')->with('error', 'Failed to add new Price type');
        }
        return redirect()->route('admin.price-types.index')->with('message', 'Price type has been created!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($price_type_slug)
    {
        $priceTypes = CoursePriceType::where('price_type_slug', $price_type_slug)->firstOrFail();
        return view('admin.priceTypes.edit', compact('priceTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $price_type_slug)
    {
        $validate = $request->validate([
            'price_type_name' => 'required|string|regex:/^[a-zA-Z\s]+$/|min:3|max:50',
            'price_type_slug' => 'required|string|unique:course_price_types,price_type_slug,' . $request->price_type_id . ',price_type_id|min:3|max:50'
        ]);

        $classTypes = CoursePriceType::where('price_type_slug', $price_type_slug)->firstOrFail()->update([
            'price_type_name' => $validate['price_type_name'],
            'price_type_slug' => ucfirst(Str::slug($validate['price_type_slug'])),
        ]);
        if ($classTypes) {
            Alert::success('Success', 'Price Type has been edited!');
        } else {
            Alert::error('Error', 'Failed to edit price type ');
            return redirect()->route('admin.price.index')->with('error', 'Failed to edit new price type');
        }
        return redirect()->route('admin.price-types.index')->with('message', 'New price type has been edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($price_type_slug)
    {
        $priceTypes = CoursePriceType::where('price_type_slug', $price_type_slug)->firstOrFail()->delete();
        if ($priceTypes) {
            Alert::success('Success', 'The record has deleted!');
        } else {
            Alert::error('Error', 'Can\'t delete this record!');
            return back();
        }
        return back();
    }
}
