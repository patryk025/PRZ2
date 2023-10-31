<?php

namespace App\Http\Livewire\Courses;

use Carbon\Carbon;
use App\Models\Course;
use App\Models\Timetable;
use Illuminate\Support\Collection;
use App\Http\Livewire\CoursesTimetable;
use Omnia\LivewireCalendar\LivewireCalendar;

class CourseTimetable extends LivewireCalendar
{
    public Course $course;

    protected $listeners = [
        'render' => 'updateCurrentMonthAndYear',
        'prevMonth' => 'prevMonth', 
        'nextMonth' => 'nextMonth'
    ];

    /*public function mount(Course $course, $initialYear = null, $initialMonth = null, $weekStartsAt = null, $calendarView = null, $dayView = null, $eventView = null, $dayOfWeekView = null, $dragAndDropClasses = null, $beforeCalendarView = null, $afterCalendarView = null, $pollMillis = null, $pollAction = null, $dragAndDropEnabled = true, $dayClickEnabled = true, $eventClickEnabled = true, $extras = []) {
        $this->course = $course;
    }*/

    public function mount(
        $initialYear = null, $initialMonth = null, $weekStartsAt = 1, $calendarView = null, $dayView = null, $eventView = null, $dayOfWeekView = null, $dragAndDropClasses = null, $beforeCalendarView = null, $afterCalendarView = null, $pollMillis = null, $pollAction = null, $dragAndDropEnabled = true, $dayClickEnabled = true, $eventClickEnabled = true, $extras = []
    ) {
        parent::mount(
            $initialYear, $initialMonth, $weekStartsAt, $calendarView, $dayView, $eventView, $dayOfWeekView, $dragAndDropClasses, $beforeCalendarView, $afterCalendarView, $pollMillis, $pollAction, $dragAndDropEnabled, $dayClickEnabled, $eventClickEnabled, $extras
        );
        //$this->course = $course;
        $this->course = $extras['course'];
        //$this->updateCurrentMonthAndYear();
    }

    public function onDayClick($year, $month, $day)
    {
        // This event is triggered when a day is clicked
        // You will be given the $year, $month and $day for that day
    }

    public function onEventClick($eventId)
    {
        // This event is triggered when an event card is clicked
        // You will be given the event id that was clicked
    }

    public function onEventDropped($eventId, $year, $month, $day)
    {
        // This event will fire when an event is dragged and dropped into another calendar day
        // You will get the event id, year, month and day where it was dragged to
    }

    public function prevMonth()
    {
        parent::goToPreviousMonth();
        //$this->updateCurrentMonthAndYear();
    }

    public function nextMonth()
    {
        parent::goToNextMonth();
        //$this->updateCurrentMonthAndYear();
    }

    /*public function updateCurrentMonthAndYear()
    {
        dd(parent::subMonthNoOverflow());
        $this->dispatchBrowserEvent('updateCurrentMonthAndYear'/*, [
            'month' => parent::$currentMonth,
            'year' => parent::$currentYear,
        ]);
    }*/

    public function events() : Collection
    {
        return Timetable::query()
            ->whereDate('data_rozpoczecia', '>=', $this->gridStartsAt)
            ->whereDate('data_rozpoczecia', '<=', $this->gridEndsAt)
            ->where('id_kursu', '=', $this->course->id)
            ->get()
            ->map(function (Timetable $model) {
                return [
                    'id' => $model->id,
                    'title' => $model->nazwa_zajec,
                    'description' => $model->opis_zajec,
                    'date' => $model->data_rozpoczecia,
                ];
            });
            
        /*return collect([
            [
                'id' => 1,
                'title' => 'test1',
                'description' => 'Teścik',
                'date' => Carbon::today(),
            ],
            [
                'id' => 2,
                'title' => 'test2',
                'description' => 'MAME JESTEM W KOMPUTRZE!!!',
                'date' => Carbon::tomorrow(),
            ],
        ]);*/
    }
}
