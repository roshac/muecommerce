<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\BidPayment;

class Bidchange implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $bidpay;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(BidPayment $bidpay)
    {
        $this->bidpay = $bidpay;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('bid-change.'.$this->bidpay->id);
    }

    // public function broadcastWith(){
    //     $extra = [
    //         'fee_paid' =>$this->auction->fee_paid,

    //     ];
    //     // <bid-price start="{{$cloth->starting_price}}" end="{{$cloth->skus_count}}" auction_id="{{$cloth->id}}"></bid-price> <bid-price start="{{$cloth->starting_price}}" end="{{$cloth->skus_count}}" auction_id="{{$cloth->id}}"></bid-price>
    //     return array_merge($this->auction->toArray(), $extra);
    // }
}
