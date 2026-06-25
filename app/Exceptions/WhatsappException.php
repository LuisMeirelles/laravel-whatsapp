<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class WhatsappException extends Exception
{
    public function __construct(
        string                  $message,
        public readonly ?string $details = null,
        public readonly ?int    $statusCode = null,
        public readonly ?int    $apiCode = null,
        public readonly ?string $type = null,
        ?Throwable              $previous = null,
    )
    {
        parent::__construct($message, 0, $previous);
    }

    public static function make(
        string     $message,
        ?string    $details = null,
        ?int       $statusCode = null,
        ?int       $apiCode = null,
        ?string    $type = null,
        ?Throwable $previous = null,
    ): self
    {
        return new self(
            message: $message,
            details: $details,
            statusCode: $statusCode,
            apiCode: $apiCode,
            type: $type,
            previous: $previous,
        );
    }

    public function context(): array
    {
        return array_filter([
            'details' => $this->details,
            'status_code' => $this->statusCode,
            'api_code' => $this->apiCode,
            'type' => $this->type,
        ], fn($value) => $value !== null);
    }
}
