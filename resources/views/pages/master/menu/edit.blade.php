@extends('pages.master.index')
@section('page_sub_menu')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
              <h6> <i class="bi bi-database-fill-add"></i> Tambah Data {{ $page_title }}</h6>
            </div>
            <div class="card-body  bg-white ">
            <form action="{{ route('menu.update', $result->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-2">
                <label class="font-weight-bold">Menu</label>
                <input type="text" class="form-control @error('judul_menu') is-invalid @enderror" autocomplete="off" name="judul_menu" value="{{ old('judul_menu', $result->judul_menu) }}"  placeholder="Masukkan Menu ">
                <!-- error message untuk title -->
                @error('judul_menu')
                    <div class="text-danger">
                    {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label class="font-weight-bold">Link</label>
                <input type="text" class="form-control @error('link') is-invalid @enderror" autocomplete="off" name="link" value="{{ old('link', $result->link) }}" placeholder="Masukkan Link ">
                <!-- error message untuk link -->
                @error('link')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label class="font-weight-bold">Icon</label>
                <textarea class="form-control @error('icon') is-invalid @enderror" name="icon" rows="5" placeholder="Masukkan Icon Bootstrap ">{{ old('icon', $result->icon) }}</textarea>
            <!-- error message untuk icon -->
                @error('icon')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
                <button type="submit" name="submit" class="btn btn-md btn-primary m-1">UPDATE</button>
                <button type="reset" class="btn btn-md btn-warning m-1">RESET</button>
                <a href="{{ route('menu') }}" class="btn btn-md btn-ligth m-1">BACK</a>
            </form>
            </div>
        </div>
    </div>
</div>

@endsection
