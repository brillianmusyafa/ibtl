<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peraturan_daerah extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'peraturan_daerahs';

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
    protected $fillable = ['name', 'file', 'tahun'];

    
}
