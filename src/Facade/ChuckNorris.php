<?php

namespace Rigasyahrul\ChuckNorrisJokes\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * Class ChuckNorris.
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
