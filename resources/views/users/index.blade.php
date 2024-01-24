@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                <h4 class="card-title">Users</h4>
                            </div>
                            <div class="col-4 text-right">
                                <a href="user/new" class="btn btn-sm btn-primary"><i class="tim-icons icon-simple-add"></i> Add user</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="">
                            <table class="table tablesorter " id="">
                                <thead class=" text-primary">
                                <tr><th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Creation Date</th>
                                    <th scope="col"></th>
                                </tr></thead>
                                <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user['name']}}</td>
                                    <td>
                                        <a href="mailto:{{$user['email']}}">{{$user['email']}}</a>
                                    </td>
                                    <td>{{$user['created_at']}}</td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <div class="row-cols-1"><a class="dropdown-item" href="users/edit/{{$user['id']}}"><i class="tim-icons icon-pencil"></i> Edit</a></div>
                                                <div class="row-cols-1"><a class="dropdown-item" href="users/remove/{{$user['id']}}"><i class="tim-icons icon-trash-simple"></i> Remove</a></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">

                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
