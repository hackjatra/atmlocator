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

        // YIPL coordinates
        $testLat = 27.67497;
        $testLong = 85.31636;

        // the default datbase contains NIBL, which is 0.59 km away from yipl coordinates
        $atmRowset = $atmTbl->proximitySearch($testLat, $testLong, 0.6, 'k');

        $pass = false;

        foreach ($atmRowset as $row) {
            print $row['bank_id'] . "\n";
            if ($row['descriptive_location'] == 'Pulchowk, Opposite to UN Office') {
                $pass = true;
                break;
            }
        }

        $this->assertTrue($pass, 'Asserting we found NIBL ATM');
        
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
