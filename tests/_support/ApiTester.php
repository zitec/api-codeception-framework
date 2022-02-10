<?php

use \Codeception\Util\HttpCode;
use Helper\Header;
use \Codeception\Actor;

/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method void pause()
 *
 * @SuppressWarnings(PHPMD)
*/
class ApiTester extends Actor
{
    use _generated\ApiTesterActions;

    /**
     * @throws Exception
     * This step uses JWT Token authentication.
     */
    public function authenticatedAs($role) {

        // Use this example in order to define your own user roles or auth credentials
        $userRoleRequestPayload = array(
            'username' => 'user',
            'password' => 'user'
        );

        $adminRoleRequestPayload = array(
            'username' => 'admin',
            'password' => 'admin'
        );

        $this->haveHttpHeader(Header::CONTENT_TYPE, 'application/json');

        switch ($role){
            case 'admin': $this->sendPOST('/api/v1/simulate/token', $adminRoleRequestPayload);
            break;
            case 'user': $this->sendPOST('/api/v1/simulate/token', $userRoleRequestPayload);
            break;
            default: throw new Exception("Invalid '".$role."' argument for authenticatedAs() method.");
        }

        $this->seeResponseCodeIs(HttpCode::OK);
        $token = $this->grabDataFromResponseByJsonPath('token')[0];
        $this->amBearerAuthenticated($token);
    }
}
