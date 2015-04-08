<?php

namespace Innova\Bundle\GitterBundle\Manager;

class GitterManager
{
    protected $fileLocator;
    protected $script;
    protected $kernel;

    public function __construct($fileLocator, $kernel)
    {
        $this->fileLocator = $fileLocator;
        $this->kernel = $kernel;
        $this->script = $fileLocator->locate('@InnovaGitterBundle/Resources/scripts/gitter.sh');
    }

    public function sendMessage($msg)
    {
        $token = $this->kernel->getContainer()->getParameter('gitter_token');
        $room = $this->kernel->getContainer()->getParameter('gitter_room');

        shell_exec("sh ".$this->script." ".$msg." ".$room." ".$token);
    }
}
