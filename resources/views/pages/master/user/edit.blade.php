@extends('pages.master.index')
@section('page_sub_menu')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
              <h6> <i class="bi bi-database-fill-add"></i> {{ $page_title }}</h6>
            </div>
            <div class="card-body  bg-white ">
            <form action="{{ route('user.update', $result->id) }}" method="POST" >
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label class="font-weight-bold">Nama Lengkap</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" autocomplete="off" name="name" value="{{ old('name', $result->name) }}"  placeholder="Masukkan Nama Lengkap ">
                <!-- error message untuk title -->
                @error('name')
                    <div class="text-danger">
                    {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label class="font-weight-bold">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" autocomplete="off" name="username" value="{{ old('username', $result->username) }}"  placeholder="Masukkan Username ">
                <!-- error message untuk title -->
                @error('username')
                    <div class="text-danger">
                    {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label class="font-weight-bold">NIP</label>
                <input type="text" class="form-control @error('nip') is-invalid @enderror" autocomplete="off" name="nip" value="{{ old('nip', $result->nip) }}"  placeholder="Masukkan Username ">
                <!-- error message untuk title -->
                @error('nip')
                    <div class="text-danger">
                    {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label class="font-weight-bold">Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" autocomplete="off" name="email" value="{{ old('email', $result->email) }}" placeholder="Masukkan Email ">
                <!-- error message untuk email -->
                @error('email')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label class="font-weight-bold">Role</label>
                <select name="role" class="form-control @error('role') is-invalid @enderror" >
                    <option value="">..::Pilih Role::..</option>
                    <option value="member" @if(old('role', $result->role) == 'member') selected @endif >member</option>
                    <option value="administrator"  @if(old('role', $result->role) == 'administrator') selected @endif>administrator</option>
                </select>
                <!-- error message untuk confirm_password -->
                @error('role')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
                <button type="submit" name="submit" class="btn btn-md btn-primary m-1">UPDATE</button>
                <button type="reset" class="btn btn-md btn-warning m-1">RESET</button>
                <a href="{{ route('user') }}" class="btn btn-md btn-ligth m-1">BACK</a>
            </form>
            </div>
        </div>
    </div>
</div>

@endsection
