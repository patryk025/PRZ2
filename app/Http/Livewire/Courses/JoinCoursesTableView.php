<?php

namespace App\Http\Livewire\Courses;

use App\Models\Course;
use WireUi\Traits\Actions;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use App\Http\Livewire\Users\Filters\UsersRoleFilter;
use App\Http\Livewire\Courses\Actions\EditCourseAction;
use App\Http\Livewire\Users\Filters\EmailVerifiedFilter;
use App\Http\Livewire\Courses\Actions\ShowTimetableAction;
use App\Http\Livewire\Users\Actions\AssignAdminRoleAction;
use App\Http\Livewire\Users\Actions\RemoveAdminRoleAction;
use App\Http\Livewire\Users\Actions\AssignWorkerRoleAction;
use App\Http\Livewire\Users\Actions\RemoveWorkerRoleAction;


class JoinCoursesTableView extends TableView
{
    use Actions;

    /**
     * Sets a model class to get the initial data
     */
    protected $model = Course::class;

    public $searchBy = [
        'name'
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
            Header::title(__('translation.attributes.name'))->sortBy('name')
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
            $model->name
        ];
    }

    protected function actionsByRow() {
        return [
            new JoinCourseAction('courses.join', 'Dołącz do kursu')
        ];
    }
}