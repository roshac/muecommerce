<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Order_products;

class OrderChange implements ShouldBroadcast
{

   
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $order;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Order_products $order)
    {
        $this->order = $order;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('order-tracker.'.$this->order->order_id);
    }

    public function broadcastWith(){
        $extra = [
            'status_name' =>$this->order->status->name,

        ];
        // <bid-price start="{{$cloth->starting_price}}" end="{{$cloth->skus_count}}" auction_id="{{$cloth->id}}"></bid-price> <bid-price start="{{$cloth->starting_price}}" end="{{$cloth->skus_count}}" auction_id="{{$cloth->id}}"></bid-price>
        return array_merge($this->order->toArray(), $extra);
    }
}
