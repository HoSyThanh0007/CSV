<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/nienKhoa.php' ?>
<?php
$cat = new nienKhoa();
if($_SERVER['REQUEST_METHOD']==='POST'){
	$catName = $_POST['nienKhoa'];

	$insertCat = $cat->insert_categori($catName);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm niên khóa</h2>
               <div class="block copyblock"> 
                 <form action="themNienKhoa.php" method="post">
                    <table class="form">	
                    <?php
                if(isset($insertCat)){
                    echo $insertCat;
                }
                ?>
                        <tr>
                            <td>
                                <input type="text" name = "nienKhoa" placeholder="Thêm niên khóa...." class="medium" />
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