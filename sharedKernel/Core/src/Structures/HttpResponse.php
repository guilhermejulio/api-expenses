<?php

namespace SharedKernel\Core\Structures;

use Illuminate\Http\Response;

class HttpResponse extends Response
{
    public function __construct($content = '', $status = 200, array $headers = [], string|null $key = 'data')
    {
        if (!is_null($key)) {
            $content = [
                $key => $content
            ];
        }
        parent::__construct($content, $status, $headers);
    }
}
