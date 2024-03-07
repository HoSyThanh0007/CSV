<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php' ?>
<?php
$brand = new brand();
if(isset($_GET['delId'])){ 
    $id = $_GET['delId'];
	try{
		$delBrand = $brand->del_brand($id);
	}catch(Exception $e){
		echo "Có lỗi xảy ra: " . $e->getMessage();
	}
		
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh mục viện</h2>
                <div class="block">        
					<?php
					if(isset($delBrand)){
						echo $delBrand;
					}
					?>
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Stt</th>
							<th>Tên viện</th>
							<th>Sửa/ Xóa</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$show_brand = $brand->show_brand();
						if($show_brand){
							$i = 0;
							while($result = $show_brand->fetch_assoc()){
								$i++;
								?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td> 
							<td><?php echo $result['tenVien'] ?></td>
							<td><a href="brandedit.php ?brandId=<?php echo $result['id'] ?>">Edit</a> || <a onclick = "return confirm('Bạn muốn xoá mục này?')" href="?delId=<?php echo $result['id'] ?>">Delete</a></td>
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

