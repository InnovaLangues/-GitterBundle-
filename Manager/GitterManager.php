<?php

namespace Innova\GitterBundle\Manager;

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
        $token  = $this->kernel->getContainer()->getParameter('gitter_token');
        $room   = $this->kernel->getContainer()->getParameter('gitter_room');
        $cmd    = escapeshellcmd("sh ".$this->script." ".escapeshellarg($msg)." ".escapeshellarg($room)." ".escapeshellarg($token));
        shell_exec($cmd);

        return $this;
    }
}
