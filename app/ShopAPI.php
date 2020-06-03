<?php

namespace App;
use Bigcommerce\Api\Client as BigCommerce;

class ShopAPI{

    public function getCustomer($id) {
        $response = BigCommerce::getCustomer($id);
        return $response;
    }

    public function getCustomers() {
        $response = BigCommerce::getCustomers();
        return $response;
    }
    
    public function getOrder($id) {
        $response = BigCommerce::getOrder($id);
        return $response;
    }

    public function getOrders($filters=array()) {
        $response = BigCommerce::getOrders($filters);
        return $response;
    }

    public function getCustomerOrders() {
        $orderCollection = collect($this->getOrders());

        $customer_ids = $orderCollection->groupBy(function ($item, $key) {
            return $item->customer_id;
        });
        
        $orderCount = $customer_ids->map(function ($item, $key) {
            return [
                'id' => $key,
                'order_count' => collect($item)->count()
            ];
        });

       $customer_orders =  $orderCount->map(function($item, $key){
            $customerDetails = collect($this->getCustomer($key));
            if($customerDetails->flatten()->count()>1) {
                $customerDetails = $customerDetails->flatten();
                return collect($item)->merge($customerDetails[2]); 
            }
        });
       
       return $customer_orders;
    }

    public function getCustomerOrdersHistory($id) {
        $orderHistory = collect($this->getOrders(['customer_id'=>$id]));
        return $orderHistory;
    }
}
