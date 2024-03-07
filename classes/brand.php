
<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');


?>


<?php
class brand
{ 
    private $db;
    private $fm; 
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
 
    }
    public function insert_brand($data,$file){ 
        // $brandName = $this->fm->validation($brandName);

        $brandName = mysqli_real_escape_string($this->db->link,$data['brandName']);
        // $categori = mysqli_real_escape_string($this->db->link,$data['categori']);

        if($brandName==""){
            $alert = "<span class='error'> không để trống </span>";
            return $alert;
        }
        else{
            $query = "insert into vien(tenVien) values('$brandName')";
            $result = $this->db->insert($query);

            if($result){
                $alert="<span class='success'> Thành công </span>";
                return $alert;
            }else{
                $alert = "<span class='error'> không thành công </span>";
                return $alert;
            }
        }



        // if(empty($brandName)){
        //     $alert = "<span class='error'> không để trống </span>";
        //     return $alert;
        // }
        // else{
        //     $query = "insert into vien(tenLop) values('$brandName')";
        //     $result = $this->db->insert($query);

        //     if($result){
        //         $alert="<span class='success'> Thành công </span>";
        //         return $alert;
        //     }else{
        //         $alert = "<span class='error'> không thành công </span>";
        //         return $alert;
        //     }
        // }

    }
    public function update_brand($data,$file,$id){
        // $brandName = $this->fm->validation($brandName);

        // $brandName = mysqli_real_escape_string($this->db->link,$brandName);
        $brandName = mysqli_real_escape_string($this->db->link,$data['brandName']);
        $categori = mysqli_real_escape_string($this->db->link,$data['categori']);
        $id = mysqli_real_escape_string($this->db->link,$id);

        if(empty($brandName) || empty($categori)){
            $alert = "<span class='error'> không để trống </span>";
            return $alert;
        }
        else{
            $query = " update vien set
                tenVien = '$brandName',
                nganhDaoTao = '$categori'

                where id = '$id'";
            $result = $this->db->update($query);

            if($result){
                $alert="<span class='success'> Thành công </span>";
                // header("Location:brandlist.php");
                return $alert;
            }else{
                $alert = "<span class='error'> không thành công </span>";
                return $alert;
            }
        }
    }
    
    public function show_brand(){
        // $query = "select vien.id,vien.tenVien,nganhdaotao.tenNganh from vien,nganhdaotao where nganhdaotao.id=vien.nganhDaoTao order by id desc";
        $query = "select * from vien order by id desc";
        $result = $this->db->select($query);
        return $result;
    }
    public function select_brand(){
        $query = "select MIN(id) AS id, tenVien FROM vien GROUP BY tenVien;";
        $result = $this->db->select($query);
        return $result;
    }
    public function del_brand($id){
        try {
        
        $query = "delete from vien where id = '$id'";
        $result = $this->db->delete($query);
        return $result;
        if($result){
            $alert="<span class='success'> Thành công </span>";
            return $alert;
        }else{
            $alert = "<span class='error'> không thành công </span>";
            return $alert;
        }
    } catch(Exception $e) {
        // Xử lý ngoại lệ ở đây
        echo "Có lỗi xảy ra: " . $e->getMessage();
    }
    }
    public function getbrandbyId($id){
        $query = "select * from vien where id='$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function getcategoribyId($id){
        $query = "select vien.nganhDaoTao,nganhDaoTao.tenNganh from vien,nganhDaoTao where vien.nganhDaoTao=nganhDaoTao.id AND vien.id='$id'";
        
        $result = $this->db->select($query);
        return $result;
    }
}

?>