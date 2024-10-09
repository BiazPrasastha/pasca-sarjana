<?php

namespace App\Http\Middleware;

use App\Models\Payment;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConfirmPayment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $payment = Payment::where('id', $request->payment?->id)->firstOrFail();
        if ($payment->status != 'accept') {
            abort(403, 'Anda Sudah/Tidak Bisa Melakukan Konfirmasi');
        }
        return $next($request);
    }
}
