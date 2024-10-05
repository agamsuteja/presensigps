@foreach ($karyawanlibur as $d )
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{$d->nik}}</td>
            <td>{{ $d->nama_lengkap}}</td>
            <td>{{ $d->jabatan}}</td>
        </tr>
@endforeach