<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/doanhNghiep.php' ?>
<?php
$cat = new doanhNghiep();
if(!isset($_GET['catId']) || $_GET['catId'] == NULL){
    echo "<script>window.location = 'catlist.php'</script>";
}
    else{
        $id = $_GET['catId'];
    }
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $catName = $_POST['catName'];
    
        $updateCat = $cat->update_categori($catName,$id);
    }

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa lớp</h2>
               <div class="block copyblock"> 
                <?php
                if(isset($updateCat)){
                    echo $updateCat;
                }
                ?>
                <?php
                $get_cate_name = $cat->getcatbyId($id);
                if($get_cate_name){
                    while($result = $get_cate_name->fetch_assoc()){

                ?>
                 <form action="" method="post"> <!--action="catedit.php" dùng để trả dữ liệu về chính trang catedit.php -->
                    <table class="form">	

                        <tr>
                            <td>
                                <input type="text" value= "<?php echo $result['loaiDN'] ?>" name = "catName" placeholder="Sửa doanh nghiệp...." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Sửa" />
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
<?php include 'inc/footer.php';?>