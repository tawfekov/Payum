<?php
namespace Payum\Tests\Security;

use Payum\Security\Token;
use Payum\Storage\Identificator;

class TokenTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function shouldExtendDetailsAwareInterface()
    {
        $rc = new \ReflectionClass('Payum\Security\Token');

        $this->assertTrue($rc->implementsInterface('Payum\Security\TokenInterface'));
    }

    /**
     * @test
     */
    public function couldBeConstructedWithoutAnyArguments()
    {
        new Token;
    }

    /**
     * @test
     */
    public function shouldAllowGetTokenGeneratedInConstructor()
    {
        $token = new Token;

        $this->assertNotEmpty($token->getToken());
    }

    /**
     * @test
     */
    public function shouldGenerateDifferentTokensInConstructor()
    {
        $tokenOne = new Token;
        $tokenTwo = new Token;

        $this->assertNotEquals($tokenOne->getToken(), $tokenTwo->getToken());
    }

    /**
     * @test
     */
    public function shouldAllowSetToken()
    {
        $token = new Token;

        $token->setToken('foo');
    }

    /**
     * @test
     */
    public function shouldAllowGetPreviouslySetToken()
    {
        $token = new Token;

        $token->setToken('theToken');

        $this->assertSame('theToken', $token->getToken());
    }

    /**
     * @test
     */
    public function shouldAllowSetPaymentName()
    {
        $token = new Token;

        $token->setPaymentName('aName');
    }

    /**
     * @test
     */
    public function shouldAllowGetPreviouslySetPaymentName()
    {
        $token = new Token;

        $token->setPaymentName('theName');

        $this->assertSame('theName', $token->getPaymentName());
    }

    /**
     * @test
     */
    public function shouldAllowSetTargetUrl()
    {
        $token = new Token;

        $token->setTargetUrl('anUrl');
    }

    /**
     * @test
     */
    public function shouldAllowGetPreviouslySetTargetUrl()
    {
        $token = new Token;

        $token->setTargetUrl('theUrl');

        $this->assertSame('theUrl', $token->getTargetUrl());
    }

    /**
     * @test
     */
    public function shouldAllowSetAfterUrl()
    {
        $token = new Token;

        $token->setAfterUrl('anUrl');
    }

    /**
     * @test
     */
    public function shouldAllowGetPreviouslySetAfterUrl()
    {
        $token = new Token;

        $token->setAfterUrl('theUrl');

        $this->assertSame('theUrl', $token->getAfterUrl());
    }

    /**
     * @test
     */
    public function shouldAllowSetIdentificatorAsDetails()
    {
        $token = new Token;

        $token->setDetails(new Identificator('anId', 'stdClass'));
    }

    /**
     * @test
     */
    public function shouldAllowGetPreviouslySetDetails()
    {
        $expectedIdentificator = new Identificator('anId', 'stdClass');

        $token = new Token;

        $token->setDetails($expectedIdentificator);

        $this->assertSame($expectedIdentificator, $token->getDetails());
    }

    /**
     * @test
     *
     * @expectedException \Payum\Exception\InvalidArgumentException
     * @expectedExceptionMessage Details must be instance of `Identificator`.
     */
    public function throwIfTrySetNotIdentificatorAsDetails()
    {
        $token = new Token;

        $token->setDetails(new \stdClass);
    }
}