<?php

namespace App\Http\Controllers\APIManagement;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Exception;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return response()->json([
                'country' => Country::all()
            ]);
        } catch (\Throwable $e) {
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
            ]);

            $action = Country::create([
                'name' => $request->name,
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
     * @param  App\Models\Country $country
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $country = Country::find($id);

            return response()->json([
                'data' => $country,
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
     * @param  App\Models\Country $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $country = Country::find($id);

            $request->validate([
                'name' => 'required',
            ]);

            $country->update([
                'name' => $request->name,
            ]);

            return response()->json([
                'message' => 'Berhasil update data',
                'data' => $country
            ]);
        } catch (\Throwable $e) {
            return response()->json(['message' => 'Gagal update data', 'error' => $e->getMessage()], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Country $country
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $country = Country::find($id);

            $country->delete();

            return response()->json([
                'message' => 'Berhasil delete data',
                'data' => $country
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
            $search = Country::where('name', 'like',  '%' . $name . '%')->get();

            if (!$search->count()) {
                throw new Exception();
            }

            return response()->json(['data' => $search], 200);
        } catch (\Throwable $th) {
            return response()->json(['data' => 'No data found'], 404);
        }
    }

    /**
     * Get all province from specified country
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function province($id)
    {
        try {
            $country = Country::find($id);

            if (!$country->count()) {
                throw new Exception();
            }

            return response()->json([
                'country' => [
                    'id' => $country->id,
                    'countryName' => $country->name,
                    'province' => $country->province
                ]
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'No data found'
            ], 404);
        }
    }
}
