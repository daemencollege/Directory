<?php
class Employee extends Person
{
    private $email;
    private $phone;
    private $office;
    private $mailbox;
    private $departments;
    
    function __construct(QueryResult $result)
    {
        parent::__construct($result->id, $result->firstName, $result->lastName, $result->title, $result->photo);
        $this->email = $result->email;
        $this->phone = $this->formatPhone($result->phone);
        $this->office = $result->office;
        $this->mailbox = $result->mailbox;
    }
    
    public function getEmail()
    {
        return $this->email;
    }
    
    public function getPhone()
    {
        return $this->phone;
    }
        
    public function getOffice()
    {
        return $this->office;
    }
    
    public function getMailBox()
    {
        return $this->mailbox;
    }
    
    public function getDepartments()
    {
        if (empty($departments)) {
            $this->departments = $this->queryDepartments();
        }
        return implode(', ', array_map(function($department){
            return $department->name;
        }, $this->departments));
    }
    
    private function formatPhone($number)
    {
        return substr($number,0,3). '-' . substr($number,3); 
    }
    
    public function printEmailAsLink()
    {
        echo '<a href="mailto:' . $this->email . '">' . $this->email . '</a>';
    }
    
    public function printPhoneAsLink()
    {
        echo '<a href="tel:1-555-' . $this->phone . '">' . $this->phone . '</a>';
    }
    
    private function queryDepartments()
    {
        $db = new Database();
		$query = "SELECT name FROM departments JOIN in_department ON id = department_id WHERE person_id = {$this->id} ORDER BY name";
		$results = $db->select($query);
		return $results;
    }  
}    
?>