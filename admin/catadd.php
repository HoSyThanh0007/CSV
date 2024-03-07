<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/categori.php'; ?>
<?php include '../classes/brand.php'; ?>
<?php //echo 'Current PHP version: ' . phpversion();
// include 'Classes/PHPExcel.php';
?>
<?php
$cat = new categori();
$vien = new brand();
// if (isset($_POST['submit'])) {
//     $catName = $_POST['catName'];

//     $insertCat = $cat->insert_categori();
// }
if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['submit'])){

	$insertCat = $cat->insert_categori($_POST,$_FILES);
}
if(isset($_POST['submit_file'])){
    // $file = $_FILES['file']['tmp_name'];
    // $inputFileType = PHPExcel_IOFactory::identify($file);
    // $objReader = PHPExcel_IOFactory::createReader($inputFileType);
    // $objPHPExcel = $objReader->load($file);
    // echo $objPHPExcel;
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm ngành đào tạo</h2>
        <div class="block copyblock">
            <form action="catadd.php" method="post">
                <table class="form">
                    <?php
                    if (isset($insertCat)) {
                        echo $insertCat;
                    }
                    ?>
                    <tr>
                        <td>
                            <input type="text" name="catName" placeholder="Thêm ngành đào tạo...." class="medium" />
                        </td>
                    </tr>
                        <tr>
                        <td>
                        <select id="select" name="categori">
                        <option>Chọn viện</option>
                            <?php
                            $cat= new categori();
                            $catlist = $vien->show_brand();
                            if($catlist){
                                while($result=$catlist->fetch_assoc()){

                            ?>
                            <option value="<?php echo $result['id'] ?>"><?php echo $result['tenVien'] ?></option>
                            <?php
                             }
                            }
                            ?></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" Value="Lưu" />
                        </td>
                    </tr>
                </table>
            </form>
            <!-- <form action="" method="post" enctype="multipart/form-data">
                        <input type="file" name ="file">
                        <input type="submit" name="submit_file" Value="Nhập" />
                    </form> -->
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>