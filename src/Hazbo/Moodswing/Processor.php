<?php namespace Hazbo\Moodswing;

/**
 * A SIMPLE / SMALL DEPENDENCY INJECTION
 * CONTAINER FOR PHP 5.3.0 + 5.4.0
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

class Processor implements ProcessorInterface
{
	/**
	 * ONLY NEED TO STORE RESOURCE
	 * LOADER IN HERE, FOR NOW
	 * @var Object
	 */
	private $registry;
	private $resourcesLoader;

	/**
	 * - constructor
	 * CREATES A RESOURCE LOADER
	 * OBJECT
	 * @return null
	 */
	public function __construct()
	{
		$this->registry 	   = new Registry_Moods();
		$this->resourcesLoader = new Resources_Loader();
	}

	/**
	 * - getColourFor
	 * ALLOWS MOOD TO BE PASSED
	 * THROUGH AND WILL RETURN
	 * DATA ABOUT THE COLOUR
	 * @param String
	 * @param String
	 * @return Array
	 */
	public function getColourFor($moodName, $format = NULL)
	{
		return $this->resourcesLoader->loadDefaultData($moodName, $format, $this->registry);
	}

	/**
	 * - getColorFor
	 * FOR THE AMERICANS
	 * @param String
	 * @param String
	 * @return Array
	 */
	public function getColorFor($moodName, $format = NULL)
	{
		return $this->getColourFor($moodName, $format);
	}

	/**
	 * - getAllMoods
	 * RETURNS ALL POSSIBLE MOODS
	 * EITHER FROM REGISTRY OR
	 * FROM THE DIRECTORY
	 * @return Array
	 */
	public function getAllMoods()
	{
		$moods = $this->registry->getMoods();
		if (!empty($moods)) {
			return $moods;
		}
		return $this->resourcesLoader->loadAllData();
	}

	/**
	 * - register
	 * ADDS MOOD TO REGISTER
	 * @param Array
	 * @return Bool
	 */
	public function register($moods = array())
	{
		return $this->registry->register($moods);
	}
}

?>