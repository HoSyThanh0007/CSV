
<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>


<?php
class user 
{
    private $db;
    private $fm;
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();

    }
    public function insert_product($data,$file){

        $productName = mysqli_real_escape_string($this->db->link,$data['productName']);
        $brand = mysqli_real_escape_string($this->db->link,$data['brand']);
        $categori = mysqli_real_escape_string($this->db->link,$data['categori']);
        $product_desc = mysqli_real_escape_string($this->db->link,$data['product_desc']);
        $type = mysqli_real_escape_string($this->db->link,$data['type']);
        $price = mysqli_real_escape_string($this->db->link,$data['price']);

        // kiểm tra hình ảnh và lấy hình ảng cho vào folder uploads
        $permited = array('jpg','jpeg','png','gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.',$file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;

        if($productName=="" || $brand=="" || $categori=="" || $product_desc=="" || $price=="" || $type=="" || $file_name==""){
            $alert = "<span class='error'> không để trống </span>";
            return $alert;
        }
        else{
            move_uploaded_file($file_temp,$uploaded_image);
            $query = "insert into tbl_product(productName,catId,brandId,product_desc,type,price,image) values('$productName','$categori',
            '$brand','$product_desc','$type','$price','$unique_image')";
            $result = $this->db->insert($query);

            if($result){
                $alert="<span class='success'> Thành công </span>";
                return $alert;
            }else{
                $alert = "<span class='error'> không thành công </span>";
                return $alert;
            }
        }

    }
    public function update_product($data,$file,$id){
        $productName = mysqli_real_escape_string($this->db->link,$data['productName']);
        $brand = mysqli_real_escape_string($this->db->link,$data['brand']);
        $categori = mysqli_real_escape_string($this->db->link,$data['categori']);
        $product_desc = mysqli_real_escape_string($this->db->link,$data['product_desc']);
        $type = mysqli_real_escape_string($this->db->link,$data['type']);
        $price = mysqli_real_escape_string($this->db->link,$data['price']);

        // kiểm tra hình ảnh và lấy hình ảng cho vào folder uploads
        $permited = array('jpg','jpeg','png','gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.',$file_name);
        $file_ext = strtolower(end($div));
        // $file_current = strtolower(current($div));
        $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;

        if($productName=="" || $brand=="" || $categori=="" || $product_desc=="" || $price=="" || $type=="" ){
            $alert = "<span class='error'> không để trống </span>";
            return $alert;
        }else{
            if(!empty($file_name)){
                // Nếu người dùng chọn ảnh
                // if($file_size>20480){
                // $alert="<span class='success'> ngoai kho </span>";
                // return $alert;
                // }
                if(in_array($file_ext,$permited)===FALSE){
                    $alert = "<span class='success'> you can upload only: ".implode(', ',$permited)."</span>";
                    return $alert;
                }
                move_uploaded_file($file_temp,$uploaded_image);
                $query = " update tbl_product set
                productName = '$productName',
                catId = '$categori',
                brandId = '$brand',
                product_desc = '$product_desc',
                type = '$type',
                price = '$price',
                image = '$unique_image'

                where productId = '$id'";
            }else{
                // Nếu người dùng không chọn ảnh
                $query = " update tbl_product set
                productName = '$productName',
                catId = '$categori',
                brandId = '$brand',
                product_desc = '$product_desc',
                type = '$type',
                price = '$price'

                where productId = '$id'";
            }
        }
            $result = $this->db->update($query);
            if($result){
                $alert="<span class='success'> Thành công </span>";
                return $alert;
            }else{
                $alert = "<span class='error'> không thành công </span>";
                return $alert;
            }
        
    }
    
    public function show_product(){

        $query = "select tbl_product.*,tbl_categori.catName,tbl_brand.brandName 
        from tbl_product inner join tbl_categori on tbl_product.catId = tbl_categori.catId
        inner join tbl_brand on tbl_product.brandId = tbl_brand.brandId
        order by tbl_product.productId desc";
        $result = $this->db->select($query);
        return $result;
    }
    public function del_product($id){
        $query = "delete from tbl_product where productId = '$id'";
        $result = $this->db->delete($query);
        if($result){
            $alert="<span class='success'> Thành công </span>";
            return $alert;
        }else{
            $alert = "<span class='error'> không thành công </span>";
            return $alert;
        }
    }
    public function getproductbyId($id){
        $query = "select * from tbl_product where productId='$id'";
        $result = $this->db->select($query);
        return $result;
    }

}

?>