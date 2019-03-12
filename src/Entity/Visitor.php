<?php
/**
 * Created by PhpStorm.
 * User: digital
 * Date: 2019-03-11
 * Time: 14:19
 */

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use GraphAware\Neo4j\OGM\Annotations as OGM;

/**
 * @OGM\Node(label="Visitor")
 */
class Visitor
{
    /**
     * @OGM\GraphId()
     */
    protected $id;

    /** @OGM\Property(type="string") */
    protected $name;

    /**
     * @OGM\Relationship(relationshipEntity="App\Entity\Consultation", type="CONSULTE", direction="OUTGOING", collection=true)
     * @var Consultation[]|ArrayCollection
     */
    protected $consultations;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    public function __construct(string $userName)
    {
        $this->setName($userName);
        $this->consultations = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getConsultations()
    {
        return $this->consultations;
    }

    /**
     * @param mixed $consultations
     */
    public function setConsultations($consultations): void
    {
        $this->consultations = $consultations;
    }

    /**
     * @param mixed $consultations
     */
    public function addConsultation($consultation): void
    {
        $this->consultations->add($consultation);
    }
}