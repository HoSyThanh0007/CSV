<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/lop.php' ?>
<?php
$cat = new lop();
if($_SERVER['REQUEST_METHOD']==='POST'){
	$catName = $_POST['lop'];

	$insertCat = $cat->insert_categori($catName);
}
?>
        <div class="grid_10">
            <div class="box round first grid"> 
                <h2>Thêm lớp </h2>
               <div class="block copyblock"> 
                 <form action="themLop.php" method="post">
                    <table class="form">	
                    <?php
                if(isset($insertCat)){
                    echo $insertCat;
                }
                ?>
                        <tr>
                            <td>
                                <input type="text" name = "lop" placeholder="Thêm lớp...." class="medium" />
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