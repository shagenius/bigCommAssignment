<?php

namespace App\Http\Controllers;
use App\ShopAPI;

use Illuminate\Routing\Controller as BaseController;

class CustomerDetailsController extends BaseController
{
    public function show($id)
    {
        $shopApi = new ShopAPI;
        $customer = $shopApi->getCustomer($id);
        $customer->order_history = $shopApi->getCustomerOrdersHistory($id);

        $lifeTimeValue = collect($customer->order_history)->sum('subtotal_inc_tax');

        return view('details', [
            'customer' => $customer,
            'lifeTimeValue' => $lifeTimeValue,
        ]);
    }
}
