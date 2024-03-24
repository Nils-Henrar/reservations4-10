<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Representation extends Model
{
    use HasFactory;

    protected $fillable = [
        'show_id',
        'location_id',
        'when',
    ];

    /**
     * The table associated with the model.
     * 
     * @var string
     */

    protected $table = 'representations';

    /**
     * Indicates if the model should be timestamped.
     * 
     * @var bool
     */

    public $timestamps = false;

    /**
     * Get the show that owns the representation.
     */

    public function show()

    {
        return $this->belongsTo(Show::class); //belongs to est utilisé pour la relation many to one

    }

    /**
     * Get the location that owns the representation.
     */

    public function location()

    {
        return $this->belongsTo(Location::class); //belongs to est utilisé pour la relation many to one

    }

    //relation many to many avec la table users

    /**
     * The users that belong to the representation.
     */

    public function users()

    {
        return $this->belongsToMany(User::class);
    }

    //relation many to many avec la table reservations

    /**
     * The reservations that belong to the representation.
     */

    public function reservations()

    {
        return $this->hasMany(Reservation::class);
    }
}
