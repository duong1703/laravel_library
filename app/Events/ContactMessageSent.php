<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ContactMessageSent implements ShouldBroadcast
{
    use Dispatchable, SerializesModels;

    public $messageData; // Dữ liệu tin nhắn

    /**
     * Tạo một instance của sự kiện.
     *
     * @param  array  $messageData
     * @return void
     */
    public function __construct($messageData)
    {
        $this->messageData = $messageData;
    }

    /**
     * Xác định kênh phát thông báo.
     *
     * @return \Illuminate\Broadcasting\Channel
     */
    public function broadcastOn()
    {
        return new Channel('admin-notifications');
    }

    /**
     * Tùy chỉnh thông điệp phát ra.
     *
     * @return array
     */
    public function broadcastWith()
    {
        return [
            'fullname' => $this->messageData['fullname'],
            'message' => $this->messageData['message'],
        ];
    }
}
