<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include_once  '../classes/brand.php'; ?>
<?php include_once  '../classes/categori.php'; ?>
<?php include_once  '../classes/product.php'; ?>
<?php include_once  '../classes/diaChi.php'; ?>
<?php include_once  '../classes/lop.php'; ?>
<?php include_once  '../classes/nienKhoa.php'; ?>
<?php include_once  '../classes/diaChi.php'; ?>
<?php include_once  '../classes/doanhNghiep.php'; ?>
<?php include_once  '../classes/csv.php'; ?>
<?php
$csv = new csv();
$brand = new brand();
$cate = new categori();
$lop = new lop();
$nienKhoa = new nienKhoa();
$diaChi = new diaChi();
$doanhNghiep = new doanhNghiep();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $insertCsv = $csv->insert_scv($_POST, $_FILES);
} else {
    $insertCsv = "<span class='success'>.....</span>";
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm TT Cựu sinh viên</h2>
        <div class="block">
            <form action="" method="post" enctype="multipart/form-data">
                <table class="form">
                    <?php
                    if ($insertCsv) {
                        echo $insertCsv;
                    }
                    ?>
                    <tr>
                        <td>
                            <label>----------------</label>
                        </td>
                        <td>
                            <h3> Thông tin Cựu sinh viên</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Mã sinh viên</label>
                        </td>
                        <td>
                            <input type="text" name="msv" placeholder="Nhập mã sinh viên..." class="medium" />
                        </td>
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
                        <td>
                            <label>Email</label>
                        </td>
                        <td>
                            <input type="text" name="email" placeholder="Nhập email..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td> <label>Viện đào tạo</label></td> 
                        <td>
                            <select id="select" name="vien">
                                <option>Chọn viện</option>
                                <?php
                                $show_brand = $brand->select_brand();
                                if ($show_brand) {
                                    while ($result = $show_brand->fetch_assoc()) {

                                ?>
                                        <option value="<?php echo $result['id'] ?>"><?php echo $result['tenVien'] ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </td>
                        <td> <label>Ngành đào tạo</label></td>
                        <td>
                            <select id="select" name="nganh">
                                <option>Chọn ngành</option>
                                <?php
                                $show_nganh = $cate->show_categori();
                                if ($show_nganh) {
                                    while ($result = $show_nganh->fetch_assoc()) {

                                ?>
                                        <option value="<?php echo $result['id'] ?>"><?php echo $result['tenNganh'] ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <td> <label>Lớp</label></td>
                    <td>
                        <select id="select" name="lop">
                            <option>Chọn lớp</option>
                            <?php
                            $show_lop = $lop->show_categori();
                            if ($show_lop) {
                                while ($result = $show_lop->fetch_assoc()) {

                            ?>
                                    <option value="<?php echo $result['id'] ?>"><?php echo $result['tenLop'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </td>
                    <td> <label>Niên khóa</label></td>
                    <td>
                        <select id="select" name="nienkhoa">
                            <option>Chọn niên khóa</option>
                            <?php
                            $show_nienKhoa = $nienKhoa->show_categori();
                            if ($show_nienKhoa) {
                                while ($result = $show_nienKhoa->fetch_assoc()) {

                            ?>
                                    <option value="<?php echo $result['id'] ?>"><?php echo $result['nienKhoa'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </td>
                    </tr>
                    <tr>
                        <td> <label>Quê quán</label></td>
                        <td>
                            <select id="select" name="diaChi">
                                <option>Quê quán</option>
                                <?php
                                $show_diaChi = $diaChi->show_diaChi();
                                if ($show_diaChi) {
                                    while ($result = $show_diaChi->fetch_assoc()) {

                                ?>
                                        <option value="<?php echo $result['id'] ?>"><?php echo $result['name'] ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </td>
                    </tr>

                    <!-- -----------------------doanh nghiệp---------------------------- -->

                    <tr>
                        <td>
                            <label>----------------</label>
                        </td>
                        <td>
                            <h3> Thông tin việc làm</h3>
                        </td>
                    </tr>
                    
                    
                    <tr>
                        <td>
                            <label>Vị trí</label>
                        </td>
                        <td>
                        <input type="text" name="viTri" placeholder="Vị trí ..." class="medium" />
                        </td>
                        </tr>
                        <tr>
                        <td> <label>Thu nhập</label></td>
                        <td>
                        <input type="text" name="thuNhap" placeholder="Thu nhập ..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Tên doanh nghiệp</label>
                        </td>
                        <td>
                            <input type="text" name="tenDN" placeholder="Nhập tên doanh nghiệp..." class="medium" />
                        </td>
                        
                    </tr>
                    <tr>
                    <td>
                            <label>Loại doanh nghiệp</label>
                        </td>
                        <td>
                            <select id="select" name="loaiDN">
                                <option>Loại hình</option>
                                <?php
                                $show_loaiDN = $doanhNghiep->show_categori();
                                if ($show_loaiDN) {
                                    while ($result = $show_loaiDN->fetch_assoc()) {

                                ?>
                                        <option value="<?php echo $result['id'] ?>"><?php echo $result['loaiDN'] ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Địa chỉ doanh nghiệp</label>
                        </td>
                        <td>
                        <select id="select" name="diaChiDN">
                                <option>Địa chỉ</option>
                                <?php
                                $show_diaChi = $diaChi->show_diaChi();
                                if ($show_diaChi) {
                                    while ($result = $show_diaChi->fetch_assoc()) {

                                ?>
                                        <option value="<?php echo $result['id'] ?>"><?php echo $result['name'] ?></option>
                                <?php
                                    }
                                }
                                ?>
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
    $(document).ready(function() {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php'; ?>