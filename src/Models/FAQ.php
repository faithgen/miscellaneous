<?php

namespace Faithgen\Miscellaneous\Models;

use FaithGen\SDK\Models\UuidModel;
use Illuminate\Support\Str;

class FAQ extends UuidModel
{
    protected $table = 'fg_f_a_q_s';

    public function getQuestionAttribute($val)
    {
        return Str::ucfirst($val);
    }

    public function getAnswerAttribute($val)
    {
        return Str::ucfirst($val);
    }
}
