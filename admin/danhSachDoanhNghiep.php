<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/doanhNghiep.php' ?>
<?php
$cat = new doanhNghiep();
if(isset($_GET['delId'])){
    $id = $_GET['delId'];
		$delCat = $cat->del_categori($id);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh sách loại hình doanh nghiệp</h2>
                <div class="block">        
					<?php
					if(isset($delCat)){
						echo $delCat;
					}
					?>
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>STT.</th>
							<th>Loại hình doanh nghiệp</th>
							<th>Sửa/Xóa</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$show_cate = $cat->show_categori();  
						if($show_cate){
							$i = 0;
							while($result = $show_cate->fetch_assoc()){
								$i++;
								?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['loaiDN'] ?></td>
							<td><a href="suaDoanhNghiep.php ?catId=<?php echo $result['id'] ?>">Edit</a> || <a onclick = "return confirm('Bạn muốn xoá mục này?')" href="?delId=<?php echo $result['id'] ?>">Delete</a></td>
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
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php';?>

