<?php
return array(
    /*
     |--------------------------------------------------------------------------
     | Available locales
     |--------------------------------------------------------------------------
     |
     | A array list with available locales to load
     |
     | Default locale will the first in array list
     |
     */
    'locales' => 'zh_CN',
    /*
     |--------------------------------------------------------------------------
     | Directories to scan
     |--------------------------------------------------------------------------
     |
     | Set directories to scan to find gettext strings (starting with __)
     |
     */
    'directories' => storage_path('language'),
    /*
     |--------------------------------------------------------------------------
     | Store files as domain name
     |--------------------------------------------------------------------------
     |
     | Full path is $storage/xx_XX/LC_MESSAGES/$domain.XX
     |
     */
    'domain' => 'default',
    /*
     |--------------------------------------------------------------------------
     | Use PHP native gettext functions
     |--------------------------------------------------------------------------
     |
     | Are faster than open files from PHP. If you have enabled the php-gettext
     | module, is recommended to enable.
     |
     */
    'charset' => "UTF-8"
);