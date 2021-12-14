<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentMark extends Model
{
    protected $table = 'student_mark';
    protected $timestamp = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_id', 'subject_id', 'term_id', 'mark'
    ];
}
