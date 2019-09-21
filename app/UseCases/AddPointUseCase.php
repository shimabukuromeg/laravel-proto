<?php

namespace App\UseCases;

use App\Eloquent\EloquentCustomer;
use App\Eloquent\EloquentCustomerPoint;
use App\Exceptions\PreConditionException;
use App\Model\PointEvent;
use App\Services\AddPointService;
use Illuminate\Support\Carbon;

final class AddPointUseCase
{
    private $service;

    private $eloquentCustomer;

    private $eloquentCustomerPoint;

    public function __construct(
        AddPointService $service,
        EloquentCustomer $eloquentCustomer,
        EloquentCustomerPoint $eloquentCustomerPoint
    )
    {
        $this->service = $service;
        $this->eloquentCustomer = $eloquentCustomer;
        $this->eloquentCustomerPoint = $eloquentCustomerPoint;
    }

    public function run(int $customerId, int $addPoint, string $pointEvent, Carbon $now): int
    {
        if ($addPoint <= 0){
            throw new PreConditionException(
                'add_point should be equals or greater than 1'
            );
        }

        if (!$this->eloquentCustomer->where('id', $customerId)->exists()){
            $message = sprintf('customer_id:%d does not exist', $customerId);
            throw new PreConditionException($message);
        }

        $event = new PointEvent($customerId, $pointEvent, $addPoint, $now);
        $this->service->add($event);

        return $this->eloquentCustomerPoint->findPoint($customerId);
    }
}
