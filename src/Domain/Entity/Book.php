<?php

namespace App\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

/**
 * Books
 *
 * @ORM\Table(name="books")
 * @ORM\Entity
 */
class Book implements JsonSerializable
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private int $id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=45, nullable=true)
     */
    private string $title;

    public function __construct(string $title)
    {
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => (string) $this->id,
            'title' => $this->title,
        ];
    }
}