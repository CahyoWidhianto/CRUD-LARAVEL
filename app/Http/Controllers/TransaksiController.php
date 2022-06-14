<?php


namespace App\Http\Controllers;


use App\Helper\Util;
use App\Model\Transaction;
use Illuminate\Support\Facades\Storage;
use Mpdf\Output\Destination;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class TransaksiController extends PwlBaseController
{
    public function index()
    {
        $transaksi = Transaction::all();
        $data = [
            'transaksi' => $transaksi
        ];
        return view('content.transaksi.list', $data);
    }

    public function exportExcel($trxNumber)
    {
        $transaksi = Transaction::getByNoTransaksi($trxNumber);
        $itemTransaksi = Transaction::getItemTransaksi($trxNumber);

        #1 siapkan file name
        $fileName = "Data Transaksi ($trxNumber).xlsx";
        #2 buat objek dari class spredseet
        $spreadsheet = new Spreadsheet();
        #3 Aktifkan salah satu spreadsheet
        $sheet = $spreadsheet->getActiveSheet();
        #4 insert data
        $sheet->setCellValue('A1', "Data Transaksi $trxNumber ");
        $sheet->setCellValue('A3', "No");
        $sheet->setCellValue('B3', "Nama Barang");
        $sheet->setCellValue('C3', "Kode Barang");
        $sheet->setCellValue('D3', "Harga Barang");
        $sheet->setCellValue('E3', "Jumlah");
        $sheet->setCellValue('F3', "Sub Total");
        $baris = 4;
        $no = 1;
        foreach ($itemTransaksi as $it) {
            $totalItem = $it->price * $it->amount;
            $sheet->setCellValue('A' . $baris, $no++);
            $sheet->setCellValue('B' . $baris, $it->nama);
            $sheet->setCellValue('C' . $baris, $it->code);
            $sheet->setCellValue('D' . $baris, $it->price);
            $sheet->setCellValue('E' . $baris, $it->amount);
            $sheet->setCellValue('F' . $baris, $totalItem);
            $baris++;
        }
        $sheet->mergeCells('A1:F1');
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);

        #siapkan untuk export
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; file name="' . $fileName . '"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }

    public function exportPdf($trxNumber)
    {
        $fileName = "Data Transaksi $trxNumber.pdf";
        #create mpdf dokumen
        $document = new \Mpdf\Mpdf();
        $itemTransaksi = Transaction::getItemTransaksi($trxNumber);
        $data= [
            'trxNumber'=>$trxNumber,
            'itemTransaksi'=>$itemTransaksi
        ];
        $document->WriteHTML(view('pdf.laporanTransaksi', $data));
//        Storage::disk('public')->put(
//            $fileName,
//            $document->Output($fileName, Destination::STRING_RETURN)
//        );
        $document->Output($fileName, Destination::INLINE);
    }

}
