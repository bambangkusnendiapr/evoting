<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>Jumlah Suara</th>
        </tr>
    </thead>
    <tbody>
    @foreach($export as $hasil)
        <tr>
            <td>{{ $hasil->nama }}</td>
            <td>{{ $hasil->jumlah_suara }}</td>
        </tr>
    @endforeach
    </tbody>
</table>