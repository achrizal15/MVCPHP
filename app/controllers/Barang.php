<?php
class Barang extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['login_key'])) {
            header("Location:" . URLPUBLIC."/Authentikasi");
        }
        $data['barang'] = $this->models("Barang_models")->getAllBarang();
        $this->views("barang/index", $data, "Daftar Barang");
    }
    public function fileUpload()
    {
        $gambar = $_FILES['gambar'];
        $fileName = $gambar['name'];
        // $fileType = $gambar['type'];GAK KEPAKE
        $fileType = ['jpg', 'png', 'jpeg'];
        $tmpName = $gambar['tmp_name'];
        $uploadError = $gambar['error'];
        $fileSize = $gambar['size'];
        $format = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        if (!in_array($format, $fileType)) {
            return false;
        }
        if ($fileSize > 100000) {

            return false;
        }
        $fileName = "IMG" . rand(0, 100) . uniqid() . "." . $format;
        move_uploaded_file($tmpName, "./img/" . $fileName);
        return $fileName;
    }
    public function hapus($id, $img)
    {
        if ($this->models("Barang_models")->delBarang($id) > 0) {
            unlink("./img/" . $img);
            FlashMessage::setMessage("Hapus data berhasil.", "success");
            header("Location:" . URLPUBLIC . "/barang");
        } else {
            FlashMessage::setMessage("Hapus data gagal.", "danger");
            header("Location:" . URLPUBLIC . "/barang");
        }
    }
    public function selectSingle($id)
    {
        $data['barang'] = $this->models("Barang_models")->getBarangById($id);
        $this->views("barang/editData", $data, "Edit Data Barang");
    }
    public function editData()
    {
        $gambar = $this->fileUpload();
        if (!$gambar) {
            $gambar = $_POST['gambarlawas'];
        } else {
            unlink("./img/" . $_POST['gambarlawas']);
        }
        if($this->models("Barang_models")->updateBarang($_POST,$gambar)>0){
            FlashMessage::setMessage("Update data berhasil.", "success");
            header("Location:" . URLPUBLIC . "/barang");
        }else{
            FlashMessage::setMessage("Update data gagal.", "danger");
            header("Location:" . URLPUBLIC . "/barang");
        }
    }
    public function detail()
    {
        $id = $_POST['id'];
        echo json_encode($this->models("Barang_models")->getBarangById($id));
    }
    public function tambah()
    {
        $model = $this->models("Barang_models");
        $gambar = $this->fileUpload();
        if (!$gambar) {
            return false;
        } else {
            if ($model->addBarang($_POST, $gambar) != 0) {
                FlashMessage::setMessage("Input data berhasil.", "success");
                header("Location:" . URLPUBLIC . "/barang");
            } else {
                FlashMessage::setMessage("Input data gagal.", "danger");
                header("Location:" . URLPUBLIC . "/barang");
            }
        }
    }
}
