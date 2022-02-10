<?php

use \Codeception\Util\HttpCode;

/**
 * Class AuthJWTCest
 * This is a test suite that contains test scenarios
 */
class AuthJWTCest
{
    /**
     * @param ApiTester $I
     * @throws Exception
     * Test scenario that requires JWT Token and retrieves all employees
     */
    public function getEmployeesWithToken(ApiTester $I)
    {
        $I->authenticatedAs("admin");
        $I->sendGet('/api/v1/simulate/get/employees');
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->seeResponseIsJson();
    }
}
