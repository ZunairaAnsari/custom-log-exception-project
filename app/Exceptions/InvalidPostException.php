<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;

class InvalidPostException extends Exception
{
    //
    public function __construct($message = 'Invalid Post Operation')
    {
        parent::__construct($message);
    }

    public function report()
    {
        Log::channel('custom')->error('Invalid Post: ' . $this->getMessage());
    }

    public function render($request)
    {
        return response()->view('errors.invalid-post', [], 400);
    }
}
