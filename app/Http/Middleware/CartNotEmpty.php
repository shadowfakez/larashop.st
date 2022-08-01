<?php

namespace App\Http\Middleware;

use App\Models\Order;
use Closure;
use Illuminate\Http\Request;

class CartNotEmpty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function handle(Request $request, Closure $next)
    {

        $order = session('order');

        if (!is_null($order) and $order->getTotalValue() > 0) {
            return $next($request);
        }
        session()->forget('order');
        session()->flash('warning', 'Card is empty');
        return redirect()->route('home');
    }
}
