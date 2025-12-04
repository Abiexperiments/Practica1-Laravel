<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'lastname', 'phone', 'email', 'date_of_birth'];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
