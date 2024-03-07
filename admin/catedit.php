<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/categori.php' ?>
<?php include '../classes/brand.php' ?>
<?php
$cat = new categori();
$vien = new brand();
if (!isset($_GET['catId']) || $_GET['catId'] == NULL) {
    echo "<script>window.location = 'catlist.php'</script>";
} else {
    $id = $_GET['catId'];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // $catName = $_POST['catName'];
    // $vien = $_POST['categori'];
    $updateCat = $cat->update_categori($_POST, $_FILES, $id);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit1'])) {
    echo "<script>window.location = 'catlist.php'</script>";
}

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa ngành đào tạo</h2>
        <div class="block copyblock">
            <?php
            if (isset($updateCat)) {
                echo $updateCat;
            }
            ?>
            <?php
            $get_cate_name = $cat->getcatbyId($id);
            if ($get_cate_name) {
                while ($result = $get_cate_name->fetch_assoc()) {

            ?>
                    <form action="" method="post"> <!--action="catedit.php" dùng để trả dữ liệu về chính trang catedit.php -->
                        <table class="form">

                            <tr>
                                <td>
                                    <input type="text" value="<?php echo $result['tenNganh'] ?>" name="catName" placeholder="Sửa ngành...." class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <select id="select" name="categori">
                                        <option>Chọn viện</option>
                                        <?php
                                        $cat = new categori();
                                        $catlist = $vien->show_brand();
                                        if ($catlist) {
                                            while ($result = $catlist->fetch_assoc()) {

                                        ?>
                                                <option value="<?php echo $result['id'] ?>"><?php echo $result['tenVien'] ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
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