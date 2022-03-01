<?php

namespace App\Http\Controllers\ViewsManagement;

use App\Models\Country;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
            if (!view('country.index')) {
                throw new Exception();
            }

            $country = Country::with('province')->paginate(5);

            return view('country.index', [
                'country' => $country,
                'total' => $country->total(),
                'perPage' => $country->perPage(),
                'currentPage' => $country->currentPage()
            ]);
        } catch (Exception $e) {
            return redirect(route('home'))->with('fileNotFound', 'File tidak ditemukan !');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            if (!view('country.create')) {
                throw new Exception();
            }

            return view('country.create');
        } catch (Exception $e) {
            return redirect(route('home'))->with('fileNotFound', 'File tidak ditemukan !');
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
        $request->validate([
            'countryName' => 'required'
        ], [
            'required' => 'Mohon masukkan nama negara',
        ]);

        try {
            $province = Country::create([
                'name' => $request->countryName,
            ]);

            if (!$province) {
                throw new Exception();
            }

            return redirect(route('countryHome'))->with('createSuccess', 'Berhasil menambahkan data');
        } catch (Exception $e) {
            echo '<script type="text/javascript">alert("Gagal insert data !"); window.location.href="/country"</script>';
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  mixed $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        try {
            if (!$country) {
                throw new Exception();
            }

            return view('country.edit', [
                'country' => $country,
            ]);
        } catch (Exception $e) {
            return back()->with('notFound', "Data dengan ID : $country->id tidak ditemukan");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        $request->validate([
            'countryName' => 'required',
        ], [
            'required' => 'Mohon masukkan nama negara',
        ]);

        try {
            $action = $country->update([
                'name' => $request->countryName,
            ]);

            if (!$action) {
                throw new Exception();
            }

            return redirect(route('countryHome'))->with('updateSuccess', 'Berhasil melakukan update data !');
        } catch (Exception $e) {
            echo '<script type="text/javascript">alert("Gagal update data !"); window.location.href="/country"</script>';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  mixed $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        try {
            $action = $country->delete();

            if (!$action) {
                throw new Exception();
            }

            return redirect(route('countryHome'))->with('deleteSuccess', 'Berhasil delete data !');
        } catch (Exception $e) {
            echo '<script type="text/javascript">alert("Gagal delete data !"); window.location.href="/country"</script>';
        }
    }

    /**
     * Show the documentations for country API
     *
     * @return void
     */
    public function api()
    {
        return view('api.country');
    }
}
