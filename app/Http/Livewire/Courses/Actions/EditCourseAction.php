<?php

namespace App\Http\Livewire\Courses\Actions;

use LaravelViews\Views\View;
use LaravelViews\Actions\RedirectAction;

class EditCourseAction extends RedirectAction
{
    public function __construct(string $to, string $title, string $icon = 'edit') 
    {
        parent::__construct($to, $title, $icon);
    }

    public function renderIf($model, View $view)
    {
        $user = auth()->user();
        return $model->deleted_at === null and ($user->hasRole('admin') or $user->hasRole('teacher')) and $model->users()->where('user_id', $user->id)->exists();
    }
}