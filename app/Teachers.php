<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    protected $table = 'teachers';
    protected $timestamp = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'gender', 'subject_id'
    ];

//    public function student(){
//        return $this->belongsTo(Students::class, 'id','reporting_teacher_id');
//    }
}
