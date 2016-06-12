<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Validator;
use Illuminate\Http\Request;
use App\Models\QuestionQuiz;
use App\Models\ReponseQuiz;

class QuestionQuizQuiz extends Model
{
    use SoftDeletes;

    /**
     * Timestamps (with softdeleting)
     * @var array
     */
    protected $dates = ['deleted_at'];
    
    /**
     * les attributs qu'on peut assigner au model.
     *
     * @var array
     */
    protected $fillable = [
        'questionQuizzes_id', 'quiz_id'
    ];
    
}
