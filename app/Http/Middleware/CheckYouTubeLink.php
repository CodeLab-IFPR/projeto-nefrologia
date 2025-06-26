<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckYouTubeLink
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->isMethod('post')) {
            $link = $request->input('link');

            if (!$link || !$this->isValidYoutubeLink($link)) {
                return redirect()->back()->withErrors(['link' => 'Link inválido']);
            }
            if (!$request->has('link')) {
                return redirect()->back()->withErrors('O link é obrigatório.');
            }
        }

        return $next($request);
    }

    private function isValidYoutubeLink(?string $link): bool
    {
        if (!$link) return false;

        return preg_match('/^(https?\:\/\/)?(www\.youtube\.com|youtu\.?be)\/.+$/', $link);
    }
}
