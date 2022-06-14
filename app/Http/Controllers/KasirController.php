<?php


namespace App\Http\Controllers;


use App\Model\product;
use App\Model\Transaction;
use Illuminate\Support\Facades\DB;

class KasirController extends PwlBaseController
{
    public function index()
    {
        $noTransaksi = Transaction::createNomorTransaksi();
        $transaksi = [
            'number' => $noTransaksi,
            'user_id' => $this->getIdUser(),
            'status' => 'darft'
        ];
        DB::table('transactions')
            ->insert($transaksi);
        return redirect(route('kasir.app', [$noTransaksi]));
    }

    public function aplikasi($noTransaksi)
    {
        $data = [
            'status_transaksi'=>Transaction::getStatusByNoTransaksi($noTransaksi),
            'no_transaksi' => $noTransaksi,
            'item_transaksi' => Transaction::getItemTransaksi($noTransaksi)
        ];
        return view('content.app.index', $data);
    }

    public function searchProduct($code)
    {
        $product = product::getByCode($code);
        if ($product == null) {
            return response()->json([], 404);
        }
        return response()->json($product, 200);
    }

    public function insertItem($noTransaksi)
    {
        $idTransaksi = Transaction::getIdByNoTransaksi($noTransaksi);
        $itemTransaksi = [
            'price' => request('price'),
            'amount' => request('amount'),
            'product_id' => request('product_id'),
            'transaction_id' => $idTransaksi
        ];
        DB::table('item_transactions')->insert($itemTransaksi);
        return redirect(route('kasir.app', [$noTransaksi]));
    }

    public function tutupTransaksi($noTransaksi)
    {
        Transaction::closeByNoTransaksi($noTransaksi);
        return redirect(route('kasir.app', [$noTransaksi]));
    }

}
