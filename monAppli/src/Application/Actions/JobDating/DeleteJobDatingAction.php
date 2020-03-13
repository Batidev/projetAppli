<?php
declare(strict_types=1);

namespace App\Application\Actions\JobDating;

use App\Domain\JobDating\JobDating;
use Psr\Http\Message\ResponseInterface as Response;

class DeleteJobDatingAction extends JobDatingAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $jobDatingId = (int) $this->resolveArg('id');

        $datas = $this->getFormData();
        /**
         * @var JobDating
         */
        $jobDating = $this->jobDatingRepository->findUserOfId($jobDatingId);

        /**
         * @var bool
         */
        $response = $jobDating->delete($datas);

        $this->logger->info("JobDating of id `${jobDatingId}` was viewed.");

        return $this->respondWithData(['status'=>$response, "jobdating"=>$jobDating]);
    }
}