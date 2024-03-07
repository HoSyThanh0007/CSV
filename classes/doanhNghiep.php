
<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>


<?php
class doanhNghiep 
{
    private $db;
    private $fm;
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();

    }
    public function insert_categori($catName){
        $catName = $this->fm->validation($catName);

        $catName = mysqli_real_escape_string($this->db->link,$catName);

        if(empty($catName)){
            $alert = "<span class='error'> không để trống </span>";
            return $alert;
        }
        else{
            $query = "insert into doanhnghiep(loaiDN) values('$catName')";
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
    public function update_categori($catName,$id){
        $catName = $this->fm->validation($catName);

        $catName = mysqli_real_escape_string($this->db->link,$catName);
        $id = mysqli_real_escape_string($this->db->link,$id);

        if(empty($catName)){
            $alert = "<span class='error'> không để trống </span>";
            return $alert;
        }
        else{
            $query = "update doanhnghiep set loaiDN = '$catName' Where id = '$id'";
            $result = $this->db->update($query);

            if($result){
                $alert="<span class='success'> Thành công </span>";
                return $alert;
            }else{
                $alert = "<span class='error'> không thành công </span>";
                return $alert;
            }
        }
    }
    
    public function show_categori(){
        $query = "select * from doanhnghiep order by id desc";
        $result = $this->db->select($query);
        return $result;
    }
    public function del_categori($id){
        $query = "delete from doanhnghiep where id = '$id'";
        $result = $this->db->delete($query);
        return $result;
        if($result){
            $alert="<span class='success'> Thành công </span>";
            return $alert;
        }else{
            $alert = "<span class='error'> không thành công </span>";
            return $alert;
        }
    }
    public function getcatbyId($id){
        $query = "select * from doanhnghiep where id='$id'";
        $result = $this->db->select($query);
        return $result;
    }

}

?>