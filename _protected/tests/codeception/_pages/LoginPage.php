<?php
namespace tests\codeception\_pages;

use app\models\Setting;
use yii\codeception\BasePage;

/**
 * Represents login page
 * @property \AcceptanceTester|\FunctionalTester $actor
 */
class LoginPage extends BasePage
{
    public $route = 'site/login';

    /**
     * =========================================================================
     * Method representing user submitting login form.
     * =========================================================================
     *
     * @param string  $user      Can be users username or email.
     * 
     * @param string  $password
     * _________________________________________________________________________
     */
    public function login($user, $password)
    {
        // if we should login user with email use email field, otherwise use username
        $field = Setting::get(Setting::LOGIN_WITH_EMAIL) ? 'email' : 'username' ;

        $this->actor->fillField('input[name="LoginForm['.$field.']"]', $user);
        $this->actor->fillField('input[name="LoginForm[password]"]', $password);
        $this->actor->click('login-button');
    }
}
