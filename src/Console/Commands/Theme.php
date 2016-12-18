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
    public function fire()
    {
        $name = $this->getNameInput();
        $this->makeDirectory(resource_path('views/themes'));
        $this->makeDirectory(resource_path('views/themes/' . $name)); // create theme
        $this->makeDirectory(resource_path('views/themes/' . $name . '/layouts')); // create theme layouts
        $this->makeDirectory(resource_path('views/themes/' . $name . '/components')); // create theme layouts
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
     * @param  string  $path
     * @return string
     */
    protected function makeDirectory($path)
    {
        if (!$this->files->exists($path)) {
            $this->files->makeDirectory($path, 0777, true, true);
        }
    }

    protected function getStub()
    {

    }
}
