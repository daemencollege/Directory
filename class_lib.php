<?php
class Person {
    
    private var $id;
    var $first_name;
    var $last_name;
    
    function __construct($id, $first_name, $last_name)
    {
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
    }
    
    function get_id()
    {
        return $this->id;
    }
    
    function get_first_name()
    {
        return $this->first_name;    
    }
    
    function get_last_name()
    {
        return $this->last_name;
    }
    
    function get_full_name()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

} //End of class Person

class Employee extends Person {
    
}
?>