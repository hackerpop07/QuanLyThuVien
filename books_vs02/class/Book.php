<?php


class Book
{
    public $name;
    public $author;
    public $price;
    public $image;
    public $quatity;
    public $id;

    public function __construct($name, $author, $price, $image, $quatity, $id = '')
    {
        $this->id = $id;
        $this->name = $name;
        $this->author = $author;
        $this->price = $price;
        $this->image = $image;
        $this->quatity = $quatity;
    }
}