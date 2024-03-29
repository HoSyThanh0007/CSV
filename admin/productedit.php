<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once  '../classes/brand.php';?>
<?php include_once  '../classes/categori.php';?>
<?php include_once  '../classes/product.php';?>
<?php
$pd = new product();
if(!isset($_GET['productId']) || $_GET['productId'] == NULL){
    echo "<script>window.location = 'productlist.php'</script>";
}
    else{
        $id = $_GET['productId'];
    }
    if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['submit'])){
    
        $updateProduct = $pd->update_product($_POST,$_FILES,$id);
    }
    else{
        $updateProduct= "<span class='success'>.....</span>";
    }
    if(isset($_POST['submit1'])){
        echo "<script>window.location = 'productlist.php'</script>";

    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm sản phẩm</h2>
        <div class="block">               
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               <?php
               if($updateProduct){
                echo $updateProduct;
               }
               ?>
               <?php
               $get_product_by_id = $pd->getproductbyId($id);
               if($get_product_by_id){
                while($result_product = $get_product_by_id->fetch_assoc()){

                
               ?>
                <tr>
                    <td>
                        <label>Tên</label>
                    </td>
                    <td>
                        <input type="text" name="productName" value="<?php echo $result_product['productName'] ?>" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Danh mục</label>
                    </td>
                    <td>
                        <select id="select" name="categori">
                            <option>Chọn danh mục</option>
                            <?php
                            $cat= new categori();
                            $catlist = $cat->show_categori();
                            if($catlist){
                                while($result=$catlist->fetch_assoc()){

                            ?>
                            <option
                            <?php
                            if($result['catId'] == $result_product['catId']){ echo 'selected';}
                            ?>
                            value="<?php echo $result['catId'] ?>"><?php echo $result['catName'] ?></option>
                            <?php
                             }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Thương hiệu</label>
                    </td>
                    <td>
                        <select id="select" name="brand">
                            <option>Chọn thương hiệu</option>
                            <?php
                            $brand= new brand();
                            $brandlist = $brand->show_brand();
                            if($brandlist){
                                while($result=$brandlist->fetch_assoc()){

                            ?>
                            <option
                            <?php
                            if($result['brandId'] == $result_product['brandId']){ echo 'selected';}
                            ?>
                            value="<?php echo $result['brandId'] ?>"><?php echo $result['brandName'] ?></option>
                            <?php
                             }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea name = "product_desc" class="tinymce"><?php echo $result_product['product_desc'] ?></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" value = "<?php echo $result_product['price'] ?>" name="price" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                    <img src="uploads/<?php echo $result_product['image'] ?>"width="50"><br>
                        <input type="file" name= "image"/>
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Select Type</option>
                            <?php
                            if($result_product['type']==1){
                            ?>
                            <option selected value="1">Featured</option>
                            <option value="0">Non-Featured</option>
                            <?php
                            }else{
                                ?>
                            <option value="1">Featured</option>
                            <option selected value="0">Non-Featured</option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Sửa" />
                        <input Type="submit" name= "submit1" Value = "Quay lại" />
                    </td>

                </tr>
            </table>
            </form>
            <?php
            }
        }
            ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


