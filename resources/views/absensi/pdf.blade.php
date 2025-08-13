<h2 style="text-align: center;">📋 Rekap Absensi</h2>
<table width="100%" border="1" cellspacing="0" cellpadding="5">
    <thead>
        <tr>
            <th>#</th>
            <th>Tanggal</th>
            <th>Sesi</th>
            <th>Jumlah Hadir</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rekap as $i => $r)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ \Carbon\Carbon::parse($r->tanggal)->format('d-m-Y') }}</td>
            <td>{{ $r->nama_sesi }}</td>
            <td>{{ $r->kehadiran_count }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
