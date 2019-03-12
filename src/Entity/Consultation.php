<?php
/**
 * Created by PhpStorm.
 * User: digital
 * Date: 2019-03-12
 * Time: 09:58
 */

namespace App\Entity;
use App\Entity\Property;
use App\Entity\Visitor;
use GraphAware\Neo4j\OGM\Annotations as OGM;

/**
 * @OGM\RelationshipEntity(type="CONSULTE")
 */
class Consultation
{
    /**
     * @OGM\GraphId()
     */
    private $id;
    /**
     * @OGM\StartNode(targetEntity="Visitor")
     */
    private $visitor;

    /**
     * @OGM\EndNode(targetEntity="Property")
     */
    private $property;

    /** @OGM\Property(type="int") */
    private $qte;

    /**
     * Consultation constructor.
     * @param $visitor
     * @param $property
     * @param $qte
     */
    public function __construct($qte)
    {
        $this->qte = $qte;
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
    public function getVisitor()
    {
        return $this->visitor;
    }

    /**
     * @param mixed $visitor
     */
    public function setVisitor($visitor): void
    {
        $this->visitor = $visitor;
    }

    /**
     * @return mixed
     */
    public function getProperty()
    {
        return $this->property;
    }

    /**
     * @param mixed $property
     */
    public function setProperty($property): void
    {
        $this->property = $property;
    }

    /**
     * @return mixed
     */
    public function getQte()
    {
        return $this->qte;
    }

    /**
     * @param mixed $qte
     */
    public function setQte($qte): void
    {
        $this->qte = $qte;
    }

    /**
     * @param mixed $qte
     */
    public function incQte($incVal): void
    {
        $this->qte += $incVal;
    }


}