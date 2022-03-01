<?php

namespace App\Http\Controllers\ViewsManagement;

use App\Models\{Country, Province};
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $province = Province::with('country')->paginate(5);

        return view('province.index', [
            'province' => $province,
            'total' => $province->total(),
            'perPage' => $province->perPage(),
            'currentPage' => $province->currentPage()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('province.create', [
            'country' => Country::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'provinceName' => 'required',
            'countryId' => 'required'
        ], [
            'provinceName.required' => 'Mohon masukkan nama provinsi',
        ]);

        Province::create([
            'name' => $request->provinceName,
            'country_id' => $request->countryId,
        ]);
        return redirect(route('provinceHome'))->with('createSuccess', 'Berhasil menambahkan data');
    }

    /**
     * Show the form for update data
     *
     * @param  mixed $province
     * @return void
     */
    public function edit(Province $province)
    {
        return view('province.edit', [
            'province' => $province,
            'country' => Country::all()
        ]);
    }

    /**
     * Update the data
     *
     * @param  mixed $request
     * @param  mixed $province
     * @return void
     */
    public function update(Request $request, Province $province)
    {
        $request->validate([
            'provinceName' => 'required',
            'countryId' => 'required'
        ], [
            'provinceName.required' => 'Mohon masukkan nama provinsi',
        ]);
        $province->update([
            'name' => $request->provinceName,
            'country_id' => $request->countryId
        ]);

        return redirect(route('provinceHome'))->with('updateSuccess', 'Berhasil melakukan update data !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Province $province)
    {
        $province->delete();

        return redirect(route('provinceHome'))->with('deleteSuccess', 'Berhasil delete data !');
    }

    /**
     * Show the documentations for province API
     *
     * @return void
     */
    public function api()
    {
        return view('api.province');
    }
}
