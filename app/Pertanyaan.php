<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pertanyaans';

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
    protected $fillable = ['buku_tamu_id', 'pertanyaan', 'jawaban', 'user_id','lampiran'];

    public function Buku_tamu()
    {
        return $this->belongsTo('App\Buku_tamu', 'buku_tamu_id', 'id');
    }
}
