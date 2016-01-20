<?php

namespace SP\Phpunit\Test;

use PHPUnit_Framework_TestCase;
use SP\Phpunit\FailureActionTrait;

/**
 * @coversDefaultClass SP\Phpunit\FailureActionTrait
 */
class FailureActionTraitTest extends PHPUnit_Framework_TestCase
{
    use FailureActionTrait;

    /**
     * @covers ::addFailureAction
     * @covers ::getFailureActions
     */
    public function testFailureActions()
    {
        $actions = [
            function () {
                return 1;
            },
            function () {
                return 2;
            },
        ];

        $this->addFailureAction($actions[0]);
        $this->addFailureAction($actions[1]);

        $this->assertSame($actions, $this->getFailureActions());
    }
}
