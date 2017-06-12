<?php

/**
 * PHP version 5.3
 *
 * Test case class
 *
 * @category RetailCrm
 * @package  RetailCrm
 * @author   RetailCrm <integration@retailcrm.ru>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://www.retailcrm.ru/docs/Developers/ApiVersion5
 */

namespace RetailCrm\Test;

use RetailCrm\ApiClient;
use RetailCrm\Http\Client;

/**
 * Class TestCase
 *
 * @package RetailCrm\Test
 */
class TestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * Return ApiClient object
     *
     * @param  string    $url (default: null)
     * @param  string    $apiKey (default: null)
     * @param  string    $site (default: null)
     *
     * @return ApiClient
     */
    public static function getApiClient($url = null, $apiKey = null, $site = null)
    {
        return new ApiClient(
            $url ?: $_SERVER['CRM_URL'],
            $apiKey ?: $_SERVER['CRM_API_KEY'],
            $site ?: (isset($_SERVER['CRM_SITE']) ? $_SERVER['CRM_SITE'] : null)
        );
    }

    /**
     * Return Client object
     *
     * @param  string $url (default: null)
     * @param  array  $defaultParameters (default: array())
     *
     * @return Client
     */
    public static function getClient($url = null, $defaultParameters = array())
    {
        return new Client(
            $url ?: $_SERVER['CRM_URL'] . '/api/' . ApiClient::VERSION,
            array(
                'apiKey' => array_key_exists('apiKey', $defaultParameters)
                    ? $defaultParameters['apiKey']
                    : $_SERVER['CRM_API_KEY']
            )
        );
    }
}