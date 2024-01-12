<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PaymentsController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasRole('admin')) {
            return view('payments.index', [
                'payments' => Payment::all(),
            ]);
        }

        return view('payments.index', [
            'payments' => auth()->user()->payments,
        ]);
    }

    public function generateInvoice($id)
    {
        $payment = Payment::find($id);

        if (!$payment) {
            abort(404, 'Płatność nie znaleziona');
        }

        $created_at_year = $payment->created_at->year;

        $invoice_count_before = Payment::whereYear('created_at', $created_at_year)
                                        ->where('id', '<', $id)
                                        ->count();

        $invoice_number = ($invoice_count_before + 1) . '/' . $created_at_year;

        $data = [
            'id' => $invoice_number,
            'created_at' => $payment->created_at->format('Y-m-d'),
            'due_at' => $payment->created_at->addDays(14)->format('Y-m-d'),
            'user' => $payment->user,
            'method' => $payment->method(),
            'transaction_id' => $payment->transaction_id,
            'name' => $payment->item_name,
            'amount' => $payment->amount . ' ' . $payment->currency()->name
        ];

        $pdf = Pdf::loadView('payments.invoice', ['invoice' => (object) $data]);

        return $pdf->download($invoice_number . '.pdf');
    }
}
