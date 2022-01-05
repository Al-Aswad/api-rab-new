{{-- <table>
    <thead>
        <tr></tr>
        <tr>
            <th></th>
            <th></th>
            <th colspan="5">RENCANA ANGGARAN BIAYA (RAB)</th>
            <th></th>
        </tr>
        <tr></tr>
        <tr>
            <td></td>
            <td colspan="2">DESA</td>
            <td>:</td>
            <td colspan="2">LAMATTI RIAJA</td>

        </tr>
        <tr>
            <td></td>
            <td colspan="2">KECAMATAN</td>
            <td>:</td>
            <td colspan="2">BULUPODDO</td>
            <td></td>
            <td>No.RAB</td>
            <td>: 01/RAB-PPD/LRJ/2017</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2">KABUPATEN</td>
            <td>:</td>
            <td colspan="2">SINJAI</td>
            <td></td>
            <td>Bidang</td>
            <td>: Penyelenggaraan Pemerintahan Desa</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2">PROVINSI</td>
            <td>:</td>
            <td colspan="2">SULAWESI SELATAN</td>
            <td></td>
            <td>Kegiatan</td>
            <td>: Belanja Pegawai</td>
        </tr>
        <tr></tr>
        <tr>
            <td>NO.</td>
            <td>Uraian</td>
            <td>Volume</td>
            <td>Satuan</td>
            <td>Harga Satuan</td>
            <td>Jumlah Total</td>
            <td>Jumlah</td>
        </tr>
        <tr style="heigth:30px; text-align:center">
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
        @foreach($anggaran as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->uraian }}</td>
            <td>{{ $item->volume }}</td>
            <td>{{ $item->satuan }}</td>
            <td>{{ $item->harga_satuan }}</td>
            <td>{{ $item->jumlah_total }}</td>>
        </tr>
        @endforeach
    </tbody>
</table> --}}

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
            {{-- <td></td> --}}
            <td>No.RAB</td>
            <td>: 01/RAB-PPD/LRJ/2017</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2">KABUPATEN</td>
            <td colspan="2">:SINJAI</td>
            {{-- <td></td> --}}
            <td>Bidang</td>
            <td>: {{ $anggaran[0]->nama_bidang }}</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2">PROVINSI</td>
            <td colspan="2">:SULAWESI SELATAN</td>
            {{-- <td></td> --}}
            <td>Kegiatan </td>
            {{-- <td>: Belanja Pegawai</td> --}}
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
        {{-- <tr>
            <td colspan="10"></td>
        </tr>
        <tr>
            <td colspan="10"></td>
        </tr> --}}
    </thead>
    <tbody>
        @foreach($anggaran as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->uraian }}</td>
            <td>{{ $item->volume }}</td>
            <td>{{ $item->satuan }}</td>
            <td>{{ $item->harga_satuan }}</td>
            <td>{{ $item->jumlah_total }}</td>>
        </tr>
        @endforeach
    </tbody>
</table>