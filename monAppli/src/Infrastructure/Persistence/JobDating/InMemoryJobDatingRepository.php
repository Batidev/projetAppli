<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\JobDating;

use  App\Domain\JobDating\JobDating;
use App\Domain\JobDating\JobDatingNotFoundException;
use App\Domain\JobDating\JobDatingRepository;

class InMemoryJobDatingRepository implements JobDatingRepository
{
    /**
     * @var JobDating[]
     */
    private $jobDatings;

    /**
     * InMemoryJobDatingRepository constructor.
     *
     * @param array|null $jobDatings
     */
    public function __construct(array $jobDatings = null)
    {
        $this->jobDatings = $jobDatings ?? [
            1 => new JobDating(1, 'bill.gates', 'Ruben', 'Ramos'),
            2 => new JobDating(2, 'steve.jobs', 'Imed', 'Salhi'),
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        // request BDD
        // return results
        return array_values($this->jobDatings);
    }

    /**
     * {@inheritdoc}
     */
    public function findJobDatingOfId(int $id): JobDating
    {
        // request BDD
        // if idJobDating not found
        if (!isset($this->jobDatings[$id])) {
            // throw exeption
            throw new JobDatingNotFoundException();
        }

        // return JobDating
        return $this->jobDatings[$id];
    }
}
