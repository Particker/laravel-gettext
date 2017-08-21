<?php
namespace Particker\LaravelGettext;
use Illuminate\Support\Facades\Facade as PFacade;
class Facade extends PFacade
{
    /**
     * Name of the binding in the IoC container
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'gettext';
    }
}