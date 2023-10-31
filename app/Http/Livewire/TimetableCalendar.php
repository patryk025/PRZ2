<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Omnia\LivewireCalendar\LivewireCalendar;

class TimetableCalendar extends LivewireCalendar
{
    public $month;

    public function mount(
        $initialYear = null, $initialMonth = null, $weekStartsAt = 1, $calendarView = null, $dayView = null, $eventView = null, $dayOfWeekView = null, $dragAndDropClasses = null, $beforeCalendarView = null, $afterCalendarView = null, $pollMillis = null, $pollAction = null, $dragAndDropEnabled = true, $dayClickEnabled = true, $eventClickEnabled = true, $extras = []
    ) {
        parent::mount(
            $initialYear, $initialMonth, $weekStartsAt, $calendarView, $dayView, $eventView, $dayOfWeekView, $dragAndDropClasses, $beforeCalendarView, $afterCalendarView, $pollMillis, $pollAction, $dragAndDropEnabled, $dayClickEnabled, $eventClickEnabled, $extras
        );
        //$this->course = $course;
        $this->month = Carbon::now()->format('F Y');
    }

    /*public function mount()
    {
        $this->month = Carbon::now()->format('F Y');
    }*/

    public function events() : Collection
    {

        return collect([
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
        ]);

        /*
        public function events(): Collection
        {
            return Model::query()
                ->whereDate('scheduled_at', '>=', $this->gridStartsAt)
                ->whereDate('scheduled_at', '<=', $this->gridEndsAt)
                ->get()
                ->map(function (Model $model) {
                    return [
                        'id' => $model->id,
                        'title' => $model->title,
                        'description' => $model->notes,
                        'date' => $model->scheduled_at,
                    ];
                });
        }
        */

    }

    public function nextMonth()
    {
        $this->gridStartsAt->addMonthNoOverflow();
        $this->gridEndsAt->addMonthNoOverflow();
        $this->month = $this->gridStartsAt->format('F Y');
        $this->emit('$refresh');
    }

    public function prevMonth()
    {
        $this->gridStartsAt->subMonthNoOverflow();
        $this->gridEndsAt->subMonthNoOverflow();
        $this->month = $this->gridStartsAt->format('F Y');
        $this->emit('$refresh');
    }

    public function render()
    {
        return view('livewire.timetable-calendar', [
            'events' => $this->events(),
            'month' => $this->month,
        ]);
    }
}
