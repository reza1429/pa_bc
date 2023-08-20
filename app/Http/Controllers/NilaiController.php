<?php

namespace App\Http\Controllers;

use App\helper\ApiFormatter;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Matpel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class NilaiController extends Controller
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

    public function getDetailNilai(){
        $detail_n = Nilai::with(['siswa', 'matpel'])
        ->get(['id', 'lat_soal1', 'lat_soal2', 'lat_soal3', 'lat_soal4', 'uh1', 'uh2', 'uts', 'uas', 'siswa_id', 'matpel_id']);
    
        $formattedData = [];
        
        foreach ($detail_n as $nilai) {
            $formattedData[] = [
                'nilai_id' => $nilai->id,
                'latihan soal 1' => $nilai->lat_soal1,
                'latihan soal 2' => $nilai->lat_soal2,
                'latihan soal 3' => $nilai->lat_soal3,
                'latihan soal 4' => $nilai->lat_soal4,
                'ulangan harian 1' => $nilai->uh1,
                'ulangan harian 2' => $nilai->uh2,
                'ulangan tengah semester' => $nilai->uts,
                'ulangan semester' => $nilai->uas,
                'nama_siswa' => $nilai->siswa->nama,
                'nama_matpel' => $nilai->matpel->matpel,
            ];
        }

        if($formattedData) {
            return ApiFormatter::createApi(200, 'Success', $formattedData);
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
        $this->validate($request, [
            'siswa_id' => [
                'required',
                Rule::exists('siswa', '_id'),
            ],
            'matpel_id' => [
                'required',
                Rule::exists('matpel', '_id'),
            ],
        ]);

        $nilai = new Nilai([
            'lat_soal1' => request()->lat_soal1,
            'lat_soal2' => request()->lat_soal2,
            'lat_soal3' => request()->lat_soal3,
            'lat_soal4' => request()->lat_soal4,
            'uh1' => request()->uh1,
            'uh2' => request()->uh2,
            'uts' => request()->uts,
            'uas' => request()->uas,
            'siswa_id' => request()->siswa_id,
            'matpel_id' => request()->matpel_id,
        ]);
        $nilai->save();
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
