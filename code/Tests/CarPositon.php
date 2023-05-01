<?php
/**
 * A class to test car positions
 *
 * @author Tuulia <tuulia@tuulia.nl>
 */
//namespace Tests;

require_once __DIR__ . '/Test.php';

use Lib\Models\CarPosition;

class CarPositon extends Test
{
    /**
     * Test initialize
     */
    public function testInitialize(): void
    {
        $expectedXpos = 23;
        $expectedYpos = 56;
        $expectedDir = 'S';

        $carPosition = new CarPosition(
            $expectedXpos,
            $expectedYpos,
            $expectedDir
        );

        $this->assertEquals($expectedXpos, $carPosition->getX());
        $this->assertEquals($expectedYpos, $carPosition->getY());
        $this->assertEquals($expectedDir, $carPosition->getDir());
    }


    /**
     * Test turn
     */
    public function testTurn(): void
    {
        $cases = [

            'Turn right' => [
                'initialPos' => (object)['x' => 45, 'y' => 34, 'dir' => 'N'],
                'turn' => ['R'],
                'expectedDirection' => 'E'
            ],

            'Turn left' => [
                'initialPos' => (object)['x' => 45, 'y' => 34, 'dir' => 'S'],
                'turn' => ['L'],
                'expectedDirection' => 'E'
            ],

            'Turn left in position north' => [
                'initialPos' => (object)['x' => 45, 'y' => 34, 'dir' => 'N'],
                'turn' => ['L'],
                'expectedDirection' => 'W'
            ],

            'Turn 2 times right left in position west' => [
                'initialPos' => (object)['x' => 45, 'y' => 34, 'dir' => 'W'],
                'turn' => ['R', 'R'],
                'expectedDirection' => 'E'
            ],
        ];

        foreach ($cases as $label => $case) {
            if (isset($carPosition)) {
                unset($carPosition);
            }

            $carPosition = new CarPosition(
                $case['initialPos']->x,
                $case['initialPos']->y,
                $case['initialPos']->dir
            );

            foreach ($case['turn'] as $turn) {
                $carPosition->turn($turn);
            }

            $this->assertEquals(
                $case['expectedDirection'],
                $carPosition->getDir(),
                $label
            );
        }
    }
}
