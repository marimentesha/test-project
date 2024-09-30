<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use HttpException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(Request): (Response) $next
     * @throws HttpException
     */
    public function handle(Request $request, Closure $next): Response
    {
        $role = Auth::user()->role->name;

        if (!Auth::check()) {
            return redirect('/login');
        };

        if ($role !== 'admin' && $role !== 'blogger') {
            abort(403, 'unauthorized');
        }

        return $next($request);
    }
}
