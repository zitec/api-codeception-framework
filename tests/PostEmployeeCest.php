<?php

use \Codeception\Util\HttpCode;
use \Codeception\Example;
use Helper\Header;
use Helper\Faker;

/**
 * Class PostEmployeeCest
 * This is a test suite that contains test scenarios
 */
class PostEmployeeCest
{
    /**
     * @dataProvider provideUsers
     * Test scenario that creates a new employee
     */
    public function createEmployee(ApiTester $I, Example $example){
        $requestBody = array(
            'email' => $example['email'],
            'firstName' => $example['fn'],
            'lastName' => 'Doe',
            'dob' => $example['dob']
        );

        $I->haveHttpHeader(Header::CONTENT_TYPE, 'application/json');
        $I->sendPost('/api/v1/employees', $requestBody);
        $I->seeResponseCodeIs(HttpCode::CREATED);
    }

    /**
     * @dataProvider provideUsers
     * Test scenario that tries to create new employee by using no email address - negative scenario
     * Assert - the response containing specific property and value
     */
    public function createEmployeeWithNoEmail(ApiTester $I, Example $example){
        $requestBody = array(
            'firstName' => $example['fn'],
            'lastName' => 'Smith',
            'dob' => $example['dob']
        );

        $I->haveHttpHeader(Header::CONTENT_TYPE, 'application/json');
        $I->sendPost('/api/v1/employees', $requestBody);
        $I->seeResponseCodeIs(HttpCode::BAD_REQUEST);
        $I->seeResponseContainsJson(array("message" => "Validation failed for object='employee'. Error count: 1"));
    }

    /*protected function provideUsers(): array
    {
        return [
            ['fn' => "John", 'dob' => "1967-08-23", "email" => "john@test.com"],
            ['fn' => "Laslo", 'dob' => "1965-01-21", "email" => "laslo@test.com"],
            ['fn'=>"George", 'dob'=>"1999-10-22", "email" => "george@test.com"],
            ['fn'=>"Mario", 'dob'=>"1998-07-03", "email" => "mario@test.com"]
        ];
    }*/


    protected function provideUsers(): array
    {
        $faker = Faker::create();
        return [
            ['fn' => $faker->firstName('male'), 'dob' => $faker->date('Y-m-d'), "email" => $faker->companyEmail],
            ['fn' => $faker->firstName('male'), 'dob' => $faker->date('Y-m-d'), "email" => $faker->companyEmail],
            ['fn' => $faker->firstName('male'), 'dob' => $faker->date('Y-m-d'), "email" => $faker->companyEmail],
            ['fn' => $faker->firstName('male'), 'dob' => $faker->date('Y-m-d'), "email" => $faker->companyEmail],
            ['fn' => $faker->firstName('male'), 'dob' => $faker->date('Y-m-d'), "email" => $faker->companyEmail],
            ['fn' => $faker->firstName('male'), 'dob' => $faker->date('Y-m-d'), "email" => $faker->companyEmail],
            ['fn' => $faker->firstName('male'), 'dob' => $faker->date('Y-m-d'), "email" => $faker->companyEmail]
        ];
    }
}
