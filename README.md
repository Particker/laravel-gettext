Gettext for Laravel
=========
Get started
----
First of you need to publish the configuration
```php
php artisan config:publish particker/gettext
```

After your changes to the config, you can go ahead and add the service provider to the list of providers in app/config/app.php:
```php
'Particker\Gettext\GettextServiceProvider'
```

You might need to make sure that php can write to app/lang since that is the folder where the POT-files will be placed in. 

config the config/gettext.php args:
```php
'locales' => 'zh_CN',//语言
'directories' => storage_path('language'),//目录路径
'domain' => 'default',//语言域文件名称
'charset' => "UTF-8"//语言文件编码
```

//新增语言处理函数至 /app/helper.php
```php
if (!function_exists("__"))
{
    /**
     * __('Welcome back, :user', array(':user' => $username));
     *
     * @param   string  $string text to translate
     * @param   array   $values values to replace in the translated text
     * @param   string  $domain source
     * @return  string
     */
    function __($string, array $values = NULL, $domain = null)
    {
        $i18n=app('gettext');
        if ($domain!==null)
            $i18n->set_domain($domain);
        return $i18n->__($string,$values);
    }
}

//加入到启动文件中引入helper.php 自定义函数 /bootstrap/autoload.php
```php
$helperPath = __DIR__.'/../app/helper.php';
if (file_exists($helperPath)){
    require $helperPath;
}

//文件中正常使用
```php
__("hello world");//语言文件目录/zh_CN/LC_MESSAGES/default.po

Version
----
1.1
