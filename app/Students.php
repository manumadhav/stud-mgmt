<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Teachers;

class Students extends Model
{
    protected $table = 'students';
    protected $timestamp = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'age', 'gender', 'reporting_teacher_id'
    ];

    public function teacher(){
        return $this->hasOne(Teachers::class, 'id');
    }

}
