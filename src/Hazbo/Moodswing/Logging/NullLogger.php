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

use Psr\Log\LoggerInterface;

class Logging_NullLogger implements LoggerInterface
{
	public function emergency($message, array $context = array()) {}

	public function alert($message, array $context = array()) {}

	public function critical($message, array $context = array()) {}

	public function error($message, array $context = array()) {}

	public function warning($message, array $context = array()) {}

	public function notice($message, array $context = array()) {}

	public function info($message, array $context = array()) {}

	public function debug($message, array $context = array()) {}
	
	public function log($level, $message, array $context = array()) {}
}