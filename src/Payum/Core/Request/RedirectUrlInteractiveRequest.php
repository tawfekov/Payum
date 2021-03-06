<?php
namespace Payum\Core\Request;

class RedirectUrlInteractiveRequest extends BaseInteractiveRequest
{
    /**
     * @var string
     */
    protected $url;

    /**
     * @param string $content
     */
    public function __construct($content)
    {
        $this->url = $content;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
}