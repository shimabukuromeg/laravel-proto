<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EloquentCustomerPoint
 *
 * @property int $customer_id
 * @property int $point
 */
final class EloquentCustomerPoint extends Model
{
    protected $table = 'customer_points';

    public $timestamps = false;

    /**
     * @param int $customerId
     * @param int $point
     * @return bool
     */
    public function addPoint(int $customerId, int $point): bool
    {
        return $this->newQuery()
            ->where('customer_id', $customerId)
            ->update([
                $this->getConnection()->raw('point=point+?', $point)
            ]) === 1;
    }
}
