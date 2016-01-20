<?php

namespace SP\Phpunit;

/**
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2016, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
interface FailureActionInterface
{
    /**
     * @return callable[]
     */
    public function getFailureActions();
}
