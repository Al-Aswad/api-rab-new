<table>
    <thead>
        <tr></tr>
        <tr>
            <th></th>
            <th></th>
            <th colspan="5" style="text-align: center; font-weight: 700;">RENCANA ANGGARAN BIAYA (RAB)</th>
            <th></th>
        </tr>
        <tr></tr>
        <tr>
            <td></td>
            <td colspan="2">DESA</td>
            <td colspan="2">: LAMATTI RIAJA</td>

        </tr>
        <tr>
            <td></td>
            <td colspan="2">KECAMATAN</td>
            <td colspan="2">: BULUPODDO</td>
            <td>No.RAB</td>
            <td>: 01/RAB-PPD/LRJ/2017</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2">KABUPATEN</td>
            <td colspan="2">:SINJAI</td>
            <td>Bidang</td>
            <td>: {{ $anggaran[0]->nama_bidang }}</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2">PROVINSI</td>
            <td colspan="2">:SULAWESI SELATAN</td>
            <td>Kegiatan </td>
            <td>: {{ $anggaran[0]->nama_kegiatan }}</td>
        </tr>
        <tr></tr>
        <tr style="height: 60px;">
            <td style="padding: 10px;">NO.</td>
            <td style="padding: 10px;">Uraian</td>
            <td style="padding: 10px;">Volume</td>
            <td style="padding: 10px;">Satuan</td>
            <td style="padding: 10px;">Harga Satuan</td>
            <td style="padding: 10px;">Jumlah Total</td>
            <td style="padding: 10px;">Jumlah</td>
        </tr>
        <tr style="text-align: center; font-weight: 700;">
            <td>A</td>
            <td>B</td>
            <td>C</td>
            <td>D</td>
            <td>E</td>
            <td>F=C x E</td>
            <td>G</td>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; ;?>
        @foreach($anggaran as $item)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $item->uraian }}</td>
            <td>{{ $item->volume }}</td>
            <td>{{ $item->satuan }}</td>
            <td>{{ $item->harga_satuan }}</td>
            <td>{{ $item->jumlah_total }}</td>>
        </tr>
        @endforeach
    </tbody>
</table>