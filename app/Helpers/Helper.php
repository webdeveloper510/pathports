<?php

namespace App\Helpers;

class Helper
{

    /**
     * @param string $route
     * @param bool $isDropdown
     * @return mixed
     */
    public static function activeMenu(string $route, bool $isDropdown = false)
    {
        $menuText = $isDropdown ? 'show' : 'active';
        return request()->routeIs($route) ? $menuText : '';
    }
    //proprty type
    public static function propertyType($type = null, $valueSearchIn = 'key')
    {
        $propertyType = ["1" => "residential", "2" => "commercial", "3" => "both"];
        if ($type !== null) {
            if ($valueSearchIn == 'value') {
                $valueIndex = array_search($type, $propertyType);
                return $valueIndex; //return index
            }
            return $propertyType[$type];
        }
        return $propertyType;
    }

    //role list
    public function roles($type = null, $valueSearchIn = 'key')
    {
        $roles = ["1" => "admin", "2" => "user", "3=agent", "4" => "owner"]; //user and owner are same role
        if ($valueSearchIn == 'value') {
            $valueIndex = array_search(ucwords($type), $roles);
            return $valueIndex; //return index
        }
        if ($valueSearchIn == 'key' && $type !== null) {
            return $roles[$type];
        }
        return $roles;
    }

    //house facing directions
    public function houseFacing($type = null, $valueSearchIn = 'key')
    {
        $directions = ["east", "west", "north", "south", "north-east", "north-west", "south-west", "south-east "];
        if ($valueSearchIn == 'value') {
            $valueIndex = array_search(ucwords($type), $directions);
            return $valueIndex; //return index
        }
        if ($valueSearchIn == 'key' && $type !== null) {
            return $directions[$type];
        }
        return $directions;
    }

    //property approved by departments
    public function approvedDepartments($type = null, $valueSearchIn = 'key')
    {
        $directions = ["1" => "puda", "2" => "rera", "3" => "gmada", "4" => "mc"];
        if ($valueSearchIn == 'value') {
            $valueIndex = array_search(ucwords($type), $directions);
            return $valueIndex; //return index
        }
        if ($valueSearchIn == 'key' && $type !== null) {
            return $directions[$type];
        }
        return $directions;
    }
    // price units
    public function priceUnits($type = null, $valueSearchIn = 'key')
    {
        $units = ["k" => "thousand", "lac" => "lakh", "cr" => "crore"];
        if ($valueSearchIn == 'value') {
            $valueIndex = array_search(ucwords($type), $units);
            return $valueIndex; //return index
        }
        if ($valueSearchIn == 'key' && $type !== null) {
            return $units[$type];
        }
        return $units;
    }
    //house measurment
    public function measurementUnits($type = null, $valueSearchIn = 'key')
    {
        //find more measurments (https://www.99acres.com/articles/common-land-measurement-units-used-in-india.html)
        $units = ["sq. ft" => "square feet", "sq m" => "square meter", "acre" => "acre", "gaj" => "gaj", "sq. yd" => 'square yard'];
        if ($valueSearchIn == 'value') {
            $valueIndex = array_search(ucwords($type), $units);
            return $valueIndex; //return index
        }
        if ($valueSearchIn == 'key' && $type !== null) {
            return $units[$type];
        }
        return $units;
    }
    //project status
    public static function projectStatus($type = null, $valueSearchIn = 'key')
    {
        $status = ["0" => "active", "1" => "inactive", "2" => "modration", "3" => "archive", "4" => "back for correction"];
        if ($valueSearchIn == 'value') {
            $valueIndex = array_search(ucwords($type), $status);
            return $valueIndex; //return index
        }
        if ($valueSearchIn == 'key' && $type !== null) {
            return $status[$type];
        }
        return $status;
    }
    //project launch status
    public static function getStatus($type = null, $valueSearchIn = 'key')
    {
        $status = ['under_construction' => 'Under Construction', 'mid_stage_construction' => 'Mid Stage Construction', 'advanced_stage_construction' => 'Advanced Stage Construction', 'early_stage_construction' => 'Early Stage Construction', 'ready_to_move' => 'Ready To Move', 'new_launch' => 'New Launch',];
        if ($type !== null) {
            if ($valueSearchIn == 'value') {
                $valueIndex = array_search(ucwords($type), $status);
                return $valueIndex; //return index
            }
            return $status[$type];
        }
        return $status;
    }
    //carpet area types
    public static function carpetArea($type = null, $valueSearchIn = 'key')
    {
        $areatypes = ['1' => 'buildup area', '2' => 'super area', '3' => 'carpet area'];
        if ($type !== null) {
            if ($valueSearchIn == 'value') {
                $valueIndex = array_search(ucwords($type), $areatypes);
                return $valueIndex; //return index
            }
            return $areatypes[$type];
        }
        return $areatypes;
    }
    //listing types
    public static function listingType()
    {
        $listingType = ['1' => 'RENT', '2' => 'SALE', '0' => 'BUY', '3' => 'INVESTMENT', '4' => 'FULL HOUSE PLAN'];
        return $listingType;
    }
    //building type
    public static function buildingType()
    {
        $buildingType = ['0' => 'house', '1' => 'appartment', '2' => 'flat', '5' => 'villa', '6' => 'pent house', '4' => 'plots', '3' => 'pg'];
        return $buildingType;
    }
}
