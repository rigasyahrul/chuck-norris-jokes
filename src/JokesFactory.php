<?php

namespace Rigasyahrul\ChuckNorrisJokes;

class JokesFactory
{
    protected $jokes = [
        'Chuck Norris doesn’t read books. He stares them down until he gets the information he wants.',
        'Chuck Norris breathes air … five times a day.',
        'Time waits for no man. Unless that man is Chuck Norris.',
        'Chuck Norris drinks napalm to fight his heartburn.',
        '',
    ];

    public function __construct(array $jokes = null)
    {
        if ($jokes) {
            $this->jokes = $jokes;
        }
    }

    public function getRandomJoke()
    {
        return $this->jokes[array_rand($this->jokes)];
    }
}
