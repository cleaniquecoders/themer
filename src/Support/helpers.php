<?php


if (! function_exists('theme')) {
    /**
     * Theme helper - to get path to public, assets or views.
     *
     * @param string $target can be directory, file or any assets
     * @param string $type   Type of theme - public, assets, views or url
     * @param string $theme  Theme name
     *
     * @return string A full path to public, assets, views or url
     */
    function theme($type, $target = null, $theme = null)
    {
        if (empty($theme)) {
            $theme = session('themer', 'default');
        }

        $path = $theme . '/' . $target;

        switch ($type) {
            case 'assets':
                return resource_path('assets/themes/' . $path);
                break;
            case 'views':
                return resource_path('views/vendor/themes/' . $path);
                break;
            case 'url':
                return url('themes/' . $path);
                break;
            case 'dot':
                return 'vendor.themes.' . str_replace('/', '.', $path);
                break;
            default:
                return public_path('themes/' . $path);
                break;
        }
    }
}
