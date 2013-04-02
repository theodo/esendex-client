<?php

namespace Theodo\Client\Esendex\Tests;

class MessageDispatcherTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function setUp()
    {
        $this->client = $this->getServiceBuilder()->get('client');
    }

    public function testSendSingleSMS()
    {
        $resp = $this->client->getCommand('MessageDispatcher', array(
            'messages' => array(
                array(
                    'to' => '0680551231',
                    'body' => 'test'
                )
            ), 'accountreference' => $_SERVER['ACCOUNT']
        ))->execute();
    }
}
