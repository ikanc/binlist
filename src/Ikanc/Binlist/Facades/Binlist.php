<?php namespace Ikanc\Binlist\Facades;

use Illuminate\Support\Facades\Facade;

class Binlist extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'binlist'; }

}