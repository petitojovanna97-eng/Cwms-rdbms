<?php
class Book {
    private $title;
    private $author;
    private $status;

    public function __construct($title, $author, $status = "Available") {
        $this->title = $title;
        $this->author = $author;
        $this->status = $status;
    }

    public function borrow() {
        if ($this->status === "Available") {
            $this->status = "Borrowed";
            return true;
        }
        return false;
    }

    public function returnBook() {
        $this->status = "Available";
    }

    public function getStatus() {
        return $this->status;
    }
}
?>