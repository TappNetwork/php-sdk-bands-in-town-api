<?php

namespace BandsInTownApi\Authenticators;

use Saloon\Contracts\PendingRequest;
use Saloon\Contracts\Authenticator;

class HeaderAuthenticator implements Authenticator
{
    public function __construct(
        public string $apiKey,
    ) {
        //
    }

    public function set(PendingRequest $pendingRequest): void
    {
        $pendingRequest->headers()->add('x-api-key', $this->apiKey);
    }
}
