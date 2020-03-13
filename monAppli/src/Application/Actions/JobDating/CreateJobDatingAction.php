<?php
declare(strict_types=1);

namespace App\Application\Actions\JobDating;

use App\Domain\JobDating\JobDating;
use Psr\Http\Message\ResponseInterface as Response;

class CreateJobDatingAction extends JobDatingAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $jobDatingId = (int) $this->resolveArg();

        $datas = $this->getFormData();
        /**
         * @var JobDating
         */
        $jobDating = $this->jobDatingRepository->Create($jobDatingId);

        /**
         * @var bool
         */
        $response = $jobDating->create($datas);

        $this->logger->info("JobDating of id `${jobDatingId}` was viewed.");

        return $this->respondWithData(['status'=>$response, "jobdating"=>$jobDating]);
    }
}