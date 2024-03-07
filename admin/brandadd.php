<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php' ?>
<?php include '../classes/categori.php' ?>
<?php
$brand = new brand();
if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['submit'])){

	$insertBrand = $brand->insert_brand($_POST,$_FILES);
}

// $pd = new product();
// if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['submit'])){
//     $insertProduct = $pd->insert_product($_POST,$_FILES);
// }else{
//     $insertProduct= "<span class='success'>.....</span>";
// }
?>
        <div class="grid_10"> 
            <div class="box round first grid">
                <h2>Thêm viện</h2>
               <div class="block copyblock"> 
                 <form action="brandadd.php" method="post">
                    <table class="form">	
                    <?php
                if(isset($insertBrand)){
                    echo $insertBrand;
                }
                ?>
                        <tr>
                            <td>
                                <input type="text" name = "brandName" placeholder="Thêm viện...." class="medium" />
                            </td>
                        </tr>
                        
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Lưu" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>