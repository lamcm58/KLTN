<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';

    protected $fillable = ['question_code', 'question_type', 'question_category', 'question_content', 'answer', 'survey_id'];

    public $timestamps = true;

    public function Survey() {
        return $this->belongsTo('App\Models\Survey');
    }
}
