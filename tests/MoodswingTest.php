<?php

/**
 * MOODSWING 2
 * A PROJECT THAT TURNS MOODS
 * TO COLOURS
 * 
 * FEEL FREE TO USE / MODIFY ANY OF THIS
 * CODE FOR YOUR OWN PROJECTS
 * OPEN SOURCE / COMMERCIAL
 *
 * @author Harry Lawrence
 * @copyright Hazbo
 * @package Moodswing
 * @version 1.0-DEV
 * @license The MIT License (MIT)
*/

require_once(__DIR__ . '/../src/Hazbo/Moodswing/ProcessorInterface.php');
require_once(__DIR__ . '/../src/Hazbo/Moodswing/Processor.php');
require_once(__DIR__ . '/../src/Hazbo/Moodswing/Registry/Moods.php');
require_once(__DIR__ . '/../src/Hazbo/Moodswing/Resources/Loader.php');

use Hazbo\Moodswing;

class MoodswingTest extends PHPUnit_Framework_TestCase
{
	private $community;

	/**
	 * - setUp
	 * CREATES A NEW MOODSWING OBJECT
	 */
	public function setUp()
	{
		$this->moodswing = new Moodswing\Processor();
	}

	/**
	 * @covers Hazbo\Moodswing\Processor::getColourFor
	 */
	public function testGetColourForAsArray()
	{
		$result = $this->moodswing->getColourFor('happy');
		$this->assertEquals(2, sizeof($result));
	}

	/**
	 * @covers Hazbo\Moodswing\Processor::getColourFor
	 */
	public function testGetColourForAsColourString()
	{
		$result = $this->moodswing->getColourFor('happy', 'colour');
		$this->assertTrue(is_string($result));
	}

	/**
	 * @covers Hazbo\Moodswing\Processor::getColourFor
	 */
	public function testGetColourForAsHexString()
	{
		$result = $this->moodswing->getColourFor('happy', 'hex');
		$this->assertTrue(is_string($result));
	}

	/**
	 * @covers Hazbo\Moodswing\Processor::register
	 */
	public function testRegister()
	{
		$result = $this->moodswing->register(array('happy', 'sad'));
		$this->assertTrue($result);
	}

	/**
	 * @covers Hazbo\Moodswing\Processor::register
	 */
	public function testGetColourForAfterRegister()
	{
		$this->moodswing->register(array('happy', 'saf'));
		$result = $this->moodswing->getColourFor('happy');
		$this->assertEquals(2, sizeof($result));
	}
}