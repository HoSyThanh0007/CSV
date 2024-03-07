
<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>


<?php
class categori
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_categori($data, $file)
    {
        $catName = mysqli_real_escape_string($this->db->link, $data['catName']);
        $vien = mysqli_real_escape_string($this->db->link, $data['categori']);
        try{
        if (empty($catName)||empty($vien)) {
            $alert = "<span class='error'> không để trống </span>";
            return $alert;
        } else {
            $query = "insert into nganhdaotao(tenNganh,vien) values('$catName','$vien')";
            $result = $this->db->insert($query);

            if ($result) {
                $alert = "<span class='success'> Thành công </span>";
                return $alert;
            } else {
                $alert = "<span class='error'> không thành công </span>";
                return $alert;
            }
        }}catch(Exception $e){
            $alert = "<span class='error'>Hãy lưu ý chọn viện đào tạo <span>";
            return $alert;
        }
    }
    public function update_categori($data,$file,$id)
    {
        // $catName = $this->fm->validation($catName);
        // $vien = $this->fm->validation($vien);
        $catName = mysqli_real_escape_string($this->db->link,$data['catName']);
        $vien = mysqli_real_escape_string($this->db->link,$data['categori']);
        $id = mysqli_real_escape_string($this->db->link,$id);

        // $catName = mysqli_real_escape_string($this->db->link, $catName);
        // $vien = mysqli_real_escape_string($this->db->link, $vien);
        // $id = mysqli_real_escape_string($this->db->link, $id);
        try{
        if (empty($catName)||empty($vien)) {
            $alert = "<span class='error'> không để trống </span>";
            return $alert;
        } else {
            $query = "update nganhdaotao set tenNganh = '$catName', vien = '$vien' Where id = '$id'";
            $result = $this->db->update($query);

            if ($result) {
                $alert = "<span class='success'> Thành công </span>";
                return $alert;
            } else {
                $alert = "<span class='error'> không thành công </span>";
                return $alert;
            }
        }}catch(Exception $e){

        }
    }

    public function show_categori()
    {
        // $query = "select * from nganhdaotao order by id desc";
        $query = "SELECT nganhdaotao.id,nganhdaotao.tenNganh,vien.tenVien FROM nganhdaotao,vien WHERE nganhdaotao.vien=vien.id";
        $result = $this->db->select($query);
        return $result;
    }
    public function del_categori($id)
    {
        try {
            $query = "delete from nganhdaotao where id = '$id'";
        $result = $this->db->delete($query);
        // return $result;
        if ($result) {
            $alert = "<span class='success'> Thành công </span>";
            return $alert;
        } else {
            $alert = "<span class='error'> không thành công </span>";
            return $alert;
        }
        } catch (Exception $e) {
            $alert = "Có lỗi xảy ra: Không thể xóa mục này " ;
            return $alert;
        }
        
    }
    public function getcatbyId($id)
    {
        $query = "select * from nganhdaotao where id='$id'";
        $result = $this->db->select($query);
        return $result;
    }
}

?>