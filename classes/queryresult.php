<?php
class QueryResult {
    
    private $results = array();
    
    public function __construct () 
    {
    }
    
    public function set($var, $val)
    {
        $this->results[$var] = $val;
    }
    
    public function get($var)
    {
        if (isset($this->results[$var])) {
            return $this->results[$var];
        } else {
            return null;
        }
    }
}
?>