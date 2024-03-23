<?php

namespace App;

require_once 'Book.php';

class BooksList
{
    private $books = [];

    public function add(Book $book)
    {
        $this->books[] = $book;
        return $this;
    }

    public function count(): int
    {
        return count($this->books);
    }

    public function get(int $n): Book
    {
        return isset($this->books[$n]) ? $this->books[$n] : null;
    }

    public function store(string $fileName)
    {
        file_put_contents($fileName, serialize($this->books));
    }

    public function load(string $fileName)
    {
        if (file_exists($fileName)) {
            $this->books = unserialize(file_get_contents($fileName));
        }
    }
}
