<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        /** @var User|null $user */
        $user = auth()->user();

        if (! $user || $user->role !== $role) {
            abort(403);
        }

        return $next($request);
    }
}
