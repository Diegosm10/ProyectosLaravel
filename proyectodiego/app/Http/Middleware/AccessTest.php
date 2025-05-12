<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;


class Accesstest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $users = User::all();
        if ($users->isEmpty()) {
            return redirect()->route('user.create')->with('message', 'Crea un usuario primero');
        }
        return $next($request);
    }
}
