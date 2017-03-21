<?php

namespace Test\InterviewBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(db="test", collection="Bios", repositoryClass="Test\InterviewBundle\Repository\BiosRepository")
 */
class Bios
{
    /**
     * @MongoDB\Id(strategy="NONE")
     */
    protected $id;

    /**
     * @MongoDB\Field(type="hash")
     */
    protected $name;

    /**
     * @MongoDB\Field(type="date")
     */
    protected $birth;

    /**
     * @MongoDB\Field(type="date")
     */
    protected $death;

    /**
     * @MongoDB\Field(type="collection")
     */
    protected $contribs;

    /**
     * @MongoDB\Field(type="collection")
     */
    protected $awards;

    /** TODO : document setters & getters */
    /** TODO : creating Indexes on searchable fields */
}
