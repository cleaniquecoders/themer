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
        $this->artisan('make:theme', ['name' => 'TestBench']);

        $this->assertTrue($this->files->exists(theme('public', null, 'test_bench')));
        $this->assertTrue($this->files->exists(theme('public', 'css', 'test_bench')));
        $this->assertTrue($this->files->exists(theme('public', 'js', 'test_bench')));
        $this->assertTrue($this->files->exists(theme('public', 'images', 'test_bench')));
        $this->assertTrue($this->files->exists(theme('public', 'fonts', 'test_bench')));
        $this->assertTrue($this->files->exists(theme('public', 'files', 'test_bench')));

        $this->assertTrue($this->files->exists(theme('assets', null, 'test_bench')));
        $this->assertTrue($this->files->exists(theme('assets', 'css', 'test_bench')));
        $this->assertTrue($this->files->exists(theme('assets', 'js', 'test_bench')));
        $this->assertTrue($this->files->exists(theme('assets', 'images', 'test_bench')));
        $this->assertTrue($this->files->exists(theme('assets', 'fonts', 'test_bench')));
        $this->assertTrue($this->files->exists(theme('assets', 'files', 'test_bench')));

        $this->assertTrue($this->files->exists(theme('views', null, 'test_bench')));
        $this->assertTrue($this->files->exists(theme('views', 'layouts', 'test_bench')));
        $this->assertTrue($this->files->exists(theme('views', 'components', 'test_bench')));

        $this->assertTrue($this->files->isDirectory(theme('public', null, 'test_bench')));
        $this->assertTrue($this->files->isDirectory(theme('assets', null, 'test_bench')));
        $this->assertTrue($this->files->isDirectory(theme('views', null, 'test_bench')));

        $this->files->deleteDirectory(theme('public', null, 'test_bench'));
        $this->files->deleteDirectory(theme('assets', null, 'test_bench'));
        $this->files->deleteDirectory(theme('views', null, 'test_bench'));

        $this->assertTrue(! $this->files->exists(theme('public', null, 'test_bench')));
        $this->assertTrue(! $this->files->exists(theme('assets', null, 'test_bench')));
        $this->assertTrue(! $this->files->exists(theme('views', null, 'test_bench')));
    }
}
