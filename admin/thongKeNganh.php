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
$fm = new Format();
$csv = new csv();
$brand = new brand();
$cate = new categori();
$lop = new lop();
$nienKhoa = new nienKhoa();
$diaChi = new diaChi();
$doanhNghiep = new doanhNghiep();
$csv = new csv();

$csvlist = $csv->show_csv();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $thongke = $_POST['nganh'];
    $csvlist = $csv->thongKeNganh($thongke);
}else{
    $csvlist = $csv->show_csv();
}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Thống kê theo ngành</h2>
        <div class="block">
            <?php
            if (isset($delProduct)) {
                echo $delProduct;
            }
            ?>
            <div class="dataTables_length" id="example_length">
                <form action="" method="post">
                    <table class="form">
                        <tr>
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
                        <th style="border: 1px solid black;">Vị trí</th>
                        <th style="border: 1px solid black;">Thu nhập</th>
                        <th style="border: 1px solid black;">Tên doanh nghiệp</th>
                        <th style="border: 1px solid black;">Loại hình</th>
                        <th style="border: 1px solid black;">Địa chỉ</th>
                        

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
                                <td style="border: 1px solid black;"><?php echo $result['viTri']; ?></td>
                                <td style="border: 1px solid black;"><?php echo $result['thuNhap']; ?></td>s
                                <td style="border: 1px solid black;"><?php echo $result['tenDN']; ?></td>
                                <td style="border: 1px solid black;"><?php echo $result['loaiDN']; ?></td>
                                <td style="border: 1px solid black;"><?php echo $result['diaChiDN']; ?></td>
                                
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