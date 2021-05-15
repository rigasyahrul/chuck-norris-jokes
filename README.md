# chuck-norris-jokes
Create your Chuck Norris Jokes

## Installation

Require the packages using composer:

```bash
composer require rigasyahrul/chuck-norris-jokes
```

## Usage

```php
use Rigasyahrul\ChuckNorrisJokes\JokesFactory;

$jokes = new JokesFactory();

$joke = $jokes->getRandomJoke();
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](./LICENSE.md)
