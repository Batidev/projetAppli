<?php
declare(strict_types=1);

namespace App\Domain\JobDating;

use App\Domain\DomainException\DomainRecordNotFoundException;

class JobDatingNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The user you requested does not exist.';
}
