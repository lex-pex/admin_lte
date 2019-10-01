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

    public function boss()
    {
        return $this->hasOne('App\Models\Employee', 'id', 'head');
    }

    public function employees()
    {
        return $this->belongsToMany('App\Models\Employee', 'employees', 'head');
    }

}
