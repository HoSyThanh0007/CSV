<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/nhapExcel.php'; ?>
<?php
require '../vendor/autoload.php';
$exc = new ex();
$trangthai = '';
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
// use Box\Spout\Common\Entity\Row;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Đường dẫn tới tệp Excel bạn muốn ghi
    $filePath = 'D:\test_PHP.xlsx';

    // Mở tệp Excel để ghi dữ liệu vào
    $writer = WriterEntityFactory::createXLSXWriter();
    $writer->openToFile($filePath);

    // Xác định sheet mục tiêu
    $sheetName = 'Sheet1'; // Tên của sheet mà bạn muốn ghi dữ liệu vào
    $writer->getCurrentSheet()->setName($sheetName); // Đặt tên cho sheet

    // Dữ liệu bạn muốn ghi vào tệp Excel
    $data = [
        ['Name', 'Age'],
        ['John', 25],
        ['Jane', 30],
        ['Doe', 35]
    ];

    // Lặp qua dữ liệu và ghi từng dòng vào sheet mục tiêu
    foreach ($data as $rowData) {
        $writer->addRow(WriterEntityFactory::createRowFromArray($rowData));
    }

    // Đóng tệp Excel sau khi đã ghi xong
    $writer->close();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit1'])) {
    // $data = array(
    //     ['Name', 'Age'],
    //     ['John', 25],
    //     ['Jane', 30],
    //     ['Doe', 35]
    // );
    // array_push($data,['ad',45]);
    // // print_r($data);
    // echo $data[1][0];
    $path = 'D:\xampp\htdocs\FBU_NCKH_PHP_Copy\lop.xlsx';
    # open the file
    $reader = ReaderEntityFactory::createXLSXReader();
    $reader->open($path);
    # read each cell of each row of each sheet
    $rowCount = 0;
    $data = array();
    foreach ($reader->getSheetIterator() as $sheet) {
        foreach ($sheet->getRowIterator() as $row) {
            $list = [];
            $rowCount++;
            if ($rowCount == 1) {
                continue;
            }
            foreach ($row->getCells() as $cell) {
                array_push($list, $cell->getValue());
                // echo $cell->getValue();
                // break;
            }
            array_push($data, $list);
        }
    }
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $currentDate = date('d-m-Y');
    for ($i = 0; $i < count($data); $i++) {
        // for ($j = 0 ; $j < count($data[0]); $j++){
        $msv      = $data[$i][0];
        $tenSV    = $data[$i][1];
        $sdt      = $data[$i][2];
        $email    = $data[$i][3];
        $vien     = $data[$i][4];
        $nganh    = $data[$i][5];
        $lop      = $data[$i][6];
        $nienKhoa = $data[$i][7];
        $tenDN    = $data[$i][8];
        $loaiDN   = $data[$i][9];
        $diaChiDN = $data[$i][10];
        $queQuan  = $data[$i][11];
        $viTri    = $data[$i][12];
        $thuNhap  = $data[$i][13];
        try{
            $nhap_excel = $exc->nhapEx($msv, $tenSV, $sdt, $email, $vien, $nganh, $lop, $nienKhoa, $tenDN, $loaiDN, $diaChiDN, $queQuan, $viTri, $thuNhap, $currentDate);
            $trangthai = "<span class='success'> Nhập thành công </span>";
            
        }
        catch(Exception $e){
            $trangthai = "<span class='error'>Lỗi: Hãy xem lại file excel</span>";
            
        }
    $reader->close();
}

}

// $pd = new product();
// if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['submit'])){
//     $insertProduct = $pd->insert_product($_POST,$_FILES);
// }else{
//     $insertProduct= "<span class='success'>.....</span>";
// }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm viện</h2>
        <div class="block copyblock">
            <form action='' method="post">
                <table class="form">
                    <?php
                    echo $trangthai;
                    // if(isset($insertBrand)){
                    //     echo $insertBrand;
                    // }
                    ?>
                    <!-- <tr>
                            <td>
                                <input type="text" name = "brandName" placeholder="Thêm viện...." class="medium" />
                            </td>
                        </tr>
                        <tr>
                        </select>
                        </td>
                        </tr> -->
                    <tr>
                        <td>
                            <!-- <input type="submit" name="submit" Value="Lưu" /> -->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit1" Value="Nhập excel" />    file excel cố định tại "D:\test_PHP.xlsx"
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>