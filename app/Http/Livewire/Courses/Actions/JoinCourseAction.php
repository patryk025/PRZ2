<?php

namespace App\Http\Livewire\Courses\Actions;

use LaravelViews\Views\View;
use LaravelViews\Actions\RedirectAction;

class JoinCourseAction extends RedirectAction
{
    public function __construct(string $to, string $title, string $icon = 'arrow-right') 
    {
        parent::__construct($to, $title, $icon);
    }

    public function renderIf($model, View $view)
    {
        // if user doesn't have course

        return $model->deleted_at === null;
    }
}