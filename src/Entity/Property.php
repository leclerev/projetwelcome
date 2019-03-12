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
     * @OGM\Property(type="int")
     */
    protected $mySqlId;
    /**
     * @var Consultation[]
     *
     * @OGM\Relationship(relationshipEntity="Consultation", type="CONSULTE", direction="INCOMING", collection=true, mappedBy="property")
     */
    private $consultation;




    /**
     * Property constructor.
     * @param $id
     * @param $name
     * @param $address
     * @param $MySqlId
     */
    public function __construct($name, $address, $MySqlId)
    {
        $this->name = $name;
        $this->address = $address;
        $this->mySqlId = $MySqlId;
        $this->consultation = new ArrayCollection();
    }

    /** Getter / Setter */
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
    public function getMySqlId()
    {
        return $this->mySqlId;
    }

    /**
     * @param mixed $MySqlId
     */
    public function setMySqlId($MySqlId): void
    {
        $this->mySqlId = $MySqlId;
    }

    /**
     * @return Consultation[]
     */
    public function getConsultation(): array
    {
        return $this->consultation;
    }

    /**
     * @param Consultation[] $consultation
     */
    public function setConsultation(array $consultation): void
    {
        $this->consultation = $consultation;
    }

    /**
     * @param Consultation[] $consultation
     */
    public function addConsultation($consultation): void
    {
        $this->consultation[] = $consultation;
    }
}