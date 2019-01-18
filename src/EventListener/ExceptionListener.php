<?php

namespace App\EventListener;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\Routing\RouterInterface;

class ExceptionListener
{
    private $router;

    public function __construct(RouterInterface $r)
    {
        $this->router = $r;
    }

    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        // redirect to home page
        $response = new RedirectResponse($this->router->generate('index'));
        // sends the modified response object to the event
        $event->setResponse($response);
    }
}