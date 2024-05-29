<?php
class ProductManager extends Controller{
    public $productModel;

    public function __construct()
    {
        $this->productModel = $this->model("ProductModel")    ;
    }

    function displayIntrouction()
    {
        $this->view("master",["Page" => "home"]);
    }

    function getProductsbyBand()
    {
        $this->view("master",["Page"=>"getProductsbyBand"]);
    }

    public function displayProductByBand(){
        if(isset($_POST["btSearch"])){
            $band = $_POST["selectBand"];
            $tblname = 'tblproduct';
            $field = 'band';
            $products = $this->productModel->getRecordsbyField($tblname,$field,$band);
            $this->view("master",["Page"=>"getProductsbyBand","Products"=>$products]);
        }
    }
//---------------------------------------------------------------
    function getProductsbyYear()
    {
        $this->view("master",["Page"=>"getProductsbyYear"]);
    }

    public function displayProductByYear(){
        if(isset($_POST["btSearch1"])){
            $Year = $_POST["selectYear"];
            $tblname = 'tblproduct';
            $field = 'year';
            $products = $this->productModel->getRecordsbyField($tblname,$field,$Year);
            $this->view("master",["Page"=>"getProductsbyYear","Products"=>$products]);
        }
    }
//-------------------------------------------------
    function getProducts()
    {
        $this->view("master",["Page"=>"getProducts"]);
    }

    public function displayProducts(){
        if(isset($_POST["btSearch2"])){
            $Year = $_POST["selectYear"];
            $band = $_POST["selectBand"];
            $tblname = 'tblproduct';
            $field1 = 'band';
            $field2 = 'year';

            $products = $this->productModel->getRecordsbyFields($tblname,$field1,$band,$field2,$Year);
            $this->view("master",["Page"=>"getProducts","Products"=>$products]);
        }
    }

    function impInsertProduct()
    {
        $this->view("master",["Page"=>"insertProduct"]);
    }

    public function insertProduct(){
        if(isset($_POST["btInsert"])){
            $id = $_POST["id"];
            $pname = $_POST["pname"];
            $company = $_POST["company"];
            $year = $_POST["selectYear"];
            $band = $_POST["selectBand"];
            
            if (isset($_FILES['imageFile'])&& $_FILES['imageFile']['error'] === UPLOAD_ERR_OK){
                $pimage = 'data:image/png;base64,'
                .base64_encode(file_get_contents($_FILES['imageFile']['tmp_name']));
            }
        }
        $result = $this->productModel->
        insertProduct($id,$pname,$company,$year,$band,$pimage);
        $this->view("master",["Page"=>"insertProduct","result"=>$result]);
    }
}