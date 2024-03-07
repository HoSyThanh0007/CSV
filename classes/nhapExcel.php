<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>
<?php
class ex
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function nhapEx($msv, $tenSV, $sdt, $email, $vien, $nganh, $lop, $nienKhoa, $tenDN, $loaiDN, $diaChiDN, $queQuan, $viTri, $thuNhap, $currentDate)
    {
        if ($msv == "" || $tenSV == "" || $sdt == "" || $email == "" || $vien == "" || $nganh == "" || $lop == "" || $nienKhoa == "" || $queQuan == "" || $tenDN == "" || $loaiDN == "" || $diaChiDN == "" || $viTri == "" || $thuNhap == "") {
            $alert = "<span class='error'> không để trống </span>";
            return $alert;
        } else {
            $query = "insert into csv(msv,tenSV,sdt,email,vien,nganh,lop,nienKhoa,queQuan,tenDN,loaiDN,diaChiDN,viTri,thuNhap,ngay_nhap) values('$msv','$tenSV','$sdt','$email','$vien','$nganh','$lop','$nienKhoa','$queQuan','$tenDN','$loaiDN','$diaChiDN','$viTri','$thuNhap','$currentDate')";
            $result = $this->db->insert($query);

            if ($result) {
                $alert = "<span class='success'> Thành công </span>";
                return $alert;
            } else {
                $alert = "<span class='error'> không thành công </span>";
                return $alert;
            }
        }
    }
}
?>