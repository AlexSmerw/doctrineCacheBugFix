<?php
namespace doctrineCacheBugFix\Car;

use Doctrine\ORM\Mapping\Cache;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\Table;

/**
 * @Entity
 * @Table(name="power", schema="test")
 * @Cache(usage="READ_ONLY", region="power")
 */
class Power
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private $id;

    /**
     * @var integer
     * @Column(name="horse_power", type="integer", nullable=false)
     */
    protected $horsePower;

    /**
     * @var integer
     * @Column(name="kilowatt", type="integer", nullable=false)
     */
    protected $kilowatt;

    /**
     * @var Engine
     * @OneToOne(targetEntity="Engine")
     * @Cache("READ_ONLY")
     * @JoinColumn(name="engine_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $engine;

    /**
     * Power constructor.
     * @param int $horsePower
     * @param int $kilowatt
     * @param Engine $engine
     */
    public function __construct(int $horsePower, int $kilowatt, Engine $engine)
    {
        $this->horsePower = $horsePower;
        $this->kilowatt = $kilowatt;
        $this->engine = $engine;
    }

    /**
     * @return int
     */
    public function getHorsePower(): int
    {
        return $this->horsePower;
    }

    /**
     * @return int
     */
    public function getKilowatt(): int
    {
        return $this->kilowatt;
    }

    /**
     * @return Engine
     */
    public function getEngine(): Engine
    {
        return $this->engine;
    }
}
