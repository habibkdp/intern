<?php

namespace App\Http\Controllers\APIManagement;

use App\Http\Controllers\Controller;
use App\Models\Province;
use Exception;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = Province::all();

            if (!$data->count()) {
                throw new Exception();
            }

            return response()->json([
                'province' => $data
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Tidak ada data yang ditemukan !'
            ], 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'countryId' => 'required|numeric',
            ]);

            $action = Province::create([
                'name' => $request->name,
                'country_id' => $request->countryId,
            ]);

            return response()->json([
                'message' => 'Berhasil insert data',
                'data' => $action
            ]);
        } catch (\Throwable $e) {
            return response()->json(['message' => 'Gagal input data', 'error' => $e->getMessage()], 400);
        }
    }

    /**
     * Show specified resource
     *
     * @param  App\Models\Province $province
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $province = Province::find($id);

            return response()->json([
                'data' => $province,
            ], 200);
        } catch (\Exception $th) {
            return response()->json([
                'message' => 'no data found',
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\Province $province
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $province = Province::find($id);

            $request->validate([
                'name' => 'required',
                'countryId' => 'required|numeric',
            ]);

            $province->update([
                'name' => $request->name,
                'country_id' => $request->countryId,
            ]);

            return response()->json([
                'message' => 'Berhasil update data',
                'data' => $province
            ]);
        } catch (\Throwable $e) {
            return response()->json(['message' => 'Gagal update data', 'error' => $e->getMessage()], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Province $province
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $province = Province::find($id);

            $province->delete();

            return response()->json([
                'message' => 'Berhasil delete data',
                'data' => $province
            ]);
        } catch (\Throwable $e) {
            return response()->json(['message' => 'Gagal delete data', 'error' => $e->getMessage()], 400);
        }
    }

    /**
     * Search specified resource
     *
     * @param  str $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        try {
            $search = Province::where('name', 'like',  '%' . $name . '%')->get();

            if (!$search->count()) {
                throw new Exception();
            }

            return response()->json(['data' => $search], 200);
        } catch (\Throwable $th) {
            return response()->json(['data' => 'No data found'], 404);
        }
    }

    /**
     * Show all regencies from specified province
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function regencies($id)
    {
        try {
            $province = Province::find($id);

            if (!$province->count()) {
                throw new Exception();
            }

            return response()->json([
                'province' => [
                    'id' => $province->id,
                    'provinceName' => $province->name,
                    'fromCountry' => $province->country->name,
                    'regencies' => $province->regencies,
                ],
            ], 200);
        } catch (\Throwable $th) {
            return response()->json(['data' => 'No data found'], 404);
        }
    }
}
