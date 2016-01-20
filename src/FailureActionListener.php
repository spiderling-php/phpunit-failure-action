<?php

namespace SP\Phpunit;

use PHPUnit_Framework_BaseTestListener;
use PHPUnit_Framework_Test;
use PHPUnit_Framework_AssertionFailedError;

/**
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2016, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class FailureActionListener extends PHPUnit_Framework_BaseTestListener
{
    /**
     * @param PHPUnit_Framework_Test                 $test
     * @param PHPUnit_Framework_AssertionFailedError $eception
     * @param string                                 $time
     */
    public function addFailure(
        PHPUnit_Framework_Test $test,
        PHPUnit_Framework_AssertionFailedError $eception,
        $time
    ) {
        if ($test instanceof FailureActionInterface) {
            foreach ($test->getFailureActions() as $callback) {
                call_user_func($callback, $this->getUniqueName($test));
            }
        }
    }

    /**
     * @param  PHPUnit_Framework_Test $test
     * @return string
     */
    public function getUniqueName(PHPUnit_Framework_Test $test)
    {
        return str_replace('\\', '_', get_class($test)).'::'.$test->getName();
    }
}
