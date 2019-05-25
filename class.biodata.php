<?php
class biodata{
    private $dbconfig;

    function __construct($dbconfig){
        $this->db = $dbconfig;
    } 
    public function createprogrammer($nama){
    try{
    $stmt = $this->db->prepare("INSERT INTO user(nama) values(:nama)");
    $stmt->bindparam(':nama',$nama);
    $stmt->execute();
    return true;
        }catch(PDOException $e){
            echo $e->getMessage();
        } 
    }
    public function createskill($name_skill,$id_user){
        try{
    $stmt = $this->db->prepare("INSERT INTO skill(name_skill,id_user) values(:name_skill,:id_user)");
    $stmt->bindparam(':name_skill',$name_skill);
    $stmt->bindparam(':id_user',$id_user);
    $stmt->execute();
    return true;
        }catch(PDOException $e){
            echo $e->getMessage();
        } 
    }
}
?>