<?php


namespace App\Helper;


class Util
{
    public static function rupiah($angka)
    {
        return ' Rp' + number_format($angka, '0', ',', '.');

    }

    public static function getStatusTrx($status)
    {
        $result = '<span class="badge badge-danger">Draft</span>';
        if ($status === 'Finised') {
            $result = '<span class="badge badge-success">Finised</span>';
        }
        return $result;
    }
}
