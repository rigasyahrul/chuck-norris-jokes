<?php

namespace Rigasyahrul\ChuckNorrisJokes\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * Class ChuckNorris
 * @package Rigasyahrul\ChuckNorrisJokes\Facade
 *
 * @see \Rigasyahrul\ChuckNorrisJokes\JokesFactory
 */
class ChuckNorris extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'chuck-norris';
    }
}
