<?php
declare(strict_types=1);

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 *
 * @property int $customer_id
 * @property int $point
 */
class EloquentCustomerPoint extends Model
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
        return \DB::update('update customer_points set point=point+:point where customer_id=:customer_id',
                [
                    'point'       => $point,
                    'customer_id' => $customerId,
                ]
            ) === 1;
    }
}
