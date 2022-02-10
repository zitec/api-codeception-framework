<?php

use \Codeception\Util\HttpCode;

/**
 * Class GetEmployeesCest
 * This is a test suite that contains test scenarios
 */
class GetEmployeesCest
{
    /**
     * @param ApiTester $I
     * Test scenario that retrieves all employees
     */
    public function getAllEmployees(ApiTester $I)
    {
        $I->sendGet('/api/v1/employees');
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->seeResponseIsJson();
    }
}
