<?php declare(strict_types=1);

namespace Demo;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="demo")
 */
class DoctrineDemoEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank()
     */
    private $name;

    public function id()
    {
        return $this->id;
    }

    public function name()
    {
        return $this->name;
    }

}
