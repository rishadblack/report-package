<table class="table table-border">
    <thead>
        <tr>
            <th>SL</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td scope="row">{{ $data->id }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->email }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
