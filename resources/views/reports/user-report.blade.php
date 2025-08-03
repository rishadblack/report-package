<x-i-reports::layout>
    <x-slot name="header">
        <x-i-reports::table>
            <x-i-reports::tbody>
                <x-i-reports::tr>
                    <x-i-reports::td colspan="9"
                        style="text-align: center; font-family: Arial, sans-serif; font-size: 24px; font-weight: bold;">
                        {{ config('app.name') }}
                    </x-i-reports::td>
                </x-i-reports::tr>
                <x-i-reports::tr>
                    <x-i-reports::td colspan="9"
                        style="text-align: center; font-family: Arial, sans-serif; font-size: 18px;">
                        User Report
                    </x-i-reports::td>
                </x-i-reports::tr>
            </x-i-reports::tbody>
        </x-i-reports::table>
    </x-slot>

    <x-slot name="summary">
        <x-i-reports::table>
            <x-i-reports::tbody>
                <x-i-reports::tr>
                    <x-i-reports::td colspan="3">
                        Total Users: {{ $data->count() }}
                    </x-i-reports::td>
                    <x-i-reports::td colspan="3">
                        Active Users: {{ $data->count() }}
                    </x-i-reports::td>
                    <x-i-reports::td colspan="3">
                        Inactive Users: {{ $data->count() }}
                    </x-i-reports::td>
                </x-i-reports::tr>
            </x-i-reports::tbody>
        </x-i-reports::table>
    </x-slot>

    <x-i-reports::table border="1">
        <x-i-reports::thead>
            <x-i-reports::tr>
                <x-i-reports::th>Name</x-i-reports::th>
                <x-i-reports::th>Email</x-i-reports::th>
            </x-i-reports::tr>
        </x-i-reports::thead>
        <x-i-reports::tbody>
            @foreach ($data as $index => $user)
                <x-i-reports::tr>
                    <x-i-reports::td>{{ $user->name }}</x-i-reports::td>
                    <x-i-reports::td>{{ $user->email }}</x-i-reports::td>
                </x-i-reports::tr>
            @endforeach
        </x-i-reports::tbody>
    </x-i-reports::table>
</x-i-reports::layout>

{{-- @if (!in_array($export, ['csv', 'xlsx', 'view']))
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
@endif

@if ($export)
    <table cellpadding="5" cellspacing="0" style="border-collapse: collapse; width: 100%;">
        <tbody>
            <tr>
                <td style="text-align: center; font-family: Arial, sans-serif; font-size: 24px;margin: 0; font-size: 24px; font-weight: bold;"
                    colspan="9">
                    {{ config('app.name') }}
                </td>
            </tr>
            <tr>
                <td style="text-align: center; font-family: Arial, sans-serif; margin: 0; font-size: 18px;"
                    colspan="9">
                    User Report
                </td>
            </tr>
        </tbody>
    </table>
@endif


<div @if (!$export) style="height: calc(100vh - 0px); overflow-y: auto;" @endif>
    <table border="1" cellpadding="5" cellspacing="0"
        style="border-collapse: collapse; width: 100%; font-family: Arial, sans-serif;">
        <tbody>
            <tr>
                <td colspan="3"
                    style="padding: 8px; text-align: center; font-size: 14px; border: 1px solid #a1a1a1;background-color: #f9f9f9; font-weight: bold;">
                    Total
                    Users:
                    {{ $data->count() }}</td>
                <td colspan="3"
                    style="padding: 8px; text-align: center; font-size: 14px; border: 1px solid #a1a1a1;background-color: #f9f9f9; font-weight: bold;">
                    Active
                    Users:
                    {{ $data->count() }}</td>
                <td colspan="3"
                    style="padding: 8px; text-align: center; font-size: 14px; border: 1px solid #a1a1a1;background-color: #f9f9f9; font-weight: bold;">
                    Inactive
                    Users:
                    {{ $data->count() }}
                </td>
            </tr>
        </tbody>
    </table>

    <table border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse; width: 100%;">
        <thead style="">
            <tr style="">
                @foreach (['ID', 'Name', 'Name', 'Name', 'Name', 'Name', 'Email', 'Status', 'Role'] as $head)
                    <th
                        style="text-align: left; font-family: Arial, sans-serif; font-size: 14px;color:#ffffff;position: sticky; top: 0px;background-color: #727070;">
                        {{ $head }}
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $user)
                <tr>
                    <td
                        style="border: 1px solid #cccccc;font-family: Arial, sans-serif;@if ($loop->odd) background-color: #ececec @endif">
                        {{ $user->id }}</td>
                    <td
                        style="border: 1px solid #cccccc;font-family: Arial, sans-serif;@if ($loop->odd) background-color: #ececec @endif">
                        {{ $user->name }}</td>
                    <td
                        style="border: 1px solid #cccccc;font-family: Arial, sans-serif;@if ($loop->odd) background-color: #ececec @endif">
                        {{ $user->name }}</td>
                    <td
                        style="border: 1px solid #cccccc;font-family: Arial, sans-serif;@if ($loop->odd) background-color: #ececec @endif">
                        {{ $user->name }}</td>
                    <td
                        style="border: 1px solid #cccccc;font-family: Arial, sans-serif;@if ($loop->odd) background-color: #ececec @endif">
                        {{ $user->name }}</td>
                    <td
                        style="border: 1px solid #cccccc;font-family: Arial, sans-serif;@if ($loop->odd) background-color: #ececec @endif">
                        {{ $user->name }}</td>
                    <td
                        style="border: 1px solid #cccccc;font-family: Arial, sans-serif;@if ($loop->odd) background-color: #ececec @endif">
                        {{ $user->email }}</td>
                    <td
                        style="border: 1px solid #cccccc;font-family: Arial, sans-serif;@if ($loop->odd) background-color: #ececec @endif">
                        {{ $user->status }}</td>
                    <td
                        style="border: 1px solid #cccccc;font-family: Arial, sans-serif;@if ($loop->odd) background-color: #ececec @endif">
                        {{ $user->role }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@if (in_array($export, ['pdf', 'print']))

    @if (in_array($export, ['pdf']))
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

    @if (in_array($export, ['print']))
        <script>
            window.print();
        </script>
    @endif
    </body>

    </html>
@endif --}}
