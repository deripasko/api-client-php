<?php

/**
 * PHP version 5.3
 *
 * API client packs test class
 *
 * @category RetailCrm
 * @package  RetailCrm
 * @author   RetailCrm <integration@retailcrm.ru>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://www.retailcrm.ru/docs/Developers/ApiVersion5
 */

namespace RetailCrm\Tests;

use RetailCrm\Test\TestCase;

/**
 * Class ApiClientPacksTest
 *
 * @category RetailCrm
 * @package  RetailCrm
 * @author   RetailCrm <integration@retailcrm.ru>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://www.retailcrm.ru/docs/Developers/ApiVersion5
 */
class ApiClientPacksTest extends TestCase
{
    /**
     * Test packs history
     *
     * @group  packs
     * @return void
     */
    public function testPacksHistory()
    {
        $client = static::getApiClient();

        $response = $client->ordersPacksHistory();
        static::assertInstanceOf('RetailCrm\Response\ApiResponse', $response);
        static::assertEquals(200, $response->getStatusCode());
        static::assertTrue($response->success);
        static::assertTrue(
            isset($response['history']),
            'API returns orders assembly history'
        );
        static::assertTrue(
            isset($response['generatedAt']),
            'API returns generatedAt in orders assembly history'
        );
    }

    /**
     * Test packs failed create
     *
     * @group  packs
     * @return void
     */
    public function testPacksCreateFailed()
    {
        $client = static::getApiClient();
        $pack = array(
            'itemId' => 12,
            'store' => 'test',
            'quantity' => 2
        );

        $response = $client->ordersPacksCreate($pack);
        static::assertInstanceOf('RetailCrm\Response\ApiResponse', $response);
        static::assertEquals(400, $response->getStatusCode());
        static::assertFalse($response->success);
    }
}