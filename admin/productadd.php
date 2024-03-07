<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once  '../classes/brand.php';?>
<?php include_once  '../classes/categori.php';?>
<?php include_once  '../classes/product.php';?>
<?php include_once  '../classes/diaChi.php';?>
<?php
$pd = new product();
if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['submit'])){
    $insertProduct = $pd->insert_product($_POST,$_FILES);
}else{
    $insertProduct= "<span class='success'>.....</span>";
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Cựu sinh viên</h2>
        <div class="block">               
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               <?php
               if($insertProduct){
                echo $insertProduct;
               }
               ?>
               <tr>
                    <td>
                        <label>Mã sinh viên</label>
                    </td>
                    <td>
                        <input type="text" name="msv" placeholder="Nhập mã sinh viên..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Tên sinh viên</label>
                    </td>
                    <td>
                        <input type="text" name="tenSV" placeholder="Nhập tên sinh viên..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Số điện thoại</label>
                    </td>
                    <td>
                        <input type="text" name="sdt" placeholder="Nhập số điện thoại..." class="medium" />
                    </td>
                </tr>
                <tr>
                <td> <label >Địa chỉ</label></td>
                    <td>
                        <select id = "select" name = "address">
                        <?php
                            $dc= new diaChi();
                            $dcList = $dc->show_diaChi();
                            if($dcList){
                                while($result=$dcList->fetch_assoc()){
                                     
                            ?>
                            <option value="<?php echo $result['id'] ?>"><?php echo $result['_name'] ?></option> 
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Số điện thoại</label>
                    </td>
                    <td>
                        <input type="text" name="sdt" placeholder="Nhập số điện thoại..." class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Khoa đào tạo</label>
                    </td>
                    <td>
                        <select id="select" name="categori">
                            <option>Chọn Khoa</option>
                            <?php
                            $cat= new categori();
                            $catlist = $cat->show_categori();
                            if($catlist){
                                while($result=$catlist->fetch_assoc()){

                            ?>
                            <option value="<?php echo $result['id'] ?>"><?php echo $result['tenNganh'] ?></option>
                            <?php
                             }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Lớp</label>
                    </td>
                    <td>
                        <select id="select" name="brand">
                            <option>Chọn Lớp</option>
                            <?php
                            $brand= new brand();
                            $brandlist = $brand->show_brand();
                            if($brandlist){
                                while($result=$brandlist->fetch_assoc()){

                            ?>
                            // <option value="<?php echo $result['id'] ?>"><?php echo $result['tenLop'] ?>
                        </option>
                            <?php
                             }
                            }
                            ?>
                        </select>
                    </td>
                    
                    
                </tr>
                <tr>
                <td> <label >Địa chỉ</label></td>
                    <td>
                        <select id = "select" name = "address">
                        <?php
                            $dc= new diaChi();
                            $dcList = $dc->show_diaChi();
                            if($dcList){
                                while($result=$dcList->fetch_assoc()){
                                     
                            ?>
                            <option value="<?php echo $result['id'] ?>"><?php echo $result['_name'] ?></option> 
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
                        <textarea name = "product_desc" class="tinymce"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" name="price" placeholder="Enter Price..." class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input type="file" name= "image"/>
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Tình trạng việc làm</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Tình trạng</option>
                            <option value="1">Chưa có việc</option>
                            <option value="0">Đã có việc</option>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Thêm" />
                    </td>
                </tr>
            </table>
            </form>
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


