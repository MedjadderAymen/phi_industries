@extends('Admin.admin_template')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-2">
                    <a type="button" class="btn btn-block btn-outline-primary btn-sm" href="{{route('quote.create')}}">
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
                            <h3 class="card-title">Liste des Devis</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Devis</th>
                                    <th>Nom de societé</th>
                                    <th>Devis à</th>
                                    <th>Total</th>
                                    <th>Date</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($quotes as $quote)

                                    <tr>
                                        <td>{{$quote->quote_id}}</td>
                                        <td>{{$quote->client->company_name}}</td>
                                        <td>{{$quote->to}}</td>
                                        <td>{{$quote->total_to_pay}} Da</td>
                                        <td>{{ \Carbon\Carbon::parse($quote->address,'GMT')->locale('fr')->isoFormat('MMM Do YYYY')}}</td>
                                        <td>
                                            <a href="{{asset(route("quote.show",["id"=>$quote->id]))}}" class="danger">
                                                <i class="fas fa-eye" style="color: #1d2124"></i>
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