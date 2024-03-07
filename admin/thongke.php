<?php include 'inc/header.php'; ?>
<?php include 'inc/slidebar_view.php'; ?>
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
$fm = new Format();
$csv = new csv();
$brand = new brand();
$cate = new categori();
$lop = new lop();
$nienKhoa = new nienKhoa();
$diaChi = new diaChi();
$doanhNghiep = new doanhNghiep();
$csv = new csv();
$insertCsv =0;
$csvlist = $csv->show_csv();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_thongke'])) {
    $insertCsv = $_POST['thongke'];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $thongke = $_POST['thongke'];
}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Thống kê</h2>
        <div class="block">
            <?php
            if (isset($delProduct)) {
                echo $delProduct;
            }
            ?>
            <div class="dataTables_length" id="example_length">
                <form action="thongke.php" method="post">
                    <table class="form">
                        <tr>
                            <form action="" method="post">
                                <td>
                                    <select name="thongke" id="select">
                                        <option value="<?php echo $insertCsv;?>">Thống kê</option>
                                        <option value="1">Quên quán</option>
                                        <option value="2">viện</option>
                                        <option value="3">Ngành</option>
                                        <option value="4">lớp</option>
                                        <option value="5">Niên Khóa</option>
                                        <option value="6">Địa chỉ doanh nghiệp</option>
                                    </select>
                                </td>
                                <td><input type="submit" name="submit_thongke" value="chọn"></td>
                            </form>
                            <td>
                                <?php if ($insertCsv == 1) {

                                ?>
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
                                <?php } ?>


                                <?php if ($insertCsv == 2) {
                                ?>
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
                                <?php } ?>
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Thống kê" />
                            </td>
                        </tr>
                    </table>
                </form>
            </div>

            <table class="data display datatable" id="example">


                <thead>
                    <tr>
                        <th style="border: 1px solid black;">Mã sinh viên</th>
                        <th style="border: 1px solid black;">Tên sinh viên</th>
                        <th style="border: 1px solid black;">Số điện thoại</th>
                        <th style="border: 1px solid black;">Email</th>
                        <th style="border: 1px solid black;">Quê quán</th>
                        <th style="border: 1px solid black;">Viện</th>
                        <th style="border: 1px solid black;">Ngành</th>
                        <th style="border: 1px solid black;">Lớp</th>
                        <th style="border: 1px solid black;">Niên khóa</th>
                        <th style="border: 1px solid black;">Tên doanh nghiệp</th>
                        <th style="border: 1px solid black;">Loại hình</th>
                        <th style="border: 1px solid black;">Địa chỉ</th>
                        <th style="border: 1px solid black;">Vị trí</th>
                        <th style="border: 1px solid black;">Thu nhập</th>

                    </tr>
                </thead>
                <tbody>
                    <?php

                    if ($csvlist) {
                        $i = 0;
                        while ($result = $csvlist->fetch_assoc()) {
                            $i++;
                    ?>
                            <tr class="odd gradeX">
                                <td style="border: 1px solid black;"><?php echo $result['msv']; ?></td>
                                <td style="border: 1px solid black;"><?php echo $result['tenSV']; ?></td>
                                <td style="border: 1px solid black;"><?php echo $result['sdt']; ?></td>
                                <td style="border: 1px solid black;"><?php echo $result['email']; ?></td>
                                <td style="border: 1px solid black;"><?php echo $result['queQuan']; ?></td>
                                <td style="border: 1px solid black;"><?php echo $result['tenVien']; ?></td>
                                <td style="border: 1px solid black;"><?php echo $result['tenNganh']; ?></td>
                                <td style="border: 1px solid black;"><?php echo $result['tenLop']; ?></td>
                                <td style="border: 1px solid black;"><?php echo $result['nienKhoa']; ?></td>
                                <td style="border: 1px solid black;"><?php echo $result['tenDN']; ?></td>
                                <td style="border: 1px solid black;"><?php echo $result['loaiDN']; ?></td>
                                <td style="border: 1px solid black;"><?php echo $result['diaChiDN']; ?></td>
                                <td style="border: 1px solid black;"><?php echo $result['viTri']; ?></td>
                                <td style="border: 1px solid black;"><?php echo $result['thuNhap']; ?></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        setupLeftMenu();
        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php'; ?>