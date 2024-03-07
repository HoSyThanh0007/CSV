<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/nienKhoa.php' ?>
<?php
$cat = new nienKhoa();
if(isset($_GET['delId'])){
    $id = $_GET['delId'];
		$delCat = $cat->del_categori($id);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh sách niên khóa</h2>
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
							<th>Niên khóa</th>
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
							<td><?php echo $result['nienKhoa'] ?></td>
							<td><a href="suaNienKhoa.php ?catId=<?php echo $result['id'] ?>">Edit</a> || <a onclick = "return confirm('Bạn muốn xoá mục này?')" href="?delId=<?php echo $result['id'] ?>">Delete</a></td>
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

