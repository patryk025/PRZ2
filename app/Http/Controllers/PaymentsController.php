<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\DB;
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

    public function generateRandomPayment()
    {
        $payment = new Payment();

        $payment->user_id = User::inRandomOrder()->first()->id;
        $payment->method_id = DB::table('payments_methods')->inRandomOrder()->first()->id;
        $payment->currency_id = DB::table('payments_currencies')->inRandomOrder()->first()->id;
        $payment->status = DB::table('payments_statuses')->inRandomOrder()->first()->id;
        $payment->amount = rand(1, 10000)/100;
        $payment->item_name = 'Testowa płatność';

        if($payment->currency_id != 7) {
            $payment->transaction_id = UUID::uuid4()->toString();
        }

        $payment->save();

        return redirect()->route('payments.index');
    }
}
