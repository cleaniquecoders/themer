<?php

namespace CleaniqueCoders\Themer\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;

class Theme extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:theme';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new theme skeleton';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Theme';

    /**
     * Execute the console command.
     *
     * @return bool|null
     */
    public function handle()
    {
        $name = $this->getNameInput();

        /*
         * Creating Public Directories
         */
        $this->makeDirectory(theme('public', 'css', $name));
        $this->makeDirectory(theme('public', 'js', $name));
        $this->makeDirectory(theme('public', 'fonts', $name));
        $this->makeDirectory(theme('public', 'images', $name));
        $this->makeDirectory(theme('public', 'files', $name));

        /*
         * Creating Resources Assets
         */
        $this->makeDirectory(theme('assets', 'css', $name));
        $this->makeDirectory(theme('assets', 'js', $name));
        $this->makeDirectory(theme('assets', 'fonts', $name));
        $this->makeDirectory(theme('assets', 'images', $name));
        $this->makeDirectory(theme('assets', 'files', $name));

        /*
         * Creating Blade Views
         */
        $this->makeDirectory(theme('views', 'layouts', $name));
        $this->makeDirectory(theme('views', 'components', $name));

        $this->info($this->type . ' created successfully.');
    }

    /**
     * Get the desired class name from the input.
     *
     * @return string
     */
    protected function getNameInput()
    {
        return Str::snake(trim($this->argument('name')));
    }

    /**
     * Build the directory for the class if necessary.
     *
     * @param string $path
     *
     * @return string
     */
    protected function makeDirectory($path)
    {
        if (! $this->files->exists($path)) {
            $this->files->makeDirectory($path, 0777, true, true);
        }
    }

    protected function getStub()
    {
    }
}
