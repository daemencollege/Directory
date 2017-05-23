<?php
class Person
{
    protected $id;
    protected $firstName;
    protected $lastName;
    protected $fullName;
    protected $title;
    protected $photo;
    //protected $email;
    
    function __construct($id, $firstName, $lastName, $title, $photo)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->fullName = $firstName . ' ' . $lastName;
        $this->title = $title;
        $this->photo = $photo;
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function getFirstName()
    {
        return $this->firstName;
    }
    
    public function getLastName()
    {
        return $this->lastName;
    }
    
    public function getFullName()
    {
        return $this->fullName;
    }
    
    public function getTitle()
    {
        return $this->title;
    }
    
    public function getPhoto()
    {
        return $this->photo;
    }
}
?>