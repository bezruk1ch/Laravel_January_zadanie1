<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminAuthMiddleware
{
    public function handle($request, Closure $next)
    {
        // Проверка, если пользователь аутентифицирован и является администратором
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request); // Продолжить запрос
        }

        // В противном случае перенаправляем на дашборд
        return redirect('/dashboard');
    }
}
