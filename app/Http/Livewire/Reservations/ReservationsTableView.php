<?php

namespace App\Http\Livewire\Reservations;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\Reservation;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;

class ReservationsTableView extends TableView
{
    use Actions;

    /**
     * Sets a model class to get the initial data
     */
    protected $model = Reservation::class;

    public $searchBy = [
        'name',
        'user_id',
        'reservation_date',
        'description',
        'created_at',
        'updated_at'
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
            Header::title(__('Sala'))->sortBy('name'),
            Header::title(__('Nauczyciel'))->sortBy('user_id'),
            Header::title(__('Data rezerwacji'))->sortBy('reservation_date'),
            Header::title(__('Opis'))->sortBy('description'),
            Header::title(__('translation.attributes.created_at'))->sortBy('created_at'),
            Header::title(__('translation.attributes.updated_at'))->sortBy('updated_at'),
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
            $model->hall->name,
            $model->user->name,
            $model->reservation_date,
            $model->description,
            $model->created_at,
            $model->updated_at,
        ];
    }

    protected function actionsByRow() {
        return [
            
        ];
    }
}