<?php

namespace CleaniqueCoders\Themer\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class ThemeLoader
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     * @param string                   $theme
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $theme)
    {
        $response = $next($request);

        if ($request->isMethod('GET')) {
            // get the original content
            $originalContent = $response->getOriginalContent();

            // get the view name
            $view_name = $originalContent->getName();

            // path to view name
            $path = theme('views', str_replace('.', '/', $view_name) . '.blade.php', $theme);

            if (file_exists($path)) {
                return new Response(
                    view(
                        theme('views', $view_name, $theme),
                        $originalContent->getData()
                    )
                );
            }
        }

        return $response;
    }
}
