<?php

namespace Rigasyahrul\ChuckNorrisJokes\Http\Controllers;

use Rigasyahrul\ChuckNorrisJokes\Facade\ChuckNorris;

class ChuckNorrisController
{
    public function __invoke()
    {
//        ChuckNorris::shouldReceive('getRandomJoke')
//            ->once()
//            ->andReturn('a joke');

        //return ChuckNorris::getRandomJoke();
        return view('chuck-norris::index', [
            'joke' => ChuckNorris::getRandomJoke(),
        ]);
    }
}
