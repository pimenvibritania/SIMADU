<?php


namespace App\Helpers;


use Illuminate\Support\Carbon;

class Helper
{
    public static function generateId($model, $field, $prefix, $length = 5)
    {
        $data  = $model::orderBy('id', 'desc')->first();
        $years = Carbon::now()->format('y');

        if (!$data) {
            $og_length   = $length;
            $last_number = '';
        } else {
            $year = substr($data->$field, -2);

            if ($year != $years) {
                $og_length   = $length;
                $last_number = '';
            } else {
                $code               = substr($data->$field, strlen($prefix) + 1, -3);
                $act_last_no        = ($code / 1) * 1;
                $inc_last_no        = $act_last_no + 1;
                $last_number_length = strlen($inc_last_no);
                $og_length          = $length - $last_number_length;
                $last_number        = $inc_last_no;
            }
        }

        $zeros = "";
        for ($i = 0; $i < $og_length; $i++) {
            $zeros .= "0";
        }

        return $prefix . '-' . $zeros . $last_number . '/' . $years;
    }

    public static function generateDate($date){

        $dates = explode( '/', $date);
//        dd($dates);
        $hari = $dates[0];
        $tanggal = $dates[1];
        $bulan = $dates[2];
        $tahun = $dates[3];

        //Hari
        switch ($hari){
            case 'Sunday':
                $hari = 'Minggu';
                break;
            case 'Monday':
                $hari = 'Senin';
                break;
            case 'Tuesday':
                $hari = 'Selasa';
                break;
            case 'Wednesday':
                $hari = 'Rabu';
                break;
            case 'Thursday':
                $hari = 'Kamis';
                break;
            case 'Friday':
                $hari = 'Jumat';
                break;
            case 'Saturday':
                $hari = 'Sabtu';
                break;
            default:
                $hari = 'Tidak ditemukan';
        }

        //Tanggal
        switch ($tanggal){
            case '1':
                $tanggal = 'Satu';
                break;
            case '2':
                $tanggal = 'Dua';
                break;
            case '3':
                $tanggal = 'Tiga';
                break;
            case '4':
                $tanggal = 'Empat';
                break;
            case '5':
                $tanggal = 'Lima';
                break;
            case '6':
                $tanggal = 'Enam';
                break;
            case '7':
                $tanggal = 'Tujuh';
                break;
            case '8':
                $tanggal = 'Delapan';
                break;
            case '9':
                $tanggal = 'Sembilan';
                break;
            case '10':
                $tanggal = 'Sepuluh';
                break;
            case '11':
                $tanggal = 'Sebelas';
                break;
            case '12':
                $tanggal = 'Dua Belas';
                break;
            case '13':
                $tanggal = 'Tiga Belas';
                break;
            case '14':
                $tanggal = 'Empat Belas';
                break;
            case '15':
                $tanggal = 'Lima Belas';
                break;
            case '16':
                $tanggal = 'Enam Belas';
                break;
            case '17':
                $tanggal = 'Tujuh Belas';
                break;
            case '18':
                $tanggal = 'Delapan Belas';
                break;
            case '19':
                $tanggal = 'Sembilan Belas';
                break;
            case '20':
                $tanggal = 'Dua Puluh';
                break;
            case '21':
                $tanggal = 'Dua Puluh Satu';
                break;
            case '22':
                $tanggal = 'Dua Puluh Dua';
                break;
            case '23':
                $tanggal = 'Dua Puluh Tiga';
                break;
            case '24':
                $tanggal = 'Dua Puluh Empat';
                break;
            case '25':
                $tanggal = 'Dua Puluh Lima';
                break;
            case '26':
                $tanggal = 'Dua Puluh Enam';
                break;
            case '27':
                $tanggal = 'Dua Puluh Tujuh';
                break;
            case '28':
                $tanggal = 'Dua Puluh Delapan';
                break;
            case '29':
                $tanggal = 'Dua Puluh Sembilan';
                break;
            case '30':
                $tanggal = 'Tiga Puluh';
                break;
            case '31':
                $tanggal = 'Tiga Puluh Satu';
                break;
            default:
                $tanggal = 'Tidak ditemukan';


        }

        //Bulan
        switch ($bulan){
            case '1':
                $bulan = 'Januari';
                break;
            case '2':
                $bulan = 'Februari';
                break;
            case '3':
                $bulan = 'Maret';
                break;
            case '4':
                $bulan = 'April';
                break;
            case '5':
                $bulan = 'Mei';
                break;
            case '6':
                $bulan = 'Juni';
                break;
            case '7':
                $bulan = 'Juli';
                break;
            case '8':
                $bulan = 'Agustus';
                break;
            case '9':
                $bulan = 'September';
                break;
            case '10':
                $bulan = 'Oktober';
                break;
            case '11':
                $bulan = 'November';
                break;
            case '12':
                $bulan = 'Desember';
                break;
            default:
                $bulan = 'Tidak ditemukan';
        }

        $tahun = (new self())->terbilang($tahun);

        return $dates = [
            'hari' => $hari,
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun
        ];
    }

    public static function generateAktaSurat($no_surat, $updated_at){

        $nomor = explode('/', $no_surat);

        $update = explode('/', $updated_at->format('m/Y'));

        $bulan = $update[0];
        $tahun = $update[1];

        switch ($bulan){
            case '01':
                $bulan = 'I';
                break;
            case '02':
                $bulan = 'II';
                break;
            case '03':
                $bulan = 'III';
                break;
            case '04':
                $bulan = 'IV';
                break;
            case '05':
                $bulan = 'V';
                break;
            case '06':
                $bulan = 'VI';
                break;
            case '07':
                $bulan = 'VII';
                break;
            case '08':
                $bulan = 'VIII';
                break;
            case '09':
                $bulan = 'IX';
                break;
            case '10':
                $bulan = 'X';
                break;
            case '11':
                $bulan = 'XI';
                break;
            case '12':
                $bulan = 'XII';
                break;
            default:
                $bulan = 'XXX';
        }


        return $nomor[0] . '/' . $nomor[1] . '/CAIRO/' . $bulan . '/' . $tahun ;

    }

    public static function anakKe($anak){

        $hasil = strtolower((new self())->terbilang($anak));
        $result = 'Ke' . $hasil;
        if ($hasil == 'satu'){
            $result = 'Pertama';
        }

        return $result;

    }

    public static function disk()
    {
        return config('backpack.base.root_disk_name');
    }

    private function penyebut($nilai) {
        $nilai = abs($nilai);
        $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " ". $huruf[$nilai];
        } else if ($nilai <20) {
            $temp = $this->penyebut($nilai - 10). " Belas";
        } else if ($nilai < 100) {
            $temp = $this->penyebut($nilai/10)." Puluh". $this->penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " Seratus" . $this->penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = $this->penyebut($nilai/100) . " Ratus" . $this->penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " Seribu" . $this->penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = $this->penyebut($nilai/1000) . " Ribu" . $this->penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = $this->penyebut($nilai/1000000) . " Juta" . $this->penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = $this->penyebut($nilai/1000000000) . " Milyar" . $this->penyebut(fmod($nilai,1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = $this->penyebut($nilai/1000000000000) . " Trilyun" . $this->penyebut(fmod($nilai,1000000000000));
        }
        return $temp;
    }

    private function terbilang($nilai) {
        if($nilai<0) {
            $hasil = "minus ". trim($this->penyebut($nilai));
        } else {
            $hasil = trim($this->penyebut($nilai));
        }
        return $hasil;
    }
}
