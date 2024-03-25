<?php

//require_once 'vendor/autoload.php';

use App\Book;
use App\BooksList;

function runTest()
{
    $book1 = (new Book())->setTitle("Clean Code: A Handbook of Agile Software Craftsmanship")
                        ->setAuthors(["Robert C. Martin"])
                        ->setPublisher("Prentice Hall")
                        ->setYear(2008);
    $book2 = (new Book())->setTitle("Introduction to Algorithms")
                        ->setAuthors(["Thomas H. Cormen", "Charles E. Leiserson", "Ronald L. Rivest", "Clifford Stein"])
                        ->setPublisher("The MIT Press")
                        ->setYear(2009);
    $book3 = (new Book())->setTitle("Structure and Interpretation of Computer Programs (SICP)")
                        ->setAuthors(["Harold Abelson", "Gerald Jay Sussman", "Julie Sussman"])
                        ->setPublisher("The MIT Press")
                        ->setYear(1996);
    $book4 = (new Book())->setTitle("The Clean Coder: A Code of Conduct for Professional Programmers")
                        ->setAuthors(["Robert C. Martin"])
                        ->setPublisher("Prentice Hall")
                        ->setYear(2011);
    echo $book1 . "\n";
    echo "\n" . $book2 . "\n";
    echo "\n" . $book3 . "\n";
    echo "\n" . $book4 . "\n";

    $booksList = new BooksList();
    $booksList->add($book1);
    $booksList->add($book2);
    $booksList->add($book3);
    $booksList->add($book4);
    echo "\nКоличество книг: " . $booksList->count() . "\n";

    $fileName = "books.txt";
    $booksList->store($fileName);

    $loadedBooksList = new BooksList();
    $loadedBooksList->load($fileName);
    echo "Количество книг после загрузки: " . $loadedBooksList->count() . "\n";
}