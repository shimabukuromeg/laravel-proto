<?php
declare(strict_types=1);

namespace App\Services;

use App\Eloquent\EloquentCustomerPoint;
use App\Eloquent\EloquentCustomerPointEvent;
use App\Model\PointEvent;
use Illuminate\Database\Connectors\ConnectorInterface;

final class AddPointService
{
    /**
     * @var EloquentCustomerPointEvent
     */
    private $eloquentCustomerPointEvent;

    /**
     * @var EloquentCustomerPoint
     */
    private $eloquentCustomerPoint;

    /**
     * @var ConnectorInterface
     */
    private $db;

    /**
     * AddPointService constructor.
     *
     * @param EloquentCustomerPointEvent $eloquentCustomerPointEvent
     * @param EloquentCustomerPoint      $eloquentCustomerPoint
     */
    public function __construct(
        EloquentCustomerPointEvent $eloquentCustomerPointEvent,
        EloquentCustomerPoint $eloquentCustomerPoint
    )
    {
        $this->eloquentCustomerPointEvent = $eloquentCustomerPointEvent;
        $this->eloquentCustomerPoint = $eloquentCustomerPoint;
        $this->db = $eloquentCustomerPointEvent->getConnection();
    }

    public function add(PointEvent $event)
    {
        $this->db->transaction(function() use ($event){
           $this->eloquentCustomerPointEvent->register($event);

           $this->eloquentCustomerPoint->addPoint(
               $event->getCustomerId(),
               $event->getPoint()
           );
        });
    }
}
