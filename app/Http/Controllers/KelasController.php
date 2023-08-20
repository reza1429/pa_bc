<?php

namespace App\Http\Controllers;

use App\helper\ApiFormatter;
use App\Models\Kelas;
use App\Models\Matpel;
use App\Models\Nilai;
use App\Models\Siswa;

use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function getListKelas(){
        $list_k = Kelas::all('kelas');
        if($list_k) {
            return ApiFormatter::createApi(200, 'Success', $list_k);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
    public function getDetailKelas(){
        $detail_k = Kelas::with('siswa')->get();
        if($detail_k) {
            return ApiFormatter::createApi(200, 'Success', $detail_k);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
    
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Kelas::create([
            'kelas' => request()->kelas,
            'walkel' => request()->walkel,
        ]);
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $kelas = Kelas::findOrFail($id);

        $kelas->update([
            'kelas'=>request()->kelas,
            'walkel'=>request()->walkel
        ]);
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
