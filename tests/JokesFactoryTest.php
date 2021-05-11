<?php

namespace Rigasyahrul\ChuckNorrisJokes\Tests;

use PHPUnit\Framework\TestCase;
use Rigasyahrul\ChuckNorrisJokes\JokesFactory;

class JokesFactoryTest extends TestCase
{
    /** @test */
    public function it_returns_a_random_joke()
    {
        $jokes = new JokesFactory([
            'This is a joke',
        ]);
        $joke = $jokes->getRandomJoke();

        $this->assertSame('This is a joke', $joke);
    }

    /** @test */
    public function it_returns_a_predefined_joke()
    {
        $chuckNorrisJokes = [
            'Chuck Norris doesn’t read books. He stares them down until he gets the information he wants.',
            'Chuck Norris breathes air … five times a day.',
            'Time waits for no man. Unless that man is Chuck Norris.',
            'Chuck Norris drinks napalm to fight his heartburn.',
        ];

        $jokes = new JokesFactory();
        $joke = $jokes->getRandomJoke();

        $this->assertContains($joke, $chuckNorrisJokes);
    }
}
