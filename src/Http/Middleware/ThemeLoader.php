<?php

namespace CleaniqueCoders\Themer\Http\Middleware;

use Closure;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Response;

class ThemeLoader
{
    /**
     * The filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $files;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param   string  $theme
     * @return mixed
     */
    public function handle($request, Closure $next, $theme)
    {
        $response = $next($request);

        $this->files = new Filesystem;

        $this->makeThemeDirectory();

        if ($request->isMethod('GET')) {
            // get the original content
            $originalContent = $response->getOriginalContent();

            // get the view name
            $view_name = $originalContent->getName();

            if ($this->files->exists($this->getThemeViewPath($theme, $view_name))) {
                // Get the data we passed to our view
                $data = $originalContent->getData();

                return new Response(view($this->getThemeName($theme, $view_name), $data));
            }

        }

        return $response;
    }

    /**
     * Get theme name
     * @param  string $theme
     * @param  string $name
     * @return string
     */
    private function getThemeName($theme, $name)
    {
        return 'themes.' . $theme . '.' . $name;
    }

    /**
     * Get theme view's path
     * @param  string $theme
     * @param  string $name
     * @return string
     */
    private function getThemeViewPath($theme, $name)
    {
        return resource_path('views/themes/' . $theme . '/' . str_replace('.', '/', $name) . '.blade.php');
    }

    /**
     * Create themes directory if not exist
     * @return void
     */
    private function makeThemeDirectory()
    {
        $themePath = resource_path('views/themes');
        $this->makeDirectory($themePath);
    }

    /**
     * Build the directory for the class if necessary.
     *
     * @param  string  $path
     * @return string
     */
    protected function makeDirectory($path)
    {
        if (!$this->files->exists($path)) {
            $this->files->makeDirectory($path, 0777, true, true);
        }
    }
}
