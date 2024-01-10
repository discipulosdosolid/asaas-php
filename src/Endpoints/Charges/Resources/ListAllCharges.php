<?php

namespace TioJobs\AsaasPhp\Endpoints\Charges\Resources;

use TioJobs\AsaasPhp\Concerns\HasBlankData;
use TioJobs\AsaasPhp\Concerns\HasMode;
use TioJobs\AsaasPhp\Concerns\HasPagination;
use TioJobs\AsaasPhp\Concerns\HasToken;
use TioJobs\AsaasPhp\Contracts\Core\AsaasChargeInterface;
use TioJobs\AsaasPhp\Contracts\Core\AsaasInterface;
use TioJobs\AsaasPhp\DataTransferObjects\Charges\Billet\DirectBilletDTO;

class ListAllCharges implements AsaasInterface
{
    use HasToken;
    use HasMode;
    use HasBlankData;

    public function __construct(
        public readonly string $apiKey,
        protected int $limit = 10,
        protected int $offset = 0,
    ) {
    }

    public function getPath(): string
    {
        $endpoint = config("asaas-php.environment.{$this->getMode()}.url");
        assert(is_string($endpoint));

        return "{$endpoint}/payments?limit={$this->limit}&offset={$this->offset}";
    }
}
