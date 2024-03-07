<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once  '../classes/brand.php';?>
<?php include_once  '../classes/categori.php';?>
<?php include_once  '../classes/product.php';?>
<?php include_once  '../classes/diaChi.php';?>
<?php include_once  '../classes/lop.php';?>
<?php include_once  '../classes/nienKhoa.php';?>
<?php include_once  '../classes/diaChi.php';?>
<?php include_once  '../classes/doanhNghiep.php';?>
<?php include_once  '../classes/csv.php';?>
<?php
$csv = new csv();
$brand = new brand();
$cate = new categori();
$lop = new lop();
$nienKhoa = new nienKhoa();
$diaChi = new diaChi();
$doanhNghiep = new doanhNghiep();
if(!isset($_GET['productId']) || $_GET['productId'] == NULL){
    echo "<script>window.location = 'productlist.php'</script>";
}
    else{
        $id = $_GET['productId'];
    }
    if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['submit'])){
    
        $updateCsv = $csv->update_csv($_POST,$_FILES,$id);
    }
    else{
        $updateCsv= "<span class='success'>.....</span>";
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
               if($updateCsv){
                echo $updateCsv;
               }
               ?>
               <?php
               $get_csv_by_id = $csv->getcsvId($id);
               if($get_csv_by_id){
                while($result_csv = $get_csv_by_id->fetch_assoc()){

                
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
                            <input type="text" name="msv" value="<?php echo $result_csv['msv'] ?>" class="medium" />
                        </td>
                        <td>
                            <label>Tên sinh viên</label>
                        </td>
                        <td>
                            <input type="text" name="tenSV" value="<?php echo $result_csv['tenSV'] ?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Số điện thoại</label>
                        </td>
                        <td>
                            <input type="text" name="sdt" value="<?php echo $result_csv['sdt'] ?>" class="medium" />
                        </td>
                        <td>
                            <label>Email</label>
                        </td>
                        <td>
                            <input type="text" name="email" value="<?php echo $result_csv['email'] ?>" class="medium" />
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
                        <input type="text" name="viTri" value="<?php echo $result_csv['viTri'] ?>" class="medium" />
                        </td>
                        </tr>
                        <tr>
                        <td> <label>Thu nhập</label></td>
                        <td>
                        <input type="text" name="thuNhap" value="<?php echo $result_csv['thuNhap'] ?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Tên doanh nghiệp</label>
                        </td>
                        <td>
                            <input type="text" name="tenDN" value="<?php echo $result_csv['tenDN'] ?>"  class="medium" />
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


