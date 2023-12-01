<?php

namespace Model;

class Product
{
    private ?int $id;
    private String $type;
    private String $name;
    private String $description;
    private float $price;
    private String $image;

    public function __construct(
        ?int $id,
        string  $type,
        string  $name,
        string  $description,
        float   $price,
        string  $image = 'logo-serenatto.png'
    )
    {
        $this->id = $id;
        $this->type = $type;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
    public function getImage(): string
    {
        return $this->image;
    }
    public function getImageDiretory(): string
    {
        return 'img/'.$this->image;
    }

    public function getFormattedPrice(): string
    {
        return 'R$ '.number_format($this->price,2);
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }

}