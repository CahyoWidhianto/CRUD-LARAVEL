<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Model\product;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ProductController extends PwlBaseController
{
    public function index()
    {
        $data = [
            'products' => product::all()
        ];
        return view('content/product/list', $data);
    }

    public function formTambah()
    {
        return view('content/product/formNew');
    }

    public function create()
    {
        $product = new product();
        $product ->code       = request('code');
        $product ->nama       = request('nama');
        $product ->price      = request('price');
        $product ->expired    = request('expired');
        $product ->stock      = request('stock');
        $product->save();

        return redirect(route('pr.list'));

    }

    public function formUbah($id)
    {
            $product = product::getByPrimaryKey($id);
            return view('content/product/formUpdate', compact('product'));
    }

    public function update($id)
    {
        $this->onlySuperAdmin();
        $product = product::where('id', $id) ->first();
        $product ->nama       = request('nama');
        $product ->price      = request('price');
        $product ->expired    = request('expired');
        $product ->stock      = request('stock');
        $product->save();

        return redirect(route('pr.list'));
    }

    public function konfirmasiHapus($id)
    {
        $this->onlySuperAdmin();
        $product = product::getByPrimaryKey($id);
        return view('content/product/konfirmasiHapus', compact('product'));
    }
//
//    public function delete($id)
//    {
//        $this->onlySuperAdmin();
//        $product = product::hapus($id);
//        return redirect(route('pr.list'));
//    }

    public function delete($id)
    {
        $this->onlySuperAdmin();
        $product= product::where('id',$id)->delete();
        return redirect(route('pr.list'));
    }
}
