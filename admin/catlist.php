<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/categori.php' ?>
<?php
$cat = new categori();
if (isset($_GET['delId'])) {
	$id = $_GET['delId'];
	$delCat = $cat->del_categori($id);
}
?>
<div class="grid_10">
	<div class="box round first grid">
		<h2>Danh mục ngành đào tạo</h2>
		<div class="block">
		<h3>
			<?php
			if (isset($delCat)) {
				echo $delCat;
			}
			?></h3>
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>STT.</th>
						<th>Ngành đào tạo</th>
						<th>Viện</th>
						<th>Sửa/Xóa</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$show_cate = $cat->show_categori();
					if ($show_cate) {
						$i = 0;
						while ($result = $show_cate->fetch_assoc()) {
							$i++;
					?>
							<tr class="odd gradeX">
								<td><?php echo $i; ?></td>
								<td><?php echo $result['tenNganh'] ?></td>
								<td><?php echo $result['tenVien'] ?></td>
								<td><a href="catedit.php ?catId=<?php echo $result['id'] ?>">Edit</a> || <a onclick="return confirm('Bạn muốn xoá mục này?')" href="?delId=<?php echo $result['id'] ?>">Delete</a>
								
							</td>
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