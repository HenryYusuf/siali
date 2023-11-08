@extends('layouts.dashboard.dashboard_app')

@section('title', 'Validasi Alumni')

@section('content')
    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">Tables</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Alumni Verified</h5>
                </div>
                <div class="card-body">
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>NISN</th>
                                <th>No Ijazah</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->nama }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->profil == null ? '' : $user->profil->nisn }}</td>
                                    <td>{{ $user->profil == null ? '' : $user->profil->no_ijazah }}</td>
                                    <td>
                                        @if ($user->profil == null)
                                        @elseif ($user->profil->is_validate == 0)
                                            <span class="badge bg-warning">Belum Tervalidasi</span>
                                        @else
                                            <span class="badge bg-success">Sudah Tervalidasi</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($user->profil == null)
                                            Data Diri Belum Lengkap
                                        @elseif ($user->profil->is_validate == 0)
                                            <a href="/approve-validasi-alumni/{{ $user->id }}" title="Validasi">
                                                <i class="fa-solid fa-circle-check" style="color: #01843a;"></i>
                                            </a>

                                            <a href="/view-validasi-alumni/{{ $user->id }}" title="View & Edit">
                                                <i class="fa-regular fa-pen-to-square" style="color: #6a6c01;"></i>
                                            </a>
                                        @else
                                            <a href="/view-validasi-alumni/{{ $user->id }}" title="View">
                                                <i class="fa-regular fa-eye" style="color: #000000;"></i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $users->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
