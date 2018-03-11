<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public $table = 'languages';
    protected $guarded =[];

    public static function createDefault()
    {
        $langs = [
            'Arabic', 'English'
        ];

        foreach($langs as $lang)
            self::create([    
                'name' => $lang,
                'slug' => str_slug($lang)
                ]
            );
    }
}
