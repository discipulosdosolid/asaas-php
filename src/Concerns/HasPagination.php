<?php

namespace TioJobs\AsaasPhp\Concerns;

trait HasPagination
{
    public function __construct(
        public readonly string $apiKey,
        protected int $limit = 10,
        protected int $offset = 0,
    ) {
    }
}
