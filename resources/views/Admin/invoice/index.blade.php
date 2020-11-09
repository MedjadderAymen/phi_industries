@extends('Admin.admin_template')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-2">
                    <a type="button" class="btn btn-block btn-outline-primary btn-sm" href="{{route('invoice.create')}}">
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
                            <h3 class="card-title">Liste des Factures</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Facture</th>
                                    <th>Nom de societé</th>
                                    <th>facturisé à</th>
                                    <th>facturisé par</th>
                                    <th>Total</th>
                                    <th>Date</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($invoices as $invoice)

                                    <tr>
                                        <td>{{$invoice->invoice_id}}</td>
                                        <td>{{$invoice->client->company_name}}</td>
                                        <td>{{$invoice->to}}</td>
                                        <td>{{$invoice->user->name}}</td>
                                        <td>{{$invoice->total}}</td>
                                        <td>{{ \Carbon\Carbon::parse($invoice->address,'GMT')->locale('fr')->isoFormat('MMM Do YYYY')}}</td>
                                        <td>
                                            <a href="{{asset(route("invoice.show",["id"=>$invoice->id]))}}" class="danger">
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