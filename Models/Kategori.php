<?php
/**
 * Created by PhpStorm.
 * User: EA
 * Date: 19.04.2014
 * Time: 15:59
 */

class Kategori extends Admin {

    public function kategoriEkle( $isim ){
        $sql = 'INSERT INTO kategori(name)'
            . "VALUES('$isim');";

        $result = mysqli_query($this->con, $sql);

        return $result;
    }
    public function getKategori($number=NULL) {
        $limit = is_null($number) ?  NULL : " LIMIT 0, $number";

        $sql = 'SELECT * FROM kategori';
        $sql .= ' ORDER BY id DESC';
        $sql .= is_null($limit) ? '' : $limit;

        $result = mysqli_query($this->con, $sql);
        return $result;
    }

    public function delete($id){

        $sql = "DELETE FROM kategori WHERE id=$id;";
        $delete_result = mysqli_query($this->con, $sql);

        return $delete_result;
    }
    public function update($id, $isim){

        $sql= "update kategori set isim='$isim' where id='$id'";

        $result= mysqli_query($this->con, $sql);
        return $result;
    }

}


