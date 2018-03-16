<?php

namespace App\RegisteringMembers;

use EventSauce\EventSourcing\AggregateRootId;
use EventSauce\EventSourcing\AggregateRootTestCase;
use EventSauce\EventSourcing\UuidAggregateRootId;

abstract class RegistrationProcessTestCase extends AggregateRootTestCase
{
    protected function newAggregateRootId(): AggregateRootId
    {
        return UuidAggregateRootId::create();
    }

    protected function aggregateRootClassName(): string
    {
        return RegistrationProcess::class;
    }

    protected function handle($command)
    {
        (new RegistrationCommandHandler(
            $this->repository,
            $this->clock()
        ))->handle($command);
    }
}