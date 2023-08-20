<?php

namespace App\Http\Controllers;

use App\helper\ApiFormatter;
use App\Models\Kelas;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
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

    public function getDetailSiswa(){
        $siswaData = Siswa::with(['nilai.matpel', 'kelas'])->get();
    
        $response = [];
    
        foreach ($siswaData as $siswa) {
            $siswaResponse = [
                'id' => $siswa->id,
                'nama' => $siswa->nama,
                'nisn' => $siswa->nisn,
                'kelas' => $siswa->kelas->kelas,
                'jenis_kelamin' => $siswa->jk,
                'alamat' => $siswa->alamat,
                'no. telp' => $siswa->no_telp,
                'nilai' => [],
            ];
    
            foreach ($siswa->nilai as $nilai) {
                $totalScore = 0;
    
                // Hitung nilai berdasarkan persentase
                $totalScore += ($nilai->lat_soal1 + $nilai->lat_soal2 + $nilai->lat_soal3 + $nilai->lat_soal4)/4 * 0.15;
                $totalScore += ($nilai->uh1 + $nilai->uh2)/2 * 0.20;
                $totalScore += $nilai->uts * 0.25;
                $totalScore += $nilai->uas * 0.40;
    
                $matpelData = [
                    'matpel_id' => $nilai->matpel->id,
                    'matpel_nama' => $nilai->matpel->matpel,
                    'nilai' => $totalScore,
                ];
    
                $siswaResponse['nilai'][] = $matpelData;
            }
    
            $response[] = $siswaResponse;
        }
        if($response) {
            
            return ApiFormatter::createApi(200, 'Success', $response);

            // return $detail_s;
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
    public function getListSiswa(){
        $list_k = Siswa::all('nama');
        if($list_k) {
            return ApiFormatter::createApi(200, 'Success', $list_k);
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
