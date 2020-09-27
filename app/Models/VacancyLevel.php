<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VacancyLevel extends Model
{
    private $remainingCount;

    public function __construct(int $remainingCount){
        $this->remainingCount = $remainingCount;
    }
    public function mark():string{
        //markの値は何でもいいんだろう。多分関数名として×とか△とか○があるから記号という意味のmark関数を使ったんだろう。
        if($this->remainingCount === 0){
            return '×';
        }
        if($this->remainingCount < 5){
            return '△';
        }
            return '◎';
    }
}
