<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/doanhNghiep.php' ?>
<?php
$cat = new doanhNghiep();
if($_SERVER['REQUEST_METHOD']==='POST'){
	$catName = $_POST['doanhNghiep'];

	$insertCat = $cat->insert_categori($catName);
}
?>
        <div class="grid_10">
            <div class="box round first grid"> 
                <h2>Thêm loại hình doanh nghiệp </h2>
               <div class="block copyblock"> 
                 <form action="themDoanhNghiep.php" method="post">
                    <table class="form">	
                    <?php
                if(isset($insertCat)){
                    echo $insertCat;
                }
                ?>
                        <tr>
                            <td>
                                <input type="text" name = "doanhNghiep" placeholder="Thêm loại hình doanh nghiệp...." class="medium" />
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