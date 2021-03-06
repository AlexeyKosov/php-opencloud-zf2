<?php

namespace OpenCloud\Zf2\Factory;

/**
 * Factory class for building {@see \OpenCloud\Rackspace} objects
 *
 * @package OpenCloud\Zf2\Factory
 */
class RackspaceFactory extends AbstractProviderFactory
{
    protected $clientClass = 'OpenCloud\Rackspace';
    protected $required = array('username', 'apiKey');
}