<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admittance extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_ID',
        'time_in',
        'time_out',
    ];
    public function student(){
        return $this->belongsTo('app\Models\Student');
    }
}
