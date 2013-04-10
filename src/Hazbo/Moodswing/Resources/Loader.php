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

class Resources_Loader
{
    /**
     * STORES THE PATH FOR JSON
     * DATA FILE AND MOODS AS
     * ARRAY
     * @var String
     * @var Array
     */
    private
        $defaultDataPath,
        $moods;

    private function parseFileContents($dataFilePath)
    {
        return json_decode(file_get_contents($dataFilePath), true);
    }

    /**
     * - applyMoodsRegistry
     * GETS ALL MOODS FROM
     * REGISTRY AND STORES
     * THEM IN MOODS PROPERTY
     * @param Object
     * @return Bool
     */
    private function applyMoodsRegistry(Registry_Moods $registry)
    {
        return $this->moods = $registry->getMoods();
    }

    /**
     * - checkMoodExists
     * CHECKS TO SEE IF THE MOOD
     * ACTUALLY EXISTS
     * @param String
     * @param String
     * @return Array/String
     */
    private function checkMoodExists($moodName, $format)
    {
        $moodName = strtolower($moodName);

        $moods = $this->parseFileContents($this->defaultDataPath);
        if (isset($moods[$moodName])) {
            if (!is_null($format)) {
                return $moods[$moodName][$format];
            }
            return $moods[$moodName];
        }
        throw new \Exception('Mood does not exist in directory');
        return false;
    }

    /**
     * - constructor
     * SETS A DEFAULT FOR DATA
     * PATH
     * @return null
     */
    public function __construct()
    {
        $this->defaultDataPath = __DIR__ . '/../Assets/MoodData.json';
    }

    /**
     * - setDefaultDataPath
     * SETS THE DEFAULT PATH
     * FOR JSON DATA FILE
     * @param String
     * @return Bool
     */
    public function setDefaultDataPath($newDefaultDataPath)
    {
        return $this->defaultDataPath = $newDefaultDataPath;
    }

    /**
     * - getDefaultDataPath
     * GETS THE DEFAULT PATH
     * FOR JSON DATA FILE
     * @return String
     */
    public function getDefaultDataPath()
    {
        return $this->defaultDataPath;
    }

    /**
     * - loadDefaultData
     * LOADS IN THE DEFAULT DATA
     * FILE AND PULLS BACK BY A
     * GIVEN KEY(S)
     * @param String
     * @param String/NULL
     * @return Array/String/NULL
     */
    public function loadDefaultData($moodName, $format = NULL, Registry_Moods $registry)
    {
        $this->applyMoodsRegistry($registry);

        if (!empty($this->moods)) {
            if (in_array($moodName, $this->moods)) {
                return $this->checkMoodExists($moodName, $format);
            } else {
                throw new \Exception('Using registry; Mood does not exist in registry');
                return false;
            }
        }
        return $this->checkMoodExists($moodName, $format);
    }

    /**
     * - loadAllData
     * LOADS IN ALL DATA FROM
     * THE DIRECTORY
     * @return Array
     */
    public function loadAllData()
    {
        return $this->parseFileContents($this->defaultDataPath);
    }
}