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

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Processor implements ProcessorInterface, Logging_LogEnablerInterface
{
    /**
     * RESOURCE LOADER AND REGISTRY
     * @var Object
     * @var Object
     * @var Object
     * @var String
     */
    private
        $registry,
        $resourcesLoader,
        $logger,
        $loggerPath;

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
        $this->logger          = new Logging_NullLogger();
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
        $this->logger->info('Getting colour for ' . $moodName);
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
        $this->logger->info('Fetching all moods');
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
        $this->logger->info('Registering moods: ' . implode(', ', $moods));
        return $this->registry->register($moods);
    }


    /**
     * - enableLogger
     * ENABLES THE LOGGER
     * @return null
     */
    public function enableLogging()
    {
        $this->logger     = new Logger('moodswing');
        $this->loggerPath = __DIR__ . '/../../../logs/moodswing.log';

        $this->logger->pushHandler(new StreamHandler($this->loggerPath, Logger::INFO));
    }

    /**
     * - setLoggerPath
     * SETS THE PATH FOR THE LOGGER
     * @param String
     * @return Bool
     */
    public function setLoggerPath($newLoggerPath)
    {
        return $this->loggerPath = $newLoggerPath;
    }
}