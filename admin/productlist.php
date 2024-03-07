<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once  '../classes/brand.php';?>
<?php include_once  '../classes/categori.php';?>
<?php include_once  '../classes/product.php';?>
<?php include_once  '../helpers/format.php';?>
<?php
$fm = new Format();
$pd = new product();
if(isset($_GET['delProductId'])){
    $id = $_GET['delProductId'];
		$delProduct = $pd->del_product($id);
}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách sản phẩm</h2>
        <div class="block"> 
			<?php
			if(isset($delProduct)){
				echo $delProduct;
			}
			?> 
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>ID</th>
					<th>Tên sản phẩm</th>
					<th>giá sản phẩm</th>
					<th>ảnh sản phẩm</th>
					<th>Danh mục</th>
					<th>Thương hiệu</th>
					<th>Mô tả</th>
					<th>Loại</th>
					<th>Thao tác</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$pd = new product();
				$productlist = $pd->show_product();
				if($productlist){
					$i=0;
					while($result =$productlist->fetch_assoc()){
						$i++;
						?>
				<tr class="odd gradeX">
					<td > <?php echo $result['productId']; ?></td>
					<td><?php echo $result['productName']; ?></td>
					<td><?php echo $result['price']; ?></td>
					<td><img src="uploads/<?php echo $result['image'] ?>"width="100" ></td>
					<td><?php echo $result['catName']; ?></td>
					<td><?php echo $result['brandName']; ?></td>
					<td><?php 
					 echo $fm->textShorten($result['product_desc'],50);
					  ?></td>
					<td><?php
					if($result['type']==1 ? 'Featured':'Non-Featured')
					// {
					// 	echo 'Featured';
					// }else{
					// 	echo 'Non-Featured';
					// }
					 ?></td>
					
					<td><a href="productedit.php ?productId=<?php echo $result['productId'] ?>">Edit</a> || <a onclick = "return confirm('Bạn muốn xoá mục này?')" href="?delProductId=<?php echo $result['productId'] ?>">Delete</a></td>
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
