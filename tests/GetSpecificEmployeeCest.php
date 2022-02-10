<?php

use \Codeception\Util\HttpCode;
use data\response\GetSpecificEmployeeData;

/**
 * Class GetSpecificEmployeeCest
 * This is a test suite that contains test scenarios
 */
class GetSpecificEmployeeCest {
    /**
     * @param ApiTester $I
     * Test scenario that retrieves employee by ID
     * Assert - the response by structure - properties data type
     */
    public function getSpecificEmployeeTest(ApiTester $I){
        $I->sendGet('/api/v1/employees/1');
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->seeResponseIsJson();
        $I->seeResponseMatchesJsonType(GetSpecificEmployeeData::specificEmployeeTestStructureResponse);
    }

    /**
     * @param ApiTester $I
     * Test scenario that retrieves employee by ID
     * Assert - the exact JSON response
     */
    public function getSpecificEmployeeTestByExactResponse(ApiTester $I){
        $I->sendGet('/api/v1/employees/1');
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->seeResponseIsJson();
        $I->seeResponseEquals(json_encode(GetSpecificEmployeeData::getSpecificEmployeeTestByExactResponse));
    }
}
