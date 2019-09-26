<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image', 'name', 'phone', 'email', 'position', 'salary', 'head', 'hire_date'
    ];

    public function post()
    {
        return $this->hasOne('App\Models\Position', 'id', 'position');
    }

}
