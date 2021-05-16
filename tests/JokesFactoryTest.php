<?php

namespace Rigasyahrul\ChuckNorrisJokes\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Rigasyahrul\ChuckNorrisJokes\JokesFactory;

class JokesFactoryTest extends TestCase
{
    /** @test */
    public function it_returns_a_random_joke()
    {
        // Create a mock and queue two responses.
        $mock = new MockHandler([
            new Response(200, [], '{ "type": "success", "value": { "id": 72, "joke": "How much wood would a woodchuck chuck if a woodchuck could Chuck Norris? All of it.", "categories": [] } }'),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $jokes = new JokesFactory($client);

        $joke = $jokes->getRandomJoke();

        $this->assertSame('How much wood would a woodchuck chuck if a woodchuck could Chuck Norris? All of it.', $joke);
    }
}
