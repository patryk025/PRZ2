<?php

namespace App\Http\Livewire\Payments;

use App\Models\Payment;
use WireUi\Traits\Actions;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use App\Http\Livewire\Payments\Actions\ShowInvoiceAction;


class PaymentsTableView extends TableView
{
    use Actions;

    /**
     * Sets a model class to get the initial data
     */
    protected $model = Payment::class;

    public $searchBy = [
        'name',
        'user_id',
        'item_name',
        'amount',
        'currency_id',
        'method_id',
        'status',
        'transaction_id',
        'details',
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
            Header::title(__('Nazwa'))->sortBy('name'),
            Header::title(__('Wystawione na'))->sortBy('user_id'),
            Header::title(__('Kwota'))->sortBy('amount'),
            Header::title(__('Metoda płatności'))->sortBy('method_id'),
            Header::title(__('Status'))->sortBy('status'),
            Header::title(__('ID transakcji'))->sortBy('transaction_id'),
            Header::title(__('translation.attributes.created_at'))->sortBy('created_at'),
            Header::title(__('translation.attributes.updated_at'))->sortBy('updated_at'),
        ];
    }

    private function colorStatus($payment) {
        switch ($payment->status()->name) {
            case 'Oczekująca':
                return 'yellow';
            case 'Anulowana':
                return 'red';
            case 'Zakończona':
                return 'green';
            case 'Nieopłacona':
                return 'gray';
            case 'Zwrócona':
                return 'blue';
            case 'Odrzucona':
                return 'red';
            default:
                return 'gray';
        }
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Current model for each row
     */
    public function row($model): array
    {
        return [
            $model->item_name,
            $model->user->name,
            $model->amount . ' ' . $model->currency()->name,
            $model->method()->name,
            '<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-' . $this->colorStatus($model) . '-100 text-' . $this->colorStatus($model) . '-800">' . $model->status()->name . '</span>',
            $model->transaction_id,
            $model->created_at,
            $model->updated_at,
        ];
    }

    protected function actionsByRow() {
        return [
            new ShowInvoiceAction('generate.invoice', 'Wyświetl fakturę'),
        ];
    }
}