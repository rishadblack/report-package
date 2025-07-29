<table border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse; width: 100%;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->status }}</td>
                <td>{{ $user->role }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@if ($export == 'print')
    <script>
        window.print();
    </script>
@endif

{{-- Add pagination links --}}
@if (!$export)
    {{ $data->links() }}
@endif
