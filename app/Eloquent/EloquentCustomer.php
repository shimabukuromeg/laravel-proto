<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EloquentCustomerPoint
 *
 * @property int $customer_id
 * @property int $point
 */
final class EloquentCustomer extends Model
{
    protected $table = 'customers';
}
