<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Students;
use App\Terms;

class StudentMark extends Model
{
    protected $table = 'student_marks';
    protected $timestamp = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_id', 'maths', 'history', 'science', 'term_id', 'total_mark'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function studentData()
    {
        return $this->hasOne(Students::class, 'id', 'student_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function term()
    {
        return $this->hasOne(Terms::class, 'id', 'term_id');
    }
}
