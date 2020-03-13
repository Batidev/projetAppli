<?php
declare(strict_types=1);

namespace App\Application\Actions\JobDating;

use App\Application\Actions\Action;
use App\Domain\JobDating\JobDatingRepository;
use Psr\Log\LoggerInterface;

abstract class JobDatingAction extends Action
{
    /**
     * @var JobDatingRepository
     */
    protected $jobDatingRepository;

    /**
     * @param LoggerInterface $logger
     * @param JobDatingRepository  $jobDatingRepository
     */
    public function __construct(LoggerInterface $logger, JobDatingRepository $jobDatingRepository)
    {
        parent::__construct($logger);
        $this->jobDatingRepository = $jobDatingRepository;
    }
}
