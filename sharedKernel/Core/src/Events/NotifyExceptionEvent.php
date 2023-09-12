<?php

namespace SharedKernel\Core\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Throwable;

class NotifyExceptionEvent
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public function __construct(
        private mixed     $request,
        private Throwable $throwable,
        private array     $data,
    )
    {
    }

    public function getRequest(): mixed
    {
        return $this->request;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function getThrowable(): Throwable
    {
        return $this->throwable;
    }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('expenses-channel'),
        ];
    }
}
