<?php
class ProductModel extends dbProduct
{
    public function getRecords($tablename){

        $qr = "SELECT * from $tablename";
        return mysqli_query($this->con, $qr);
    }

    public function getRecordsbyField($tblname,$field,$keyword){
        $sqr = "SELECT * from $tblname where $field = '$keyword' ";
        return mysqli_query($this->con, $sqr);
    }

    public function getRecordsbyFields($tblname,$field1,$keyword1,$field2,$keyword2){
        if($keyword1=="null" && $keyword2 !== "null" ){
            $sqr = "SELECT * from $tblname where  $field2 = '$keyword2'";
            return mysqli_query($this->con, $sqr);
        }
        if($keyword2=="null" && $keyword1 !== "null" ){
            $sqr = "SELECT * from $tblname where $field1 = '$keyword1'";
            return mysqli_query($this->con, $sqr);
        }
        if($keyword1!=="null" && $keyword2 !== "null"){
        $sqr = "SELECT * from $tblname where $field1 = '$keyword1'AND $field2 = '$keyword2'";
        return mysqli_query($this->con, $sqr);
        }
        if($keyword1=="null" && $keyword2 == "null"){
            $sqr = "SELECT * from $tblname where 1";
            return mysqli_query($this->con, $sqr);
        }
        
        
        
    }
    
    public function insertProduct($id, $pname, $company, $year, $band, $pimage)
        {
            $result = false;
            $sql = "INSERT INTO tblProduct(pid, pname, company, year, band, pimage)
                                    values('$id' , '$pname' , '$company' , '$year' , '$band' , '$pimage')";
            if(mysqli_query($this->con,$sql)){
                $result = true;
            }
            return json_decode($result);
        }

}
?>