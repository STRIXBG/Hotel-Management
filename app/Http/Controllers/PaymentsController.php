<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Payment;

class PaymentsController extends Controller {
    /*
     * Show All Payments
     */

    public function index() {
        $payments = Payment::all();
        return view('payments.index', compact('payments'));
    }

    /*
     * Create Data Pay
     */

    public function create() {
        $users = User::select('id', 'name')->get();
        return view('payments.create', ['users' => $users]);
    }

    /*
     * Store Payment
     */

    public function store(Request $request) {
        $request->validate([
            'hotel_id' => 'required',
            'reservation_id' => 'required',
            'amount' => 'required',
            'paid_at' => 'required',
        ]);

        Payment::create($request->all());

        return redirect()->route('payments.index')
                        ->with('success', 'Payment added successfully');
    }

    /*
     * Show Data of Payment
     */

    public function show(Payment $payment) {
        return view('payments.show', compact('payment'));
    }

    /*
     * Edit Payment
     */

    public function edit(Payment $payment) {
        return view('payments.edit', compact('payment'));
    }

    /*
     * Update Payment
     */

    public function update(Request $request, Payment $payment) {
        $request->validate([
            'hotel_id' => 'required',
            'reservation_id' => 'required',
            'amount' => 'required',
            'paid_at' => 'required',
        ]);

        $payment->update($request->all());

        return redirect()->route('payments.index')
                        ->with('success', 'Payment updated successfully');
    }

    /*
     * Destroy Payment
     */

    public function destroy(Payment $payment) {
        $payment->delete();

        return redirect()->route('payment.index')
                        ->with('success', 'Payment deleted successfully');
    }
}
