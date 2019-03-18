<?php

namespace App\Imports;

use App\Formulir_btl;
use App\Category;
use App\Desa;
use App\Kecamatan;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class FormulirImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Collection|null
    */
    public function collection(Collection $rows)
    {
        $data = [];
        foreach($rows as $key => $row){
            if($key >= 2){
                $data = [
                    'id'=>$row[0],
                    'category'=>$this->checkCategory($row[1]),
                    'kecamatan_id'=>$row[2],
                    'desa_id'=>$row[3],
                    'penerima'=>$row[4],
                    'judul_berkas'=>$row[5],
                    'berkas_masuk_tgl'=>$row[6],
                    'pencairan_bulan'=>$row[7],
                    'nilai'=>$row[8],
                    'bendahara'=>$row[9],
                    'ket_bendahara'=>$row[10],
                    'spm'=>$row[11],
                    'ket_spm'=>$row[12],
                    'pengguna_anggaran'=>$row[13],
                    'ket_pengguna_anggaran'=>$row[14],
                ];

                // checkKecamatan
                $kec = $this->checkKecamatan($row[2]);
                if($kec){
                    $kecamatan_id = $kec->id;
                    $data['kecamatan_id'] = $kecamatan_id;

                    // checkDesa
                    $desa = $this->checkDesa($kecamatan_id,$row[3]);
                    if($desa){
                        $desa_id = $desa->id;
                        $data['desa_id'] = $desa_id;
                    }
                }
                else{
                    $data['kecamatan_id'] = null;
                    $data['desa_id'] = null;
                }

                // check ID
                $checkID = $this->checkId($row[0]);
                // jika ada, update
                if($checkID){
                    // dd($checkID);
                    $update = $checkID->update($data);
                }
                else{
                    // insert data baru
                    $insert = Formulir_btl::insert($data);
                }
            }
        }
    }
    // jika ada IDnya, update
    private function checkId($id){
        $data = Formulir_btl::where('id',$id)->first();
        return ($data)?$data:false;
    }
    // jika ada kecamatannya
    private function checkKecamatan($row){
        $data = Kecamatan::where('name',$row)->where('regency_id','3328')->first();
        if($data){
            return $data;
        }
        return false;
    }

    // jika ada Desa
    private function checkDesa($district,$nama_desa){
        $data = Desa::where('district_id',$district)->where('name',$nama_desa)->first();
        return ($data)?$data:false;
    }

    private function checkCategory($cat)
    {
        $data = Category::where('nama_category',$cat)->first();
        return ($data)?$data->id:false;
    }
}
