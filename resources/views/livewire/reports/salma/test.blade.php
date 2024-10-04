  <x-wire-reports::layout>
      <x-wire-reports::table>
          {{-- <x-slot:filter>
              <input wire:model.live="filters.name" class="form-select form-select-sm" placeholder="Name" />
              <input wire:model.live="filters.email" class="form-select form-select-sm" placeholder="Email" />
          </x-slot:filter> --}}
          <x-slot:button>
              <button wire:click="export('pdf')" class="btn btn-primary">PDF</button>
              <button wire:click="export('csv')" class="btn btn-primary">CSV</button>
              <button wire:click="export('xlsx')" class="btn btn-primary">XLSX</button>
          </x-slot:button>
          <x-slot:logo hide="excel">
              <tr>
                  <td colspan="3" style="text-align: center; vertical-align: middle;">
                      <img src="{{ url('images/logo.png') }}" alt="logo" width="100px" height="100px" />
                  </td>
              </tr>
          </x-slot:logo>
          <x-slot:header>
              <tr>
                  <td colspan="3" style="text-align: center; font-weight: bold; font-size: 20px;">
                      <h1>User Report</h1>
                  </td>
              </tr>
              <tr>
                  <td colspan="3" style="text-align: center;">
                      <p><b>All user reports</b></p>
                  </td>
              </tr>
          </x-slot:header>
          <x-slot:subheader>
              <tr>
                  <th colspan="3">NB: All user are active.</th>
              </tr>
          </x-slot:subheader>
          <x-slot:thead>
              <x-wire-reports::table.tr>
                  <x-wire-reports::table.th column="id" />
                  <x-wire-reports::table.th column="name" />
                  <x-wire-reports::table.th column="email" />
              </x-wire-reports::table.tr>
          </x-slot:thead>
          <x-slot:tbody>
              @foreach ($datas as $data)
                  <x-wire-reports::table.tr>
                      <x-wire-reports::table.td scope="row"
                          column="id">{{ $data->id }}</x-wire-reports::table.td>
                      <x-wire-reports::table.td
                          column="name"><strong>{{ $data->name }}</strong></x-wire-reports::table.td>
                      <x-wire-reports::table.td column="email">{{ $data->email }}</x-wire-reports::table.td>
                  </x-wire-reports::table.tr>
              @endforeach
          </x-slot:tbody>
          <x-slot:footer>
              Copyright 2024
          </x-slot:footer>
      </x-wire-reports::table>
  </x-wire-reports::layout>
