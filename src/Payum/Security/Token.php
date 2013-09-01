<?php
namespace Payum\Security;

use Payum\Exception\InvalidArgumentException;
use Payum\Model\DetailsAggregateInterface;
use Payum\Model\DetailsAwareInterface;
use Payum\Storage\Identificator;
use Payum\Security\Util\Random;

class Token implements TokenInterface
{
    /**
     * @var Identificator
     */
    protected $details;

    /**
     * @var string
     */
    protected $token;

    /**
     * @var string
     */
    protected $afterUrl;

    /**
     * @var string
     */
    protected $targetUrl;

    /**
     * @var string
     */
    protected $paymentName;

    public function __construct()
    {
        $this->token = time().'-'.Random::generateToken();
    }

    /**
     * {@inheritDoc}
     * 
     * @return Identificator
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * {@inheritDoc}
     *
     * @param Identificator $details
     * 
     * @throws InvalidArgumentException if $details is not instance of Identificator
     *
     * @return void
     */
    public function setDetails($details)
    {
        if (false == $details instanceof Identificator) {
            throw new InvalidArgumentException('Details must be instance of `Identificator`.');
        }

        $this->details = $details;
    }

    /**
     * {@inheritDoc}
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * {@inheritDoc}
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * {@inheritDoc}
     */
    public function getTargetUrl()
    {
        return $this->targetUrl;
    }

    /**
     * {@inheritDoc}
     */
    public function setTargetUrl($targetUrl)
    {
        $this->targetUrl = $targetUrl;
    }

    /**
     * {@inheritDoc}
     */
    public function getAfterUrl()
    {
        return $this->afterUrl;
    }

    /**
     * {@inheritDoc}
     */
    public function setAfterUrl($afterUrl)
    {
        $this->afterUrl = $afterUrl;
    }

    /**
     * {@inheritDoc}
     */
    public function getPaymentName()
    {
        return $this->paymentName;
    }

    /**
     * {@inheritDoc}
     */
    public function setPaymentName($paymentName)
    {
        $this->paymentName = $paymentName;
    }
}