<?php
/**
 * Created by PhpStorm.
 * User: digital
 * Date: 2019-03-11
 * Time: 14:35
 */

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use GraphAware\Neo4j\OGM\Annotations as OGM;

/**
 * @OGM\Node(label="Property")
 */
class Property
{
    /**
     * @OGM\GraphId()
     */
    protected $id;

    /**
     * @OGM\Property(type="string")
     */
    protected $name;

    /**
     * @OGM\Property(type="string")
     */
    protected $address;

    /**
     * @OGM\Relationship(relationshipEntity="App\Entity\Consultation", type="CONSULTE", direction="INCOMING", collection=true)
     * @var Consultation[]|ArrayCollection
     */
    protected $consultations;

    public function __construct()
    {
        $this->consultations = new ArrayCollection();
    }

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

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address): void
    {
        $this->address = $address;
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