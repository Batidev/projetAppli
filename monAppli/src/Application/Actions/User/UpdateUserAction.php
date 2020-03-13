<?php
declare(strict_types=1);

namespace App\Application\Actions\User;

use App\Domain\User\User;
use Psr\Http\Message\ResponseInterface as Response;

class UpdateUserAction extends UserAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $userId = (int) $this->resolveArg('id');

        $datas = $this->getFormData();
        /**
         * @var User
         */
        $user = $this->userRepository->findUserOfId($userId);

        /**
         * @var bool
         */
        $response = $user->update($datas);

        $this->logger->info("User of id `${userId}` was viewed.");

        return $this->respondWithData(['status'=>$response, "user"=>$user]);
    }
}