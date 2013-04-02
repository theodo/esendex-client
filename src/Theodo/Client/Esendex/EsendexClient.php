<?php

namespace Theodo\Client\Esendex;

use Guzzle\Common\Collection,
    Guzzle\Http\Message\RequestInterface,
    Guzzle\Plugin\CurlAuth\CurlAuthPlugin,
    Guzzle\Service\Client,
    Guzzle\Service\Description\ServiceDescription;

/**
 * @author Nicolas Bazire <nicolasb@theodo.fr>
 */
class EsendexClient extends Client
{
    /**
     * {@inheritdoc}
     */
    public function __construct($baseUrl = '', $config = null)
    {
        $default = array();
        $required = array('username', 'password');
        $config = Collection::fromConfig($config, $default, $required);

        parent::__construct($baseUrl, $config);
        $this->setDescription(ServiceDescription::factory(__DIR__ . DIRECTORY_SEPARATOR . 'client.json'));
        $this->addSubscriber(new CurlAuthPlugin($config->get('username'), $config->get('password')));
    }
}
