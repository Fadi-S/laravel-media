<?php

namespace App\Http\Helpers;

class Slug
{
    private $model;
    private $sep;

    public function __construct($model, $separator)
    {
        $this->model = $model;
        $this->sep = $separator;
    }

    public function createSlug($title, $id = 0)
    {
        $slug = str_slug($title, $this->sep);

        $allSlugs = $this->getRelatedSlugs($slug, $id);

        if (! $allSlugs->contains('slug', $slug))
            return $slug;

        $i = 1;
        while (true) {
            $newSlug = $slug.$this->sep.$i;
            if (! $allSlugs->contains('slug', $newSlug))
                return $newSlug;
            $i++;
        }
        return null;
    }

    protected function getRelatedSlugs($slug, $id = 0)
    {
        return $this->model->select('slug')->where('slug', 'like', $slug.'%')
        ->where('id', '<>', $id)
        ->get();
    }
}