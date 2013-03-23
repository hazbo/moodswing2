<?php namespace Hazbo\Moodswing;

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

class Registry_Moods
{
	/**
	 * STORES MOODS AS AN ARRAY
	 * @var Array
	 */
	private $moods;

	/**
	 * - constructor
	 * SETS MOODS PROPERTY TO
	 * AN EMPTY ARRAY
	 * @return null
	 */
	public function __construct()
	{
		$this->moods = array();
	}

	/**
	 * - register
	 * APPENDS EACH MOOD TO THE
	 * MOODS PROPERTY
	 * @param Array
	 * @return Bool
	 */
	public function register($moods = array())
	{
		foreach ($moods as $mood) {
			$this->moods[] = strtolower($mood);
		}
		return true;
	}

	/**
	 * - getMoods
	 * RETURNS ALL MOODS
	 * @return Array
	 */
	public function getMoods()
	{
		return $this->moods;
	}
}