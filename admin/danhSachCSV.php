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
if (isset($_GET['delProductId'])) {
	$id = $_GET['delProductId'];
	$delCsv = $csv->del_csv($id);
}
?>

<div class="grid_10">
	<div class="box round first grid">
		<h2>Danh sách cựu sinh viên</h2>
		<div class="block">
			<?php
			if (isset($delProduct)) {
				echo $delProduct;
			}
			?>
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>Mã sinh viên</th>
						<th>Tên sinh viên</th>
						<th>Số điện thoại</th>
						<th>Email</th>
						<th>Quê quán</th>
						<th>Viện</th>
						<th>Ngành</th>
						<th>Lớp</th>
						<th>Niên khóa</th>
						<th>Vị trí</th>
						<th>Thu nhập</th>
						<th>Tên doanh nghiệp</th>
						<th>Loại hình</th>
						<th>Địa chỉ</th>
						<th>Sửa / Xóa</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$csv = new csv();
					$csvlist = $csv->show_csv();
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
								<td style="border: 1px solid black;"><?php echo $result['thuNhap']; ?></td>
								<td style="border: 1px solid black;"><?php echo $result['tenDN']; ?></td>
								<td style="border: 1px solid black;"><?php echo $result['loaiDN']; ?></td>
								<td style="border: 1px solid black;"><?php echo $result['diaChiDN']; ?></td>
								
								<td style="border: 1px solid black;"><a href="suaCSV.php ?productId=<?php echo $result['msv'] ?>">Edit</a> || <a onclick="return confirm('Bạn muốn xoá mục này?')" href="?delProductId=<?php echo $result['msv'] ?>">Delete</a></td>
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