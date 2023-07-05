@extends('layouts.admin')

@section('content')
@if (Auth::user()->admin == '1')
        <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <h1>Tasdiqlanmagan Foydalanuvchilar</h1>
                    <a href="/export" class="btn btn-primary">Expor users</a>
            
            <table class="table table-hover table-stripped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                        <th scope="col">content</th>
                </tr>
                  
                </thead>
                @foreach ($user as $u)
                    @if ($u->admin == Null)
                        <tbody>
                            <tr>
                                <th scope="row">{{ $u -> id }}</th>
                                <td>{{ $u -> name }}</td>
                                <td>{{ $u -> email }}</td>
                                    <td>
                                        <a href="/checkUser1/{{ $u -> id}}" class="btn btn-success btn-sm"><i class="fa-solid fa-hammer"></i></a>
                                        <a href="/checkUser2/{{ $u -> id}}" class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>
                                        <a href="/deleteUser/{{ $u -> id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                    </td>
                            </tr>
                        </tbody>
                    @endif
                @endforeach
              </table>
            
        </div>
    </div>
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded-top p-4">
        <h5>Users</h5>
        @if (Auth::user()->admin == '1')
            <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add User
            </button>
            
            <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content bg-secondary">
                        <div class="modal-body"> <h1 class="modal-title fs-5" id="exampleModalLabel">Add User</h1>
                            <form action="/userSave" method="post" enctype='multipart/form-data'>
                                @csrf
                                <input type="text" name="name" placeholder="name" class="form-control"><br>
                                <input type="email" name="email" placeholder="email" class="form-control"><br>
                                <input type="password" name="password" placeholder="password" class="form-control"><br>
                                <input type="file" name="img" placeholder="img" class="form-control"><br>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <table class="table table-hover table-stripped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">admin</th>
                    @if (Auth::user()->admin == '1')
                        <th scope="col">content</th>
                    @endif
                    
                </tr>
              
            </thead>
                @if (Auth::user()->admin == '1' || Auth::user()->admin == '2')
                    @foreach ($user as $u)
                        @if ($u->admin >0)
                            <tbody>
                            <tr>
                                <th scope="row">{{ $u -> id }}</th>
                                <td>{{ $u -> name }}</td>
                                <td>{{ $u -> email }}</td>
                                <td>
                                    @if ($u->admin == '1')
                                        Bosh admin
                                    @endif
                                    @if ($u->admin == '2')
                                        Kuzatuvchi admin
                                    @endif
                                </td>
                                @if (Auth::user()->admin == '1')
                                    
                                    <td>
                                        <a href="/deleteUser/{{ $u -> id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                        
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $u -> id}}">
                                            <i class="fa fa-pen"></i>
                                        </button>
                                        
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $u -> id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content bg-secondary">
                                                <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="/userEdit/{{ $u -> id}}" method="post" enctype='multipart/form-data'>
                                                        @csrf
                                                        <input type="text" name="name" value="{{ $u -> name }}" class="form-control"><br>
                                                        <input type="email" name="email" value="{{ $u -> email }}" class="form-control"><br>
                                                        <input type="password" name="password" value="{{ $u-> password}}" class="form-control"><br>
                                                        <input type="file" name="img" placeholder="your img" class="form-control"><br>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </form>
                                                </div>
                                                
                                            </div>
                                            </div>
                                        </div>
                                    </td>
                                @endif
                            </tr>
                        </tbody>
                        @endif
                    @endforeach
                @endif
          </table>
    </div>
</div>
@endif
@endsection