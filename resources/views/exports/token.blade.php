<table>
    <thead>
    <tr>
        <th>No</th>
        <th>Token Bakal Calon Ketua</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $dt)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $dt->token }}</td>
        </tr>
    @endforeach
    </tbody>
</table>