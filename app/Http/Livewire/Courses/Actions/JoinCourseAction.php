<?php

namespace App\Http\Livewire\Courses\Actions;

use LaravelViews\Views\View;
use LaravelViews\Actions\Action;

class JoinCourseAction extends Action
{
    public $title = '';
    public $icon = 'arrow-right';

    public function __construct()
    {
        parent::__construct();
        $this->title = __('Dołącz do kursu');
    }

    public function handle($model, View $view) 
    {
        $view->dialog()->confirm([
            'title' => __("Zapis na kurs"),
            'description' => __("Czy na pewno chcesz zapisać się na kurs :name", [
                'name' => $model->name
            ]),
            'icon' => 'question',
            'iconColor' => 'text-green-500',
            'accept' => [
                'label' => __("Tak"),
                'method' => 'register',
                'params' => $model->id
            ],
            'reject' => [
                'label' => __("Nie")
            ]
        ]);
    }

    public function renderIf($model, View $view)
    {
        // if user doesn't have course

        return $model->deleted_at === null;
    }
}