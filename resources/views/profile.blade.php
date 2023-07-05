@extends('layouts.admin')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded-top p-4">
            <form action="/userEdit/{{Auth::user()->id}}" method="POST" enctype='multipart/form-data'>
                @csrf
                    <div class="row">
                        <div class="col">
                            <label for="img">
                                <img class="rounded-circl" style="width: 250px; height: 250px; border-radius:50%;" src="/user/{{Auth::user()->img}}" alt="">
                            </label>
                            <input type="file" hidden id="img" name="img">
                        </div>
                        <div class="col">
                            <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control"><br>
                            <input type="text" name="email" value="{{Auth::user()->email}}" class="form-control"><br>
                            <input type="text" name="password" placeholder="enter password" class="form-control"><br>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
@endsection