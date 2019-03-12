<?php
/**
 * Created by PhpStorm.
 * User: digital
 * Date: 2019-03-11
 * Time: 14:19
 */

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @var Consultation[]
     *
     * @OGM\Relationship(relationshipEntity="Consultation", type="CONSULTE", direction="OUTGOING", collection=true, mappedBy="visitor")
     */
    private $consultation;

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

    public function __construct(string $userName)
    {
        $this->setName($userName);
        $this->consultation = new ArrayCollection();    // par défaut, on crée un tableau vide de lien
    }

    /**
     * @return Consultation[]
     */
    public function getConsultation(): Collection
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