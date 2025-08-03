<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @page {
            header: page-header;
            footer: page-footer;
        }
    </style>
</head>

<body>
    @if ($export)
        <table border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse; width: 100%;">
            <tbody>
                <tr>
                    <td style="text-align: center; font-family: Arial, sans-serif;" colspan="9">
                        <p style="margin: 0; font-size: 24px; font-weight: bold;">{{ config('app.name') }}</p>
                        <p style="margin: 0; font-size: 18px;">User Report</p>
                    </td>
                </tr>
            </tbody>
        </table>
    @endif


    <div @if (!$export) style="height: calc(100vh - 0px); overflow-y: auto;" @endif>
        <table border="1" cellpadding="5" cellspacing="0"
            style="border-collapse: collapse; width: 100%; font-family: Arial, sans-serif; font-size: 14px; margin-bottom: 10px;">
            <tbody>
                <tr style="background-color: #f9f9f9; font-weight: bold;">
                    <td colspan="3" style="padding: 8px; text-align: center;">Total Users: {{ $data->count() }}</td>
                    <td colspan="3" style="padding: 8px; text-align: center;">Active Users: {{ $data->count() }}</td>
                    <td colspan="3" style="padding: 8px; text-align: center;">Inactive Users: {{ $data->count() }}
                    </td>
                </tr>
            </tbody>
        </table>

        <table border="1" cellpadding="5" cellspacing="0"
            style="border-collapse: collapse; width: 100%; font-family: Arial, sans-serif; font-size: 14px;">
            <thead>
                <tr style="background-color: #727070; color: white; font-weight: bold;">
                    @foreach (['ID', 'Name', 'Name', 'Name', 'Name', 'Name', 'Email', 'Status', 'Role'] as $head)
                        <th style="border: 1px solid #ccc; padding: 6px; text-align: left;">
                            {{ $head }}
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $user)
                    <tr>
                        <td style="border: 1px solid #ccc;">{{ $user->id }}</td>
                        <td style="border: 1px solid #ccc;">{{ $user->name }}</td>
                        <td style="border: 1px solid #ccc;">{{ $user->name }}</td>
                        <td style="border: 1px solid #ccc;">{{ $user->name }}</td>
                        <td style="border: 1px solid #ccc;">{{ $user->name }}</td>
                        <td style="border: 1px solid #ccc;">{{ $user->name }}</td>
                        <td style="border: 1px solid #ccc;">{{ $user->email }}</td>
                        <td style="border: 1px solid #ccc;">{{ $user->status }}</td>
                        <td style="border: 1px solid #ccc;">{{ $user->role }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if ($export == 'pdf')
        <htmlpagefooter name="page-footer">
            <table width="100%" style="font-size: 8pt;">
                <tr>
                    <td width="33%">{PAGENO}/{nbpg}</td>
                    <td width="33%" align="center">{{ config('app.name') }}</td>
                    <td width="33%" align="right">{{ now()->format('d-m-Y H:i') }}</td>
                </tr>
            </table>
        </htmlpagefooter>
    @endif

    @if ($export == 'print')
        <script>
            window.print();
        </script>
    @endif

</body>

</html>
