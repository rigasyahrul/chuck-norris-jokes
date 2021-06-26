<?php

namespace Rigasyahrul\ChuckNorrisJokes\Tests;

use Illuminate\Support\Facades\Artisan;
use Orchestra\Testbench\TestCase;
use Rigasyahrul\ChuckNorrisJokes\ChuckNorrisJokesServiceProvider;
use Rigasyahrul\ChuckNorrisJokes\Console\ChuckNorrisJoke;
use Rigasyahrul\ChuckNorrisJokes\Facade\ChuckNorris;
use Rigasyahrul\ChuckNorrisJokes\Models\Joke;

class LaravelTest extends TestCase
{
    public function getPackageProviders($app)
    {
        return [
            ChuckNorrisJokesServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'ChuckNorris' => ChuckNorrisJoke::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        include_once __DIR__.'/../database/migrations/create_jokes_table.php.stub';

        (new \CreateJokesTable())->up();
    }

    /**
     * @test
     */
    public function the_console_command_returns_a_joke()
    {
        $this->withoutMockingConsoleOutput();

        ChuckNorris::shouldReceive('getRandomJoke')
            ->once()
            ->andReturn('a joke');

        $this->artisan('chuck-norris');

        $output = Artisan::output();

        $this->assertSame('a joke'.PHP_EOL, $output);
    }

    /**
     * @test
     */
    public function the_route_can_be_accessed()
    {
        ChuckNorris::shouldReceive('getRandomJoke')
            ->once()
            ->andReturn('a joke');

        $this->get('/chuck-norris')
            ->assertViewIs('chuck-norris::index')
            ->assertViewHas('joke', 'a joke')
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function it_can_access_database()
    {
        $joke = new Joke();
        $joke->name = 'this is funny';

        $joke->save();

        $addedJoke = $joke->find($joke->id);

        $this->assertSame($addedJoke->name, 'this is funny');
    }
}
