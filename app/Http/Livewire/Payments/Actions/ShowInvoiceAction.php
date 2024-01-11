<?php

namespace App\Http\Livewire\Payments\Actions;

use LaravelViews\Views\View;
use LaravelViews\Actions\Action;
use LaravelViews\Actions\RedirectAction;
use App\Http\Controllers\PaymentsController;

class ShowInvoiceAction extends RedirectAction
{
    public function __construct(string $to, string $title, string $icon = 'file-text') 
    {
        parent::__construct($to, $title, $icon);
    }
}
