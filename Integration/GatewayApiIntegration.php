<?php

namespace MauticPlugin\MauticGatewayApiSMSBundle\Integration;

use Mautic\PluginBundle\Integration\AbstractIntegration;

/**
 * Class GatewayApiIntegration.
 */
class GatewayApiIntegration extends AbstractIntegration
{
    public function getName()
    {
        return 'GatewayApi';
    }

    public function getDisplayName()
    {
        return 'Gateway Api';
    }

    public function getIcon()
    {
        return 'plugins/MauticGatewayApiSMSBundle/Assets/img/gatewayapi.png';
    }

    public function getSecretKeys()
    {
        return ['password'];
    }

    /**
     * {@inheritdoc}
     *
     * @return array
     */
    public function getRequiredKeyFields()
    {
        return [
            'auth_token' => 'mautic.plugin.gatewayapi.auth_token',
        ];
    }

    /**
     * @return array
     */
    public function getFormSettings()
    {
        return [
            'requires_callback'      => false,
            'requires_authorization' => false,
        ];
    }

    /**
     * {@inheritdoc}
     *
     * @return string
     */
    public function getAuthenticationType()
    {
        return 'none';
    }

    /**
     * @param \Mautic\PluginBundle\Integration\Form|FormBuilder $builder
     * @param array                                             $data
     * @param string                                            $formArea
     */
    public function appendToForm(&$builder, $data, $formArea)
    {
    }
}
