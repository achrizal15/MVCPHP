<?php
class Barang extends Controller
{
    public function index()
    {
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
            FlashMessage::setMessage("Bukan gambar.", "danger");
            header("Location:" . URLPUBLIC . "/barang");
            return false;
        }
        if ($fileSize > 100000) {
            FlashMessage::setMessage("Ukuran gambar terlalu besar maksimal 100mb.", "danger");
            header("Location:" . URLPUBLIC . "/barang");
            return false;
        }
        $fileName = "IMG".rand(15,35) . uniqid() . "." . $format;
        move_uploaded_file($tmpName, "./img/" . $fileName);
        return $fileName;
    }
    public function hapus($id,$img){
        if($this->models("Barang_models")->delBarang($id)>0){
            unlink("./img/".$img);
            FlashMessage::setMessage("Hapus data berhasil.", "success");
            header("Location:" . URLPUBLIC . "/barang");
        }else{
            FlashMessage::setMessage("Hapus data gagal.", "danger");
            header("Location:" . URLPUBLIC . "/barang");
        }
       
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
