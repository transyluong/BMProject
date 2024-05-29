
    
<?php
            //kiem tra xam form da dc gui di hay chua
            if($_SERVER['REQUEST_METHOD']=="POST"){
                //xu ly du lieu formo day

                //gan gia tri cho action sau khi xu ly form
                $newAction= "";
            }else{
                //gia tri action ban dau
                $newAction = "insertProduct";
            }?>


    <form action="<?php echo $newAction; ?>" method="post" enctype="multipart/form-data">
        <label class="from-label" for="id_product">ID Product:</label><br>
        <input class="form-control" type="text" id="id" name="id"><br><br>

        <label  class="from-label" for="product_name">Product Name:</label><br>
        <input  class="form-control" type="text" id="pname" name="pname"><br><br>

        <label class="from-label" for="company">Company:</label><br>
        <input class="form-control" type="text" id="company" name="company"><br><br>

        <label class="from-label" for="select_band">Select Band:</label><br>
        <input class="form-control" type="text" id="select_band" name="selectBand" value="Minocin"><br><br>

        <label class="from-label" for="select_year">Select Year:</label><br>
        <input class="form-control" type="text" id="selectyear" name="selectYear" value="2015"><br><br>

        

        
    


<div class="mb-3">
    <label for="" class="from-label">Choose image</label>
    <input type="file" class="from control" name="imagefile">
</div>
<button type="submit" name="btInsert" class="btn btn-primary">Insert</button>
</div>

</form>



<?php
        if(isset($data["result"])){
            if($data["result"]){
                echo "them moi thanh cong ";
            }else{
                echo "them moi khong thanh cong";
            }
        }
?>
