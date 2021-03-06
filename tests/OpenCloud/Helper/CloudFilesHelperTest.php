<?php

namespace OpenCloud\Tests\Zf2\Helper;

use OpenCloud\Tests\Zf2\Zf2TestCase;
use OpenCloud\Zf2\Helper\CloudFilesHelper;
use Zend\View\Renderer\PhpRenderer;

class CloudFilesHelperTest extends Zf2TestCase
{
    private function getHelper()
    {
        $service = $this->getClient()->objectStoreService('cloudFiles', 'ORD');
        $helper = new CloudFilesHelper($service);
        $helper->setView(new PhpRenderer());
        return $helper;
    }

    public function test_Invoke()
    {
        $helper = $this->getHelper();

        $this->addMockSubscriber($this->makeResponse('{}', 200));
        $this->assertInstanceOf('OpenCloud\Zf2\Helper\CloudFiles\Container', $helper('test'));
    }

    /**
     * @expectedException \Zend\View\Exception\InvalidArgumentException
     */
    public function test_Invoke_Fails_Without_Name()
    {
        $helper = $this->getHelper();

        $this->addMockSubscriber($this->makeResponse('{}', 200));
        $helper();
    }

}