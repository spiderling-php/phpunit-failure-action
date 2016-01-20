<?php

namespace SP\Phpunit\Test;

use PHPUnit_Framework_TestCase;
use SP\Phpunit\FailureActionInterface;
use SP\Phpunit\FailureActionTrait;
use SP\Phpunit\FailureActionListener;
use PHPUnit_Framework_AssertionFailedError;

/**
 * @coversDefaultClass SP\Phpunit\FailureActionListener
 */
class FailureActionListenerTest extends PHPUnit_Framework_TestCase implements FailureActionInterface
{
    use FailureActionTrait;

    /**
     * @covers ::addFailure
     */
    public function testAddFailure()
    {
        $executed = false;

        $this->addFailureAction(function ($filename) use (& $executed) {
            $executed = true;
            $this->assertEquals('SP_Phpunit_Test_FailureActionListenerTest::testAddFailure', $filename);
        });

        $listener = new FailureActionListener();

        try {
            $this->fail();
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $listener->addFailure($this, $e, 1000);
        }

        $this->assertTrue($executed);
    }

    /**
     * @covers ::getUniqueName
     */
    public function testGetUniqueName()
    {
        $listener = new FailureActionListener();

        $this->assertEquals(
            'SP_Phpunit_Test_FailureActionListenerTest::testGetUniqueName',
            $listener->getUniqueName($this),
            'Should be able to generate unique name from the test'
        );
    }
}
