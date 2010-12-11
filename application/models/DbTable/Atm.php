<?php

/**
 * This is the DbTable class for the Atm table.
 */
class App_Model_DbTable_Atm extends App_Model_DbTable_DbTableAbstract
{

    /** Table name */
    protected $_name = 'atm';
    protected $_dependentTables = array('App_Model_DbTable_Rating');
    protected $_referenceMap = array(
        'atm_network' => array(
            'columns' => 'atm_network_id',
            'refTableClass' => 'App_Model_DbTable_AtmNetwork',
            'refColumns' => 'id'),
        'bank' => array(
            'columns' => 'bank_id',
            'refTableClass' => 'App_Model_DbTable_Bank',
            'refColumns' => 'id')
    );

    public function proximitySearch($latitude, $longitude, $distance=25, $unit='k')
    {
        /*
         * distance unit
         */
        switch ($unit) {
            /*
             * miles
             */
            case 'm':
                $unit = 3963;
                break;
            /*
             * nautical miles
             */
            case 'n':
                $unit = 3444;
                break;

            /*
             * kilometers
             */
            default:
                $unit = 6371;
        }


        $sql = "SELECT bank_id, descriptive_location, ($unit * ACOS( COS( RADIANS($latitude) ) * COS( RADIANS( latitude ) ) *
        COS( RADIANS( longitude ) - RADIANS($longitude) ) + SIN( RADIANS($latitude) ) * SIN( RADIANS( latitude ) ) ) )
        AS distance FROM atm
        HAVING distance < $distance ORDER BY distance";

        $db = $this->getAdapter();
        $row = $db->query($sql);

        $result = $row->fetchAll();

        return $result;
    }

    public function calculateDistance($lat_from, $long_from, $lat_to, $long_to, $unit='k')
    {
        switch ($unit):
           // miles
            case 'm':
                $unit = 3963;
                break;
            // nautical miles
            case 'n':
                $unit = 3444;
                break;
            // kilometers
            default:
                $unit = 6371;
        endswitch;

        $degreeRadius = deg2rad(1);

        $lat_from *= $degreeRadius;
        $long_from *= $degreeRadius;
        $lat_to *= $degreeRadius;
        $long_to *= $degreeRadius;

        // apply the Great Circle Distance Formula
        $dist = sin($lat_from) * sin($lat_to) + cos($lat_from)
            * cos($lat_to) * cos($long_from - $long_to);

        // radius of earth * arc cosine
        return ($unit * acos($dist));
    }
}

