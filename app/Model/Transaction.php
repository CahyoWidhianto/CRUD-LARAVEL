<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaction extends Model
{
    public static function getNewNomor(): int
    {
        $query = "select ifnull(max(id), 0) as nomor from transactions";
        return (int)collect(DB::select($query))->first()->nomor + 1;
    }

    public static function createNomorTransaksi()
    {
        $newNomor = self::getNewNomor();
        return "TRX-"
            . date('y') . '-'
            . date('m') . '-'
            . str_pad($newNomor, 5, '0', STR_PAD_LEFT);
    }


    public static function getItemTransaksi($noTransaksi)
    {
        return DB::table('transactions as trx')
            ->selectRaw('it.*, p.nama, p.code')
            ->join('item_transactions as it', 'trx.id', '=', 'it.transaction_id')
            ->join('products as p', 'p.id', '=', 'it.product_id')
            ->where('trx.number', '=', $noTransaksi)
            ->get();
    }

    public static function getIdByNoTransaksi($noTransaksi)
    {
        return DB::table('transactions')
            ->select('id')
            ->where('number','=',$noTransaksi)
            ->first()->id;
    }

    public static function getByNoTransaksi($noTransaksi)
    {
        return DB::table('transactions')
            ->selectRaw('*')
            ->where('number','=',$noTransaksi)
            ->get();
    }

    public static function getStatusByNoTransaksi($noTransaksi)
    {
        return DB::table('transactions')
            ->select('status')
            ->where('number','=',$noTransaksi)
            ->first()->status;
    }

    public static function closeByNoTransaksi($noTransaksi)
    {
        return DB::table('transactions')
            ->where('number','=',$noTransaksi)
            ->update(['status'=>'Finised']);

    }
}
