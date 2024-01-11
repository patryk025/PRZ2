<?php

namespace App\Http\Livewire\Courses;

use App\Models\Course;
use WireUi\Traits\Actions;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use App\Http\Livewire\Courses\Actions\EditCourseAction;
use App\Http\Livewire\Courses\Actions\JoinCourseAction;
use App\Http\Livewire\Courses\Actions\ShowTimetableAction;
use App\Http\Livewire\Courses\Actions\MaterialsCourseAction;


class CoursesTableView extends TableView
{
    use Actions;

    /**
     * Sets a model class to get the initial data
     */
    protected $model = Course::class;

    public $searchBy = [
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $paginate = 7;

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            Header::title(__('translation.attributes.name'))->sortBy('name'),
            Header::title(__('translation.attributes.created_at'))->sortBy('created_at'),
            Header::title(__('translation.attributes.updated_at'))->sortBy('updated_at'),
            Header::title(__('translation.attributes.deleted_at'))->sortBy('deleted_at'),
        ];
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Current model for each row
     */
    public function row($model): array
    {
        return [
            $model->name,
            $model->created_at,
            $model->updated_at,
            $model->deleted_at,
        ];
    }

    protected function actionsByRow() {
        return [
            new JoinCourseAction('courses.join', 'Dołącz do kursu'),
            new EditCourseAction('courses.edit', 'Edytuj'),
            new ShowTimetableAction('courses.timetable', 'Wyświetl harmonogram'),
            new MaterialsCourseAction('courses.materials', 'Materiały'),
        ];
    }

    public function register($id) {
        $course = Course::find($id);
        $course->users()->attach(auth()->user()->id);
        
        $this->notification([
            'title' => 'Sukces',
            'description' => 'Pomyślnie dołączono do kursu',
            'icon' => 'success'
        ]);
    }
}