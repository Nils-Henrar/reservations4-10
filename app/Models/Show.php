<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'description',
        'poster_url',
        'location_id',
        'bookable',
        'price',
        'created_at',
    ];

    /**
     * The table associated with the model.
     * 
     * @var string
     */

    protected $table = 'shows';

    /**
     * Indicates if the model should be timestamped.
     * 
     * @var bool
     */

    public $timestamps = true;

    /**
     * Get the representations for the show.
     */

    public function representations()
    {
        return $this->hasMany(Representation::class); //hasMany est utilisé pour la relation one to many
    }

    /**
     * Get the location that owns the show.
     */

    public function location()
    {
        return $this->belongsTo(Location::class); //belongs to est utilisé pour la relation many to one
    }
}
