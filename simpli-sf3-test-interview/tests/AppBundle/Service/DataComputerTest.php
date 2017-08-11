<?php

namespace Tests\AppBundle\Service;

use Phpunit\Framework\TestCase;
use AppBundle\Service\DataComputer;

class DataComputerTest extends TestCase
{
    public function inputData()
    {
        return [
            [
                [[1, 1], [10, 11]],
                [2, 21],
                [false, true]
            ],
            [
                [[1, 2, 2], [8]],
                [5, 8],
                [true, false]
            ],
            [
                [[120, 3501], [0, 0]],
                [3621, 0],
                [true, false]
            ],
        ];
    }

    /**
     * @dataProvider inputData
     */
    public function testCompute(array $data, array $sums, array $odds)
    {
        $computer = new DataComputer($data);
        $result = $computer->compute();

        foreach ($data as $i => $row) {
            $this->assertEquals($data[$i], $result[$i]['items']);
            $this->assertEquals($sums[$i], $result[$i]['sum']);
            $this->assertEquals($odds[$i], $result[$i]['odd']);
        }
    }
}
