<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Bundle\SecurityBundle\Security;

use Symfony\Component\Security\Http\Firewall\ExceptionListener;

/**
 * This is a wrapper around the actual firewall configuration which allows us
 * to lazy load the context for one specific firewall only when we need it.
 *
 * @author Johannes M. Schmitt <schmittjoh@gmail.com>
 */
class FirewallContext
{
    private $listeners;
    private $exceptionListener;
    private $config;

    /**
     * @param \Traversable|array     $listeners
     * @param ExceptionListener|null $exceptionListener
     * @param FirewallConfig|null    $firewallConfig
     */
    public function __construct($listeners, ExceptionListener $exceptionListener = null, FirewallConfig $config = null)
    {
        $this->listeners = $listeners;
        $this->exceptionListener = $exceptionListener;
        $this->config = $config;
    }

    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @return \Traversable|array
     */
    public function getListeners()
    {
        return $this->listeners;
    }

    public function getExceptionListener()
    {
        return $this->exceptionListener;
    }
}
