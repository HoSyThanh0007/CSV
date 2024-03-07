
<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>
 

<?php
class csv
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_scv($data, $file)
    {
        $msv = mysqli_real_escape_string($this->db->link, $data['msv']);
        $tenSV = mysqli_real_escape_string($this->db->link, $data['tenSV']);
        $sdt = mysqli_real_escape_string($this->db->link, $data['sdt']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $vien = mysqli_real_escape_string($this->db->link, $data['vien']);
        $nganh = mysqli_real_escape_string($this->db->link, $data['nganh']);
        $lop = mysqli_real_escape_string($this->db->link, $data['lop']);
        $nienkhoa = mysqli_real_escape_string($this->db->link, $data['nienkhoa']);
        $diaChi = mysqli_real_escape_string($this->db->link, $data['diaChi']);
        $tenDN = mysqli_real_escape_string($this->db->link, $data['tenDN']);
        $loaiDN = mysqli_real_escape_string($this->db->link, $data['loaiDN']);
        $diaChiDN = mysqli_real_escape_string($this->db->link, $data['diaChiDN']);
        $viTri = mysqli_real_escape_string($this->db->link, $data['viTri']);
        $thuNhap = mysqli_real_escape_string($this->db->link, $data['thuNhap']);
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $currentDate = date('d-m-Y');

        if ($msv == "" || $tenSV == "" || $sdt == "" || $email == "" || $vien == "" || $nganh == "" || $lop == "" || $nienkhoa == "" || $diaChi == "" || $tenDN == "" || $loaiDN == "" || $diaChiDN == "" || $viTri == "" || $thuNhap == "") {
            $alert = "<span class='error'> không để trống </span>";
            return $alert;
        } else {
            $query = "insert into csv(msv,tenSV,sdt,email,vien,nganh,lop,nienKhoa,queQuan,tenDN,loaiDN,diaChiDN,viTri,thuNhap,ngay_nhap) values('$msv','$tenSV','$sdt','$email','$vien','$nganh','$lop','$nienkhoa','$diaChi','$tenDN','$loaiDN','$diaChiDN','$viTri','$thuNhap','$currentDate')";
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
    public function update_csv($data, $file, $id)
    {
        $msv = mysqli_real_escape_string($this->db->link, $data['msv']);
        $tenSV = mysqli_real_escape_string($this->db->link, $data['tenSV']);
        $sdt = mysqli_real_escape_string($this->db->link, $data['sdt']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $vien = mysqli_real_escape_string($this->db->link, $data['vien']);
        $nganh = mysqli_real_escape_string($this->db->link, $data['nganh']);
        $lop = mysqli_real_escape_string($this->db->link, $data['lop']);
        $nienkhoa = mysqli_real_escape_string($this->db->link, $data['nienkhoa']);
        $diaChi = mysqli_real_escape_string($this->db->link, $data['diaChi']);
        $tenDN = mysqli_real_escape_string($this->db->link, $data['tenDN']);
        $loaiDN = mysqli_real_escape_string($this->db->link, $data['loaiDN']);
        $diaChiDN = mysqli_real_escape_string($this->db->link, $data['diaChiDN']);
        $viTri = mysqli_real_escape_string($this->db->link, $data['viTri']);
        $thuNhap = mysqli_real_escape_string($this->db->link, $data['thuNhap']);


        if ($msv == "" || $tenSV == "" || $sdt == "" || $email == "" || $vien == "" || $nganh == "" || $lop == "" || $nienkhoa == "" || $diaChi == "" || $tenDN == "" || $loaiDN == "" || $diaChiDN == "" || $viTri == "" || $thuNhap == "") {
            $alert = "<span class='error'> không để trống </span>";
            return $alert;
        } else {
            $query =
                "update csv set
            msv='$msv',
            tenSV='$tenSV',
            sdt='$sdt',
            email='$email',
            vien='$vien',
            nganh='$nganh',
            lop='$lop',
            nienKhoa='$nienkhoa',
            queQuan='$diaChi',
            tenDN='$tenDN',
            loaiDN='$loaiDN',
            diaChiDN='$diaChiDN',
            viTri='$viTri',
            thuNhap= '$thuNhap'
            
            where msv='$id'";
            $result = $this->db->update($query);

            if ($result) {
                $alert = "<span class='success'> Thành công </span>";
                return $alert;
            } else {
                $alert = "<span class='error'> không thành công </span>";
                return $alert;
            }
        }



        // $query = " update tbl_product set
        // productName = '$productName',
        // catId = '$categori',
        // brandId = '$brand',
        // product_desc = '$product_desc',
        // type = '$type',
        // price = '$price'

        // where productId = '$id'";
    }

    public function show_csv()
    {

        $query =
            "select 
        csv.msv, 
        csv.tenSV, 
        csv.sdt, 
        csv.email, 
        vien.tenVien, 
        nganhdaotao.tenNganh, 
        lop.tenLop, 
        nienkhoa.nienKhoa, 
        csv.tenDN, 
        doanhnghiep.loaiDN, 
        diachi.name AS diaChiDN, 
        diachi_quequan.name AS queQuan, 
        csv.viTri, 
        csv.thuNhap
    FROM 
        csv, 
        diachi,
        diachi AS diachi_quequan, 
        doanhnghiep, 
        lop, 
        nganhdaotao, 
        nienkhoa, 
        vien
    WHERE 
        csv.vien = vien.id AND 
        csv.nganh = nganhdaotao.id AND 
        csv.lop = lop.id AND 
        csv.nienKhoa = nienkhoa.id AND 
        csv.loaiDN = doanhnghiep.id AND 
        csv.diaChiDN = diachi.id AND 
        csv.queQuan = diachi_quequan.id;";
        $result = $this->db->select($query);
        return $result;
    }
    public function thongKeNganh($thongke)
    {

        $query =
            "select 
        csv.msv, 
        csv.tenSV, 
        csv.sdt, 
        csv.email, 
        vien.tenVien, 
        nganhdaotao.tenNganh, 
        lop.tenLop, 
        nienkhoa.nienKhoa, 
        csv.tenDN, 
        doanhnghiep.loaiDN, 
        diachi.name AS diaChiDN, 
        diachi_quequan.name AS queQuan, 
        csv.viTri, 
        csv.thuNhap
    FROM 
        csv, 
        diachi,
        diachi AS diachi_quequan, 
        doanhnghiep, 
        lop, 
        nganhdaotao, 
        nienkhoa, 
        vien
    WHERE 
        csv.vien = vien.id AND 
        csv.nganh = nganhdaotao.id AND 
        csv.lop = lop.id AND 
        csv.nienKhoa = nienkhoa.id AND 
        csv.loaiDN = doanhnghiep.id AND 
        csv.diaChiDN = diachi.id AND 
        csv.queQuan = diachi_quequan.id AND
        csv.nganh = '$thongke';";
        $result = $this->db->select($query);
        return $result;
    }

    public function thongKeLop($thongke)
    {

        $query =
            "select 
        csv.msv, 
        csv.tenSV, 
        csv.sdt, 
        csv.email, 
        vien.tenVien, 
        nganhdaotao.tenNganh, 
        lop.tenLop, 
        nienkhoa.nienKhoa, 
        csv.tenDN, 
        doanhnghiep.loaiDN, 
        diachi.name AS diaChiDN, 
        diachi_quequan.name AS queQuan, 
        csv.viTri, 
        csv.thuNhap
    FROM 
        csv, 
        diachi,
        diachi AS diachi_quequan, 
        doanhnghiep, 
        lop, 
        nganhdaotao, 
        nienkhoa, 
        vien
    WHERE 
        csv.vien = vien.id AND 
        csv.nganh = nganhdaotao.id AND 
        csv.lop = lop.id AND 
        csv.nienKhoa = nienkhoa.id AND 
        csv.loaiDN = doanhnghiep.id AND 
        csv.diaChiDN = diachi.id AND 
        csv.queQuan = diachi_quequan.id AND
        csv.lop = '$thongke';";
        $result = $this->db->select($query);
        return $result;
    }
    public function thongKevien($thongke)
    {

        $query =
            "select 
        csv.msv, 
        csv.tenSV, 
        csv.sdt, 
        csv.email, 
        vien.tenVien, 
        nganhdaotao.tenNganh, 
        lop.tenLop, 
        nienkhoa.nienKhoa, 
        csv.tenDN, 
        doanhnghiep.loaiDN, 
        diachi.name AS diaChiDN, 
        diachi_quequan.name AS queQuan, 
        csv.viTri, 
        csv.thuNhap
    FROM 
        csv, 
        diachi,
        diachi AS diachi_quequan, 
        doanhnghiep, 
        lop, 
        nganhdaotao, 
        nienkhoa, 
        vien
    WHERE 
        csv.vien = vien.id AND 
        csv.nganh = nganhdaotao.id AND 
        csv.lop = lop.id AND 
        csv.nienKhoa = nienkhoa.id AND 
        csv.loaiDN = doanhnghiep.id AND 
        csv.diaChiDN = diachi.id AND 
        csv.queQuan = diachi_quequan.id AND
        csv.vien = '$thongke';";
        $result = $this->db->select($query);
        return $result;
    }

    public function thongKeNienKhoa($thongke)
    {

        $query =
            "select 
        csv.msv, 
        csv.tenSV, 
        csv.sdt, 
        csv.email, 
        vien.tenVien, 
        nganhdaotao.tenNganh, 
        lop.tenLop, 
        nienkhoa.nienKhoa, 
        csv.tenDN, 
        doanhnghiep.loaiDN, 
        diachi.name AS diaChiDN, 
        diachi_quequan.name AS queQuan, 
        csv.viTri, 
        csv.thuNhap
    FROM 
        csv, 
        diachi,
        diachi AS diachi_quequan, 
        doanhnghiep, 
        lop, 
        nganhdaotao, 
        nienkhoa, 
        vien
    WHERE 
        csv.vien = vien.id AND 
        csv.nganh = nganhdaotao.id AND 
        csv.lop = lop.id AND 
        csv.nienKhoa = nienkhoa.id AND 
        csv.loaiDN = doanhnghiep.id AND 
        csv.diaChiDN = diachi.id AND 
        csv.queQuan = diachi_quequan.id AND
        csv.nienKhoa = '$thongke';";
        $result = $this->db->select($query);
        return $result;
    }

    public function thongKeQueQuan($thongke)
    {

        $query =
            "select 
        csv.msv, 
        csv.tenSV, 
        csv.sdt, 
        csv.email, 
        vien.tenVien, 
        nganhdaotao.tenNganh, 
        lop.tenLop, 
        nienkhoa.nienKhoa, 
        csv.tenDN, 
        doanhnghiep.loaiDN, 
        diachi.name AS diaChiDN, 
        diachi_quequan.name AS queQuan, 
        csv.viTri, 
        csv.thuNhap
    FROM 
        csv, 
        diachi,
        diachi AS diachi_quequan, 
        doanhnghiep, 
        lop, 
        nganhdaotao, 
        nienkhoa, 
        vien
    WHERE 
        csv.vien = vien.id AND 
        csv.nganh = nganhdaotao.id AND 
        csv.lop = lop.id AND 
        csv.nienKhoa = nienkhoa.id AND 
        csv.loaiDN = doanhnghiep.id AND 
        csv.diaChiDN = diachi.id AND 
        csv.queQuan = diachi_quequan.id AND
        csv.queQuan = '$thongke';";
        $result = $this->db->select($query);
        return $result;
    }

    public function thongKeDiaChi($thongke)
    {

        $query =
            "select 
        csv.msv, 
        csv.tenSV, 
        csv.sdt, 
        csv.email, 
        vien.tenVien, 
        nganhdaotao.tenNganh, 
        lop.tenLop, 
        nienkhoa.nienKhoa, 
        csv.tenDN, 
        doanhnghiep.loaiDN, 
        diachi.name AS diaChiDN, 
        diachi_quequan.name AS queQuan, 
        csv.viTri, 
        csv.thuNhap
    FROM 
        csv, 
        diachi,
        diachi AS diachi_quequan, 
        doanhnghiep, 
        lop, 
        nganhdaotao, 
        nienkhoa, 
        vien
    WHERE 
        csv.vien = vien.id AND 
        csv.nganh = nganhdaotao.id AND 
        csv.lop = lop.id AND 
        csv.nienKhoa = nienkhoa.id AND 
        csv.loaiDN = doanhnghiep.id AND 
        csv.diaChiDN = diachi.id AND 
        csv.queQuan = diachi_quequan.id AND
        csv.diaChiDN = '$thongke';";
        $result = $this->db->select($query);
        return $result;
    }

    public function del_csv($id)
    {
        $query = "delete from csv where msv = '$id'";
        $result = $this->db->delete($query);
        if ($result) {
            $alert = "<span class='success'> Thành công </span>";
            return $alert;
        } else {
            $alert = "<span class='error'> không thành công </span>";
            return $alert;
        }
    }
    public function getcsvId($id)
    {
        $query =
            "select 
        csv.msv, 
        csv.tenSV, 
        csv.sdt, 
        csv.email, 
        vien.tenVien, 
        nganhdaotao.tenNganh, 
        lop.tenLop, 
        nienkhoa.nienKhoa, 
        csv.tenDN, 
        doanhnghiep.loaiDN, 
        diachi.name AS diaChiDN, 
        diachi_quequan.name AS queQuan, 
        csv.viTri, 
        csv.thuNhap
    FROM 
        csv, 
        diachi,
        diachi AS diachi_quequan, 
        doanhnghiep, 
        lop, 
        nganhdaotao, 
        nienkhoa, 
        vien
    WHERE 
        csv.vien = vien.id AND 
        csv.nganh = nganhdaotao.id AND 
        csv.lop = lop.id AND 
        csv.nienKhoa = nienkhoa.id AND 
        csv.loaiDN = doanhnghiep.id AND 
        csv.diaChiDN = diachi.id AND 
        csv.queQuan = diachi_quequan.id AND
        csv.msv='$id';";
        $result = $this->db->select($query);
        return $result;
    }


    ///// end back-end /////////

    ///////// Front-end //////
    public function getproduct_feathered()
    {
        $query = "select * from tbl_product where type='0'";
        $result = $this->db->select($query);
        return $result;
    }
    public function getproduct_new()
    {
        $query = "select * from tbl_product order by productId desc limit 4";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_details($id)
    {
        $query = "select tbl_product.*,tbl_categori.catName,tbl_brand.brandName 
        from tbl_product inner join tbl_categori on tbl_product.catId = tbl_categori.catId
        inner join tbl_brand on tbl_product.brandId = tbl_brand.brandId where tbl_product.productId = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
}

?>