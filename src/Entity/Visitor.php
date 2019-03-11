<?php
/**
 * Created by PhpStorm.
 * User: digital
 * Date: 2019-03-11
 * Time: 14:19
 */

namespace App\Entity;

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


}