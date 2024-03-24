<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'representation_id',
        'user_id',
        'places',
    ];

    protected $table = 'reservations';

    public $timestamps = false;

    /**
     * Get the representation that owns the reservation.
     */

    public function representation()

    {
        return $this->belongsTo(Representation::class); //belongs to est utilisé pour la relation many to one

    }

    /**
     * Get the user that owns the reservation.
     */

    public function user()

    {
        return $this->belongsTo(User::class); //belongs to est utilisé pour la relation many to one

    }
}
