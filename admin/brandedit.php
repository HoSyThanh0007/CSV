<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/brand.php' ?>
<?php include '../classes/categori.php' ?>
<?php
$brand = new brand();
if (!isset($_GET['brandId']) || $_GET['brandId'] == NULL) {
    echo "<script>window.location = 'brandlist.php'</script>";
} else {
    $id = $_GET['brandId'];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

    $updateBrand = $brand->update_brand($_POST, $_FILES, $id);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit1'])) {

    echo "<script>window.location = 'brandlist.php'</script>";
}


// if(!isset($_GET['productId']) || $_GET['productId'] == NULL){
//     echo "<script>window.location = 'productlist.php'</script>";
// }
//     else{
//         $id = $_GET['productId'];
//     }
//     if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['submit'])){

//         $updateProduct = $pd->update_product($_POST,$_FILES,$id);
//     }
//     else{
//         $updateProduct= "<span class='success'>.....</span>";
//     }
//     if(isset($_POST['submit1'])){
//         echo "<script>window.location = 'productlist.php'</script>";

//     }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa tên viện </h2>
        <div class="block copyblock">
            <?php
            if (isset($updateBrand)) {
                echo $updateBrand;
            }
            ?>
            <?php
            $get_brand_name = $brand->getbrandbyId($id);
            if ($get_brand_name) {
                while ($result = $get_brand_name->fetch_assoc()) {

            ?>
                    <form action="" method="post"> <!--action="catedit.php" dùng để trả dữ liệu về chính trang catedit.php -->
                        <table class="form">

                            <tr>
                                <td>
                                    <input type="text" value="<?php echo $result['tenVien'] ?>" name="brandName" placeholder="Sửa tên lớp...." class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <select id="select" name="categori">
                                        <option>Chọn ngành</option>
                                        <?php
                                        $cat = new categori();
                                        $catlist = $cat->show_categori();
                                        if ($catlist) {
                                            while ($result = $catlist->fetch_assoc()) {

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
                                    <input type="submit" name="submit" Value="Sửa" />
                                    <input type="submit" name="submit1" Value="Trở về" />
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
<?php include 'inc/footer.php'; ?>