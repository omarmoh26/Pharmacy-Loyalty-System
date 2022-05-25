<?php
class searchformModel extends model
{
    protected $input;

    public function getInput()
    {
        return $this->input;
    }

    public function setInput($input)
    {
        $this->input = $input;
    }

     public function getAjaxSearch(){

        $con = mysqli_connect("localhost", "root", "", "pharmacy_loyalty_system");
        $query = "SELECT * FROM product WHERE name LIKE'{$this->input}%'";
        $result = mysqli_query($con, $query);
        if (!$result)
            trigger_error("<h1 style='color:red;'>fatal error in executing query</h1>",E_USER_WARNING);
        else
            return $result;

     }
}