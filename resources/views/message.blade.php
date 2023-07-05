@extends('layouts.admin')

@section('content')
    @if (Auth::user()->admin == '1')

        <div class="container-fluid pt-4 px-4">
            <div class="bg-secondary rounded-top p-4">
                <h5>Tasdiqlanmagan Habarlar</h5>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>name</th>
                            <th>email</th>
                            <th>about</th>
                            <th>message</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    @foreach ($message as $m)
                        @if ($m->type == Null)
                            <tbody>
                                <tr>
                                    <td>{{$m->id}}</td>
                                    <td>{{$m->name}}</td>
                                    <td>{{$m->email}}</td>
                                    <td>{{$m->about}}</td>
                                    <td>{{$m->message}}</td>
                                    <td>
                                        <a href="/checkedMessage/{{$m->id}}" class="btn btn-sm btn-success"><i class="fa fa-check"></i></a>
                                        <a href="/deleteMessage/{{$m->id}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
                <h5>Tasdiqlangan Habarlar</h5>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>name</th>
                            <th>email</th>
                            <th>about</th>
                            <th>message</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    @foreach ($message as $m)
                        @if ($m->type == 1)
                            <tbody>
                                <tr>
                                    <td>{{$m->id}}</td>
                                    <td>{{$m->name}}</td>
                                    <td>{{$m->email}}</td>
                                    <td>{{$m->about}}</td>
                                    <td>{{$m->message}}</td>
                                    <td>
                                        <a href="/deleteMessage/{{$m->id}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        @endif
                    @endforeach
                </table>
            </div>
        </div>
    @endif    
@endsection