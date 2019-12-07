<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
    /**
     * test login method
     */
    public function testLoginRequiredFields()
    {
        $this->post('api/login', ['email' => null, 'password' => null]);

        $this->assertEquals(
            [
                "email"    => ["The email field is required."],
                "password" => ["The password field is required."]
            ],
            json_decode($this->response->getContent(), true)
        );
    }
}
