<?php

namespace App\Http\Controllers\Trees;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use iWebTouch\Gelato\Gelato;

class Gift extends Controller
{
    private $shop;

    public function __construct(Gelato $shop)
    {
        $this->shop = $shop;
    }

    public function createOrder()
    {
        $shipTo = [
            'companyName' => 'No Name',
            'firstName' => 'John',                  // required
            'lastName' => 'Doe',                  // required
            'addressLine1' => '451 Clarkson Ave',   // required
            'addressLine2' => 'Brooklyn',
            'state' => 'NY',
            'city' => 'New York',                   // required
            'postCode' => '11203',                  // required
            'country' => 'US',                      // required
            'email' => 'xdim222@gmail.com',         // required
            'phone' => '123456789',
        ];

        $item = [
            'itemReferenceId' => 'ITEM-123',
            'productUid' => 'framed_poster_130x180-mm-5x7-inch_black_wood_w12xt22-mm_plexiglass_130x180-mm-5r_170-gsm-65lb-coated-silk_4-0_hor',
            'fileUrl' => 'https://github.githubassets.com/images/modules/logos_page/Octocat.png',
            'quantity' => 1,
        ];

        $this->shop->setOrderData('ORDER-456', 'CUST-002', 'USD')
                    ->addItem($item)
                    ->setShippingAddress($shipTo);

        return $this->shop->createOrder();
    }

    public function getOrder(string $orderId)
    {
        return $this->shop->getOrder($orderId);
    }

    public function getShippingAddress(string $orderId)
    {
        return $this->shop->getShippingAddress($orderId);
    }
}
