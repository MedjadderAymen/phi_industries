@extends('Admin.admin_template')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-2">
                    <a type="button" class="btn btn-block btn-outline-primary btn-sm" href="{{route('user.create')}}">
                        Ajouter
                    </a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Liste des profils</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Nom de societé</th>
                                    <th>Email</th>
                                    <th>Date création</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)

                                    <tr>
                                        <td>{{$user->company}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{ \Carbon\Carbon::parse($user->created_at,'GMT')->locale('fr')->isoFormat('MMM Do YYYY')}}</td>
                                        <td>

                                                @if(Auth::id() != $user->id)
                                            <a href="{{asset(route("user.delete",["id"=>$user->id]))}}">
                                                <i class="fas fa-trash-alt" style="color: #a71d2a"></i>
                                            </a>
                                                @endif

                                            @if(Auth::id() == $user->id)
                                            <a href="{{asset(route("user.edit",["id"=>$user->id]))}}" class="danger">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                                @endif
                                        </td>
                                    </tr>

                                @endforeach
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection()