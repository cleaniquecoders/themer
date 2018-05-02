<?php

namespace CleaniqueCoders\Themer\Tests;

class ThemerHelperTest extends TestCase
{
    /** @test */
    public function it_has_theme_helper()
    {
        $this->assertTrue(function_exists('theme'));
    }

    /** @test */
    public function it_generate_default_correct_theme_paths_with_theme_helper()
    {
        $default = [
            'public' => theme('public', null, null),
            'assets' => theme('assets', null, null),
            'views'  => theme('views', null, null),
            'url'    => theme('url', null, null),
        ];

        $this->assertContains('public/themes/default', $default['public']);
        $this->assertContains('resources/assets/themes/default', $default['assets']);
        $this->assertContains('resources/views/vendor/themes/default', $default['views']);
        $this->assertContains('themes/default', $default['url']);
    }

    /** @test */
    public function it_generate_custom_correct_theme_paths_with_theme_helper()
    {
        $default = [
            'public' => theme('public', null, 'testbench'),
            'assets' => theme('assets', null, 'testbench'),
            'views'  => theme('views', null, 'testbench'),
            'url'    => theme('url', null, 'testbench'),
        ];

        $this->assertContains('public/themes/testbench', $default['public']);
        $this->assertContains('resources/assets/themes/testbench', $default['assets']);
        $this->assertContains('resources/views/vendor/themes/testbench', $default['views']);
        $this->assertContains('themes/testbench', $default['url']);
    }

    /** @test */
    public function it_generate_correct_theme_target_paths_with_theme_helper()
    {
        $default = [
            'public' => theme('public', 'file.txt', null),
            'assets' => theme('assets', 'file.txt', null),
            'views'  => theme('views', 'file.txt', null),
            'url'    => theme('url', 'file.txt', null),
        ];

        $this->assertContains('public/themes/default/file.txt', $default['public']);
        $this->assertContains('resources/assets/themes/default/file.txt', $default['assets']);
        $this->assertContains('resources/views/vendor/themes/default/file.txt', $default['views']);
        $this->assertContains('themes/default/file.txt', $default['url']);
    }
}
