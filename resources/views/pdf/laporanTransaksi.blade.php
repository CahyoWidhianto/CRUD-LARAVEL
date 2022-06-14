<style>
    th {
        border: 2px solid #000000;
        background: #aaaaaa;
    }

    td {
        border: 2px solid #000000;
    }

    .text-center {
        text-align: center;
    }
</style>

<H1>Laporan Transaksi {{$trxNumber}}</H1>
<table style="border: 1;">
    <thead>
    <tr>
        <th>Kode barang</th>
        <th>Nama barang</th>
        <th>Harga barang</th>
        <th>Jumlah barang</th>
        <th>Total barang</th>
    </tr>
    </thead>
    <tbody>
    @php
        $total = 0;
    @endphp
    @foreach($itemTransaksi as $row)
        @php
            $totalItem = (int)$row->price * (int)$row->amount;
            $total += $totalItem;
        @endphp
        <tr>
            <td class="text-center text-monospace">{{$row->code}}</td>
            <td class="text-center text-monospace">{{$row->nama}}</td>
            <td class="text-center text-monospace">
                Rp{{number_format($row->price,'0',',','.')}}</td>
            <td class="text-center text-monospace">{{$row->amount}}</td>
            <td class="text-center text-monospace">
                Rp{{number_format($totalItem,'0',',','.')}}</td>
        </tr>
    @endforeach
    <tr>
        <td colspan="4">Total Belanja</td>
        <td class="text-center text-monospace">Rp{{number_format($total,'0',',','.')}}</td>
    </tr>
    </tbody>
</table>
