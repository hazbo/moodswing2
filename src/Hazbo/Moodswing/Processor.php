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

namespace Hazbo\Moodswing;

class Processor implements ProcessorInterface
{
    /**
     * RESOURCE LOADER AND REGISTRY
     * @var Object
     * @var Object
     */
    private
        $registry,
        $resourcesLoader;

    /**
     * - constructor
     * CREATES A RESOURCE LOADER
     * OBJECT
     * @return null
     */
    public function __construct()
    {
        $this->registry        = new Registry_Moods();
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