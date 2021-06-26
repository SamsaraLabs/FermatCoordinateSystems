<?php
namespace Samsara\Fermat\Values;

use PHPUnit\Framework\TestCase;
use Samsara\Fermat\Values\Geometry\CoordinateSystems\CartesianCoordinate;

/**
 * @runTestsInSeparateProcesses
 * @preserveGlobalState disabled
 */
class CartesianCoordinateTest extends TestCase
{

    /**
     * @Medium
     */
    public function testGetAxis()
    {
        $coord1 = new CartesianCoordinate(
            new ImmutableDecimal(1),
            new ImmutableDecimal(2)
        );

        $this->assertEquals('1', $coord1->getAxis(0)->getValue());
        $this->assertEquals('2', $coord1->getAxis('y')->getValue());

        $coord2 = new CartesianCoordinate(
            new ImmutableDecimal(1),
            new ImmutableDecimal(2),
            new ImmutableDecimal(5)
        );

        $this->assertEquals('1', $coord2->getAxis('x')->getValue());
        $this->assertEquals('2', $coord2->getAxis(1)->getValue());
        $this->assertEquals('5', $coord2->getAxis('z')->getValue());

        $coord3 = new CartesianCoordinate(
            new ImmutableDecimal(1),
            null,
            new ImmutableDecimal(2)
        );

        $this->assertEquals('1', $coord3->getAxis('x')->getValue());
        $this->assertEquals('2', $coord3->getAxis('y')->getValue());
        $this->assertEquals('0', $coord3->getAxis(2)->getValue());
    }

}