@extends('pages.master.index')
@section('page_sub_menu')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
              <h6> <i class="bi bi-database-fill-add"></i> Tambah Data {{ $page_title }}</h6>
            </div>
            <div class="card-body   ">
            <form action="{{ route('menu.create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-2">
                <label class="font-weight-bold">Menu</label>
                <input type="text" class="form-control bg-white @error('judul_menu')  is-invalid @enderror" autocomplete="off" name="judul_menu" value="{{ old('judul_menu') }}" placeholder="Masukkan Menu ">
                <!-- error message untuk title -->
                @error('judul_menu')
                    <div class="text-danger">
                    {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label class="font-weight-bold">Link</label>
                <input type="text" class="form-control bg-white @error('link') is-invalid @enderror" autocomplete="off" name="link" value="{{ old('link') }}" placeholder="Masukkan Link ">
                <!-- error message untuk link -->
                @error('link')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label class="font-weight-bold">Icon</label>
                <textarea class="form-control bg-white @error('icon') is-invalid @enderror" name="icon" rows="5" placeholder="Masukkan Icon Bootstrap ">{{ old('icon') }}</textarea>
            <!-- error message untuk icon -->
                @error('icon')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
                <button type="submit" name="submit" class="btn btn-md btn-primary m-1">SIMPAN</button>
                <button type="reset" class="btn btn-md btn-warning m-1">RESET</button>
            </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card ">
            <div class="card-header">
                <h6><i class="bi bi-database-fill"></i> Data {{ $page_title }}</h6>
            </div>
            <table id="example" class="table card-body  table-striped table-hover nowrap m-0" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Menu</th>
                        <th>Icon</th>
                        <th>Link</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($database as $data)
                    <tr>
                        <td>{{ $database->count() * ($database->currentPage() - 1 ) + $loop->iteration }}</td>
                        <td>{{ $data->judul_menu }}</td>
                        <td>{{ $data->link }}</td>
                        <td>{{ $data->icon }}</td>
                        <td>
                           <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('menu.destroy', $data->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('menu.edit', $data->id) }}" class="btn btn-sm m-1 btn-primary">EDIT</a>
                              <button type="submit" class="btn btn-sm m-1 btn-danger">HAPUS</button>
                           </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $database->links('vendor.pagination.custom') }}
        </div>
    </div>
</div>



@endsection
