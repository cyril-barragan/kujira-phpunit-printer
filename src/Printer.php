<?php

/*
 * This file is part of the kujira-phpunit-printer.
 *
 * (c) Cyril Barragan <cyril.barragan@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kujira\PHPUnit;

/**
 * Kujira Result printer
 *
 * It overrides the defaults printer, displaying cross red mark
 * for the failing tests and a green check mark for the passing ones.
 *
 * @author Cyril Barragan <cyril.barragan@gmail.com>
 * @package kujira-phpunit-printer
 */
class Printer extends \PHPUnit_TextUI_ResultPrinter
{
    protected $className;
    protected $previousClassName;

    public function __construct($out = NULL, $verbose = FALSE, $colors = FALSE, $debug = FALSE)
    {
        ob_start();
        $this->autoFlush = true;
        parent::__construct($out, $verbose, $colors, $debug);
    }

    /**
     * {@inheritdoc}
     */
    protected function writeProgress($progress)
    {
        if ($this->debug) {
            return parent::writeProgress($progress);
        }

        if ($this->previousClassName !== $this->className) {
            echo "\n";
            echo $this->className;
            $this->previousClassName = $this->className;
        }

        switch ($progress) {
            case '.':
                $output = "\033[01;32m".mb_convert_encoding("\x27\x14", 'UTF-8', 'UTF-16BE')."\033[0m";
                break;
            case 'F':
                $output = "\033[01;31m".mb_convert_encoding("\x27\x16", 'UTF-8', 'UTF-16BE')."\033[0m";
                break;
            default:
                $output = $progress;
        }

        echo " $output";
    }

    /**
     * {@inheritdoc}
     */
    public function startTest(\PHPUnit_Framework_Test $test)
    {
        $this->className = get_class($test);
        parent::startTest($test);
    }
}
