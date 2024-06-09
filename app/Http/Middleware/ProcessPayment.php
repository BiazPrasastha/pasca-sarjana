<?php

namespace App\Http\Middleware;

use App\Models\Payment;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProcessPayment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $payment = Payment::find($request->payment)->firstOrFail();
        if ($payment->status == 'pending' && $payment->method != null) {
            return redirect(route('student.payment.process-detail', ['payment' => $payment->id]));
        } else if ($payment->status != 'pending') {
            abort(403, 'Anda Sudah Melakukan Pembayaran');
        }
        return $next($request);
    }
}
