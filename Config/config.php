<?php

/*
 * @copyright   2018 Mautic Contributors. All rights reserved
 * @author      Mautic
 *
 * @link        http://mautic.org
 *
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

return [
    'name'        => 'Gateway Api',
    'description' => 'Gateway Api SMS integration',
    'author'      => 'https://alanmosko.com.br/',
    'version'     => '1.0.0',
    'services' => [
        'events'  => [],
        'forms'   => [],
        'helpers' => [],
        'other'   => [
            'mautic.sms.transport.gatewayapi' => [
                'class'     => \MauticPlugin\MauticGatewayApiSMSBundle\Services\GatewayApi::class,
                'arguments' => [
                    'mautic.page.model.trackable',
                    'mautic.helper.phone_number',
                    'mautic.helper.integration',
                    'monolog.logger.mautic',
                ],
                'alias' => 'mautic.sms.config.transport.gatewayapi',
                'tag'          => 'mautic.sms_transport',
                'tagArguments' => [
                    'integrationAlias' => 'GatewayApi',
                ],
            ],
        ],
        'models'       => [],
        'integrations' => [
            'mautic.integration.gatewayapi' => [
                'class' => \MauticPlugin\MauticGatewayApiSMSBundle\Integration\GatewayApiIntegration::class,
            ],
        ],
    ],
    'routes'     => [],
    'menu' => [
        'main' => [
            'items' => [
                'mautic.sms.smses' => [
                    'route'  => 'mautic_sms_index',
                    'access' => ['sms:smses:viewown', 'sms:smses:viewother'],
                    'parent' => 'mautic.core.channels',
                    'checks' => [
                        'integration' => [
                            'GatewayApi' => [
                                'enabled' => true,
                            ],
                        ],
                    ],
                    'priority' => 70,
                ],
            ],
        ],
    ],
    'parameters' => [],
];
