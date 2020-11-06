@extends('Admin.admin_template')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-2">
                    <a type="button" class="btn btn-block btn-outline-primary btn-sm" href="{{route('client.create')}}">
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
                            <h3 class="card-title">Liste des clients</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Nom de societé</th>
                                    <th>Phone number</th>
                                    <th>Email</th>
                                    <th>Adresse</th>
                                    <th>Total factures</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($clients as $client)

                                    <tr>
                                        <td>{{$client->company_name}}</td>
                                        <td>{{$client->phone_number}}</td>
                                        <td>{{$client->email}}</td>
                                        <td>{{$client->address}}</td>
                                        <td>00</td>
                                        <td>
                                            <a href="{{asset(route("client.show",["id"=>$client->id]))}}" class="danger">
                                                <i class="fas fa-eye" style="color: #1d2124"></i>
                                            </a>

                                            <a href="{{asset(route("client.delete",["id"=>$client->id]))}}">
                                                <i class="fas fa-trash-alt" style="color: #a71d2a"></i>
                                            </a>

                                            <a href="{{asset(route("client.edit",["id"=>$client->id]))}}" class="danger">
                                                <i class="fas fa-edit"></i>
                                            </a>
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