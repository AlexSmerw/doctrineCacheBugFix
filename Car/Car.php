<?php
namespace doctrineCacheBugFix\Car;

use Doctrine\ORM\Mapping\Cache;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;

/**
 * @Entity
 * @Table(name="car", schema="test")
 * @Cache(usage="READ_ONLY", region="car")
 */
class Car
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private $id;

    /**
     * @var Engine
     * @Cache("READ_ONLY")
     * @ManyToOne(targetEntity="SD\Domain\PersistModel\Car\Engine")
     * @JoinColumn(name="engine", referencedColumnName="id", nullable=false)
     */
    protected $engine;

    /**
     * @var string
     * @Column(name="color", type="text", nullable=false)
     */
    protected $color;

    /**
     * Car constructor.
     * @param Engine $engine
     * @param string $color
     */
    public function __construct(string $color, Engine $engine)
    {
        $this->color = $color;
        $this->engine = $engine;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Engine
     */
    public function getEngine(): Engine
    {
        return $this->engine;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }
}
