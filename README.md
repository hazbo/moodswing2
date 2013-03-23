# Moodswing 2

The general idea behind moodswing is to simply allow the developer
to 'pass' through a mood as a string i.e. `happy` and for it to
return either the name of a colour, as a string, or the hex for that
colour, that psychologically best represents that mood. Pretty straight
forward.

  PSR-0
  PSR-1
  PSR-2

## Usage

	use Hazbo\Moodswing;

	$moodswing = new Moodswing\Processor();
	$moodswing->getColourFor('happy');

Given that the colour data has been
added to the JSON file, the example above will return something like:

	array(2) {
	  ["colour"]=>
	  string(4) "pink"
	  ["hex"]=>
	  string(7) "#32fa1b"
	}

If we just need the hex, or the colour, we could
do something like this:

	$moodswing->getColourFor('happy', 'colour');

Or:

    $moodswing->getColourFor('happy', 'hex');

And it will return a string for us. If you'd like to only use a few select moods for all functionality, you can use the register.

    $moodswing->register(array(
        'happy', 'sad', 'chipper'
    ));

Doing this will only allow you to use those three moods for whatever it is you want to do. Want to get all moods?

    $moodswing->getAllMoods();

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