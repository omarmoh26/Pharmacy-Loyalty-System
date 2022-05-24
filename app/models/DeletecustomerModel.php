<?php
class DeletecustomerModel extends model
{    protected $id;

     public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

     public function DeleteCustomer($id)
    {
        $conn = new mysqli("localhost", "root", "", "pharmacy_loyalty_system");
        $sql="DELETE FROM customer WHERE id=$id ";
        $results= $conn->query($sql);

        if (!$results){
            trigger_error("<h1 style='color:red;'>fatal error in executing query</h1>",E_USER_WARNING);
        }
        else
            return true;
    }
     
}