<?php

namespace Test\InterviewBundle\Services;

use Test\InterviewBundle\Document\Bios;
use Test\InterviewBundle\Repository\BiosRepository;
use Doctrine\Bundle\MongoDBBundle\ManagerRegistry;

class BiosService
{
    /**
     * @var ManagerRegistry
     */
    private $doctrine;

    /**
     * @var BiosRepository
     */
    private $biosRepository;

    /**
     * @param ManagerRegistry $doctrine
     */
    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine        = $doctrine;
        $this->biosRepository = $this->doctrine->getRepository(Bios::class);
    }

    /**
     * @return BiosRepository
     */
    public function getRepository()
    {
        return $this->biosRepository;
    }

    /**
     * @param string $contributionName
     * @return array
     */
    public function findByContribution($contributionName)
    {
        return $this->biosRepository->findByContribution($contributionName);
    }

    /**
     * @param string $firstName
     * @return array
     */
    public function findByFirstName($firstName)
    {
        return $this->biosRepository->findByFirstName($firstName);
    }

    public function findByDeadBefore($year)
    {
        return $this->biosRepository->findByDeadBefore($year);
    }

    /**
     * @return array
     */
    public function getAllContributions()
    {
        return $this->biosRepository->getAllContributions();
    }

    /**
     * @return array
     */
    public function getAllAwards()
    {
        return $this->biosRepository->getAllAwards();
    }

    /**
     * @param string $id
     * @return array
     */
    public function findById($id)
    {
        return $this->biosRepository->findById($id);
    }
}
