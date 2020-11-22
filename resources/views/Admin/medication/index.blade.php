@extends('Admin.admin_template')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-2">
                    <a type="button" class="btn btn-block btn-outline-primary btn-sm" href="{{route('create')}}">
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
                            <h3 class="card-title">Liste des médicaments</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prix unitaire</th>
                                    <th>N° Lot</th>
                                    <th>Quantité In</th>
                                    <th>PPC</th>
                                    <th>DDP</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($medications as $medication)

                                    <tr>
                                        <td>{{$medication->name}}</td>
                                        <td>{{$medication->price}}</td>
                                        <td>{{$medication->plot}}</td>
                                        <td>{{$medication->quantity}}</td>
                                        <td>{{$medication->ppc}}</td>
                                        <td>{{$medication->ddp}}</td>
                                        <td>
                                            <a href="{{asset(route("delete",["id"=>$medication->id]))}}">
                                                <i class="fas fa-trash-alt" style="color: #a71d2a"></i>
                                            </a>

                                            <a href="{{asset(route("edit",["id"=>$medication->id]))}}" class="danger">
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