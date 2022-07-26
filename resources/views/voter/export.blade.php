<table>
    <thead>
    </thead>
    <tbody>
    @foreach($export as $token)
        <tr>
            <td>{{ $token->username }}</td>
        </tr>
    @endforeach
    </tbody>
</table>