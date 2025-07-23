<?php

namespace App\Models;

class Job{
    public static function all(){
        return [
            [
                'id' => 1,
                'title' => 'director',
                'salary' => 50000,
            ],
            [
                'id' => 2,
                'title' => 'programmer',
                'salary' => 10000,
            ],
            [
                'id' => 3,
                'title' => 'teacher',
                'salary' => 40000,
            ],
        ];
    }
   
}  