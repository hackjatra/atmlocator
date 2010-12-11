<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProximitysearchTest
 *
 * @author Bibek Shrestha <bibekshrestha@gmail.com>
 */
class App_Model_DbTable_AtmTest extends PHPUnit_Framework_TestCase
{
    public function testProximitySearch()
    {
        $atmTbl = new App_Model_DbTable_Atm();

        // sample points
    }

    public function testCalculateDistance()
    {
        // harihar bhawan un building atm
        $latStart = 27.68027;
        $longStart = 85.31589;

        // YIPL office
        $latEnd = 27.67497;
        $longEnd = 85.31636;

        $atmTbl = new App_Model_DbTable_Atm();
        $distance = $atmTbl->calculateDistance($latStart, $longStart, $latEnd, $longEnd);

        $expectedDistance = 0.591147617004;
        $this->assertTrue(0 == bccomp($expectedDistance, $distance, 9), 'Asserting distance between YIPL and UN Office');
        // Note assertEquals fails while comparing two float values
    }
}
