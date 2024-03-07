
<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/session.php');
Session::checkLogin();
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');


?>


<?php
class adminlogin 
{
    private $db;
    private $fm;
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();

    }
    public function login_admin($adminUser,$adminPass){
        $adminUser = $this->fm->validation($adminUser);
        $adminPass = $this->fm->validation($adminPass);

        $adminUser = mysqli_real_escape_string($this->db->link,$adminUser);
        $adminPass = mysqli_real_escape_string($this->db->link,$adminPass);

        if(empty($adminUser)||empty($adminUser)){
            $alert = "Không để trống tài khoản hay mật khẩu";
            return $alert;
        }
        else{
            $query = "select * from cbvanphong where tenDangNhap = '$adminUser' and matKhau = '$adminPass' LIMIT 1";
            $result = $this->db->select($query);
            // $value = $result->fetch_assoc();

            if($result != false){
                $value = $result->fetch_assoc();
                if($value['loaiTK']==0){
                Session::set('adminlogin',true);
                Session::set('adminId',$value['id']);
                Session::set('adminUser',$value['adminUser']);
                Session::set('adminName',$value['adminName']);
                header('Location:index.php');
            }
            if($value['loaiTK']==1){
                Session::set('adminlogin',true);
                Session::set('adminId',$value['id']);
                Session::set('adminUser',$value['adminUser']);
                Session::set('adminName',$value['adminName']);
                header('Location:thongKeNganh_view.php');
            }
            }else{
                $alert = "Sai tài khoản hoặc mật khẩu";
                return $alert;
            }
        }

    }

}

?>