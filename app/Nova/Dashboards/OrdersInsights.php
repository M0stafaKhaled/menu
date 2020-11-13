<?php

namespace App\Nova\Dashboards;

use App\Nova\Order;
use App\OrderItem;
use Laravel\Nova\Dashboard;

class OrdersInsights extends Dashboard
{
    /**
     * Get the cards for the dashboard.
     *
     * @return array
     */
    public function cards()
    {
        return [
            new Order
        ];
    }

    /**
     * Get the URI key for the dashboard.
     *
     * @return string
     */
    public static function uriKey()
    {
        return 'orders-insights';
    }
}
