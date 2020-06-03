<?php

namespace App\Http\Controllers;

use App\ShopAPI;
use Illuminate\Routing\Controller as BaseController;

class CustomersController extends BaseController
{
    public function index()
    {
        $shopApi = new ShopAPI;
        $customerOrders = $shopApi->getCustomerOrders();
        return view('customers', ['customerOrders'=>$customerOrders]);
    }
}
