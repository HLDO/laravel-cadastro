<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use Notifiable;
    public $timestamps = false; // false pois a tabela não contém os campos created_at e updated_at

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'estados';

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
        'name',
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






}
