<?php
/**
 * Created by PhpStorm.
 * User: digital
 * Date: 2019-03-12
 * Time: 09:18
 */

namespace App\Entity;

use GraphAware\Neo4j\OGM\Annotations as OGM;

/**
 * @OGM\RelationshipEntity(type="CONSULTE")
 */
class Consultation
{
    /**
     * @OGM\GraphId()
     */
    protected $id;

    /** @OGM\StartNode(targetEntity="Visitor")  */
    protected $visitor;

    /** @OGM\EndNode(targetEntity="Property")  */
    protected $property;

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
}