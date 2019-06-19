<?php
namespace doctrineCacheBugFix\Car;

use Doctrine\ORM\Mapping\Cache;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\PersistentCollection;

/**
 * @Entity
 * @Table(name="engine", schema="test")
 * @Cache(usage="READ_ONLY", region="engine")
 */
class Engine
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private $id;

    /**
     * @var Power
     * @Cache("READ_ONLY")
     * @OneToOne(targetEntity="Power", mappedBy="engine")
     */
    private $power;

    /**
     * @var PersistentCollection|null
     * @OneToMany(targetEntity="Car", mappedBy="engine")
     */
    private $car;

    /**
     * @var string
     * @Column(name="model", type="string", nullable=false)
     */
    private $model;

    /**
     * Engine constructor.
     * @param string $model
     */
    public function __construct(string $model)
    {
        $this->model = $model;
    }

    /**
     * @return Power
     */
    public function getPower(): Power
    {
        return $this->power;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }
}
