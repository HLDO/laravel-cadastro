<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Cadastro extends Model
{
    use Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cadastros';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'address', 'address_nro', 'city', 'state', 'estado_id', 'pobox',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [

    ];

    /**
     * Campos do tipo Date da tabela
     *
     * @var array
     */
    protected $dates = [

    ];

    public function scopeActive($query)
    {
        return $query->where('deleted', 0);
    }

    public function estado()
    {
        return $this->belongsTo('App\Models\Estado', 'estado_id');
    }
}
