@extends('layouts.admin')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded-top p-4">
        <h5>Teachers</h5>
        @if (Auth::user()->admin == 1)
            <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add Teacher
            </button>
            
            <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content bg-secondary">
                        <div class="modal-body"> <h1 class="modal-title fs-5" id="exampleModalLabel">Add Teacher</h1><br>
                            <form action="/teacherSave" method="post" enctype='multipart/form-data'>
                                @csrf
                                <input type="text" name="name" placeholder="name" class="form-control"><br>
                                <label for="img" class="btn btn-primary form-label" >img</label><br><br>
                                <input type="file" name="img"  id="img" hidden>
                                <input type="text" name="job" placeholder="job" class="form-control"><br>
                                <textarea ype="text" name="message" placeholder="message" class="form-control" cols="10" rows="10"></textarea>
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
                <th scope="col">img</th>
                <th scope="col">job</th>
                <th scope="col">message</th>
                @if (Auth::user()->admin == 1)
                    <th scope="col">content</th>
                @endif
              </tr>
            </thead>
            @foreach ($teacher as $t)
                <tbody>
                    <tr>
                        <th scope="row">{{ $t -> id }}</th>
                        <td>{{ $t -> name }}</td>
                        <td><img src="/teachers/{{ $t -> img }}" alt="" width="200"></td>
                        <td>{{ $t -> job }}</td>
                        <td>{{ $t -> message }}</td>
                        @if (Auth::user()->admin == 1)
                            <td>
                                <a href="/deleteTeacher/{{ $t -> id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $t -> id}}">
                                    <i class="fa fa-pen"></i>
                                </button>
                                
                                <!-- Modal -->
                                <div class="modal fade" id="editModal{{ $t -> id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content bg-secondary">
                                        <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/teacherEdit/{{ $t -> id}}" method="post" enctype='multipart/form-data'>
                                                @csrf
                                                <input type="text" name="name" value="{{ $t ->name }}" class="form-control"><br>
                                                <label for="logo" class="btn btn-primary form-label" >img</label><br><br>
                                                <input type="file" name="img"  id="logo" hidden>
                                                <input type="text" name="job" value="{{ $t ->job }}" class="form-control"><br>
                                                <input type="text" name="message" value="{{ $t ->message }}" class="form-control" ><br>
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
            @endforeach
          </table>
    </div>
</div>
@endsection