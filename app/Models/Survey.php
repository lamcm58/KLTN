<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $table = 'surveys';

    protected $fillable = ['survey_code', 'survey_name', 'subject_id', 'expired_day'];

    public $timestamps = true;

    public function Question() {
        return $this->hasMany('App\Models\Question');
    }

    public function Subject() {
        return $this->belongsTo('App\Models\Subject');
    }
}
