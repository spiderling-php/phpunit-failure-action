<?php

namespace SP\Phpunit;

/**
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2016, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
trait FailureActionTrait
{
    /**
     * @var callable[]
     */
    private $failureActions = [];

    /**
     * @param callable $callback
     */
    public function addFailureAction(callable $callback)
    {
        $this->failureActions []= $callback;

        return $this;
    }

    /**
     * @return callable[]
     */
    public function getFailureActions()
    {
        return $this->failureActions;
    }
}
