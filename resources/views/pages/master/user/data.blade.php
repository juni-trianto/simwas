@extends('pages.master.index')
@section('page_sub_menu')
<div>
    <a href="{{ route('user.create') }}" class="btn btn-primary mb-3"><i class="bi bi-person-add"></i> Tambah User</a>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h6><i class="bi bi-database-fill"></i> Data {{ $page_title }}</h6>
                    </div>
                    <div class="col-md-6">
                       <form class="float-end d-flex"  method="get">
                         <input class="form-control me-2" name="key" autocomplete="off" type="search" placeholder="Search" aria-label="Search">
                         <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
            @if($database->count() != 0)
            <table id="example" class="table card-body table-bordered table-hover nowrap m-0" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($database as $data)
                    <tr>
                        <td>{{ $database->count() * ($database->currentPage() - 1 ) + $loop->iteration }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->role }}</td>
                        <td>
                          <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('user.destroy', $data->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('user.edit', $data->id) }}" class="btn btn-sm m-1 btn-primary">EDIT</a>
                              <button type="submit" class="btn btn-sm m-1 btn-danger">HAPUS</button>
                           </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else
             <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script> 
                <center>
                  <h4>Data tidak ditemukan!</h4>
                  <dotlottie-player src="https://lottie.host/74b0289a-4c13-4909-a234-f8cb7459e46e/AoCmF3MadO.json" background="transparent" speed="1" style="width: 200px; height: 200px;" loop autoplay></dotlottie-player>
                </center>
             @endif
            <div class="m-2">
                {{ $database->links('vendor.pagination.custom') }}
            </div>
        </div>
    </div>
</div>
@endsection
