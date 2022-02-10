<?php

namespace data\response;

/**
 * Class GetSpecificEmployeeData
 * @package data
 * This file contains datasets used by the test suite - GetSpecificEmployeeCest.php
 */
class GetSpecificEmployeeData
{
    /**
     * Used by getSpecificEmployeeTest Test
     */
    const specificEmployeeTestStructureResponse = array(
        'id' => 'integer',
        'firstName' => 'string|null',
        'lastName' => 'string',
        'email' => 'string:email',
        'dob' => 'string',
    );

    /**
     * Used by getSpecificEmployeeTestByExactResponse Test
     */
    const getSpecificEmployeeTestByExactResponse = array(
        'id' => 1,
        'firstName' => 'Razvan',
        'lastName' => 'Smith',
        'dob' => '1994-05-06',
        'email' => 'iamqarv@gmail.com'
    );
}
