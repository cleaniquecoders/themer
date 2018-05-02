<?php

namespace CleaniqueCoders\Themer\Tests;

use Illuminate\Filesystem\Filesystem;

class ThemerCommandTest extends TestCase
{
    /**
     * The filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $files;

    public function setUp()
    {
        parent::setUp();
        $this->files = new Filesystem();
    }

    /** @test */
    public function it_can_create_theme_with_artisan_command_make_theme()
    {
        $this->artisan('make:theme', ['name' => 'Themer']);

        $default = [
            'public' => theme('public', null, 'Themer'),
            'assets' => theme('assets', null, 'Themer'),
            'views'  => theme('views', null, 'Themer'),
        ];

        $this->assertTrue($this->files->exists(theme('public', null, 'Themer')));
        $this->assertTrue($this->files->exists(theme('public', 'css', 'Themer')));
        $this->assertTrue($this->files->exists(theme('public', 'js', 'Themer')));
        $this->assertTrue($this->files->exists(theme('public', 'images', 'Themer')));
        $this->assertTrue($this->files->exists(theme('public', 'fonts', 'Themer')));
        $this->assertTrue($this->files->exists(theme('public', 'files', 'Themer')));

        $this->assertTrue($this->files->exists(theme('assets', null, 'Themer')));
        $this->assertTrue($this->files->exists(theme('assets', 'css', 'Themer')));
        $this->assertTrue($this->files->exists(theme('assets', 'js', 'Themer')));
        $this->assertTrue($this->files->exists(theme('assets', 'images', 'Themer')));
        $this->assertTrue($this->files->exists(theme('assets', 'fonts', 'Themer')));
        $this->assertTrue($this->files->exists(theme('assets', 'files', 'Themer')));

        $this->assertTrue($this->files->exists(theme('views', null, 'Themer')));
        $this->assertTrue($this->files->exists(theme('views', 'layouts', 'Themer')));
        $this->assertTrue($this->files->exists(theme('views', 'components', 'Themer')));

        $this->assertTrue($this->files->isDirectory(theme('public', null, 'Themer')));
        $this->assertTrue($this->files->isDirectory(theme('assets', null, 'Themer')));
        $this->assertTrue($this->files->isDirectory(theme('views', null, 'Themer')));

        $this->files->deleteDirectory(theme('public', null, 'Themer'));
        $this->files->deleteDirectory(theme('assets', null, 'Themer'));
        $this->files->deleteDirectory(theme('views', null, 'Themer'));

        $this->assertTrue(! $this->files->exists(theme('public', null, 'Themer')));
        $this->assertTrue(! $this->files->exists(theme('assets', null, 'Themer')));
        $this->assertTrue(! $this->files->exists(theme('views', null, 'Themer')));
    }
}
