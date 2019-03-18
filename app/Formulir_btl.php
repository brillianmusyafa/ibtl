<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formulir_btl extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'formulir_btls';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['category','kecamatan_id', 'desa_id','penerima', 'judul_berkas', 'berkas_masuk_tgl', 'pencairan_bulan', 'nilai', 'kelengkapan', 'keterangan','tahapan',
    'bendahara','ket_bendahara',
    'spm','ket_spm',
    'pengguna_anggaran','ket_pengguna_anggaran'

];

    public function Category()
    {
        return $this->belongsTo('App\Category', 'category', 'id');
    }

    public function cat()
    {
        return $this->belongsTo('App\Category', 'category', 'id');
    }

    public function countCategory($value='')
    {
        return $this->belongsTo('App\Category', 'category', 'id');
    }

    public function Kecamatan()
    {
        return $this->belongsTo('App\Kecamatan', 'kecamatan_id', 'id');
    }

    public function Desa()
    {
        return $this->belongsTo('App\Desa', 'desa_id', 'id');
    }



    // jika ada IDnya, update
    public function checkId(){

    }
    // jika ada kecamatannya
    public function checkKecamatan($row){
        $data = Kecamatan::findOrFail($row);
        if($data){
            return $data;
        }
        return false;
    }

    // jika ada Desa
    public function checkDesa($district,$nama_desa){
        $data = Desa::where('district_id',$district)->where('name',$nama_desa)->first();

        return $data;

    }
}
