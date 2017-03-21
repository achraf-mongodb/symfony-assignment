<?php

namespace Test\InterviewBundle\Repository;

use Doctrine\ODM\MongoDB\DocumentRepository;
use Test\InterviewBundle\Enumerations\BiosEnum;

class BiosRepository extends DocumentRepository
{
    /**
     * @param string $firstName
     * @return array
     */
    public function findByFirstName($firstName)
    {
        return $this->createQueryBuilder()
            ->field(BiosEnum::FIRST_NAME)->equals($firstName)
            ->getQuery()
            ->execute()
            ->toArray()
        ;
    }

    /**
     * @param string $contributionName
     * @return array
     */
    public function findByContribution($contributionName)
    {
        return $this->createQueryBuilder()
            ->field(BiosEnum::CONTRIBS)
            ->equals($contributionName)
            ->hydrate(false)
            ->getQuery()
            ->execute()
            ->toArray()
        ;
    }

    /**
     * @param integer $year
     * @return array
     */
    public function findByDeadBefore($year)
    {
        return $this->createQueryBuilder()
            ->field(BiosEnum::DEATH)
            ->lt(new \DateTime(sprintf("%s-01-01", $year)))
            ->getQuery()
            ->execute()
            ->toArray()
        ;
    }

    /**
     * @return array
     */
    public function getAllContributions()
    {
        return $this->createQueryBuilder()
            ->distinct(BiosEnum::CONTRIBS)
            ->getQuery()
            ->execute()
            ->toArray()
        ;
    }

    /**
     * @return array
     */
    public function getAllAwards()
    {
        return $this->createQueryBuilder()
            ->distinct(BiosEnum::AWARDS)
            ->getQuery()
            ->execute()
            ->toArray()
        ;
    }

    /**
     * @param string $id
     * @return array
     */
    public function findById($id)
    {
        /** Since we have 2 data types of ID field, Object & Integer */
        if (\MongoId::isValid($id)) {
            $id = new \MongoId($id);
        } elseif (is_numeric($id)) {
            $id = (int) $id;
        }

        return $this->find($id);
    }
}
