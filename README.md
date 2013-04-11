# Moodswing 2

[![Build Status](https://travis-ci.org/hazbo/moodswing2.png)](https://travis-ci.org/hazbo/moodswing2)

The general idea behind moodswing is to simply allow the developer
to 'pass' through a mood as a string i.e. `happy` and for it to
return either the name of a colour, as a string, or the hex for that
colour, that psychologically best represents that mood. Pretty straight
forward.

  - PSR-0
  - PSR-1
  - PSR-2
  - PSR-3

## Installation
Add `hazbo/moodswing` to your composer.json file

    {
        "require" : {
            "hazbo/moodswing" : "dev-master"
        }
    }
Then run: `php composer.phar install`
or `update`

## Usage

	use Hazbo\Moodswing;

	$moodswing = new Moodswing\Processor();
	$moodswing->getColourFor('happy');

Given that the colour data has been
added to the JSON file, the example above will return something like:

	array(2) {
	  ["colour"]=>
	  string(4) "COLOUR"
	  ["hex"]=>
	  string(7) "HEX"
	}

If we just need the hex, or the colour, we could
do something like this:

	$moodswing->getColourFor('happy', Moodswing::COLOUR);

Or:

    $moodswing->getColourFor('happy', Moodswing::HEX);

And it will return a string for us. If you'd like to only use a few select moods for all functionality, you can use the register.

    $moodswing->register(array(
        'happy', 'sad', 'chipper'
    ));

Doing this will only allow you to use those three moods for whatever it is you want to do. Want to get all moods?

    $moodswing->getAllMoods();

### Logging

Moodswing implements the PSR-3 `LoggerInterface`. If you'd like to enable logging, you can do so like this:

    $moodswing->setLogger($logger);

A full worknig example, using Monolog, could look like this:

    <?php

    require_once('../vendor/autoload.php');

    use Monolog\Logger;
    use Monolog\Handler\StreamHandler;
    use Hazbo\Moodswing\Processor as Moodswing;

    $logger = new Logger('moodswing');
    $logger->pushHandler(new StreamHandler(__DIR__ . '/moodswing.log', Logger::INFO));

    $moodswing = new Moodswing();
    $moodswing->setLogger($logger);

    $moodswing->getColourFor('accepted', 'hex');

### Todo

  - Need to actually use real data in the JSON file!

### Tests
Ant

    $ cd /path/to/moodswing2
    $ ant

PHPUnit

    $ cd /path/to/moodswing2
    $ phpunit tests

## Available Moods (default)

    Accepted
    Accomplished
    Aggravated
    Alone
    Amused
    Angry
    Annoyed
    Anxious
    Apathetic
    Ashamed
    Awake
    Bewildered
    Bitchy
    Bittersweet
    Blah
    Blank
    Blissful
    Bored
    Bouncy
    Calm
    Cheerful
    Chipper
    Cold
    Complacent
    Confused
    Content
    Cranky
    Crappy
    Crazy
    Crushed
    Curious
    Cynical
    Dark
    Depressed
    Determined
    Devious
    Dirty
    Disappointed
    Discontent
    Ditzy
    Dorky
    Drained
    Drunk
    Ecstatic
    Energetic
    Enraged
    Enthralled
    Envious
    Exanimate
    Excited
    Exhausted
    Flirty
    Frustrated
    Full
    Geeky
    Giddy
    Giggly
    Gloomy
    Good
    Grateful
    Groggy
    Grumpy
    Guilty
    Happy
    High
    Hopeful
    Hot
    Hungry
    Hyper
    Impressed
    Indescribable
    Indifferent
    Infuriated
    Irate
    Irritated
    Jealous
    Jubilant
    Lazy
    Lethargic
    Listless
    Lonely
    Loved
    Mad
    Melancholy
    Mellow
    Mischievous
    Moody
    Morose
    Naughty
    Nerdy
    Not Specified
    Numb
    Okay
    Optimistic
    Peaceful
    Pessimistic
    Pissed off
    Pleased
    Predatory
    Quixotic
    Recumbent
    Refreshed
    Rejected
    Rejuvenated
    Relaxed
    Relieved
    Restless
    Rushed
    Sad
    Satisfied
    Shocked
    Sick
    Silly
    Sleepy
    Smart
    Stressed
    Surprised
    Sympathetic
    Thankful
    Tired
    Touched
    Uncomfortable
    Weird