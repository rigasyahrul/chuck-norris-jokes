<?php


namespace Rigasyahrul\ChuckNorrisJokes\Console;


use Illuminate\Console\Command;
use Rigasyahrul\ChuckNorrisJokes\Facade\ChuckNorris;

class ChuckNorrisJoke extends Command
{
    protected $signature = 'chuck-norris';

    protected $description = 'Output a funny Chuck Norris Joke.';

    public function handle()
    {
        $this->info(ChuckNorris::getRandomJoke());
    }
}