@extends('Admin.admin_template')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">

        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> {{$client->company_name}}, Inc.
                                    <small class="float-right">Rejoindre le: <strong>{{ \Carbon\Carbon::parse($client->created_at,'GMT')->locale('fr')->isoFormat('MMM Do YYYY') }}</strong></small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                <address>
                                    {{$client->address}}<br>
                                    Phone: (+213) {{$client->phone_number}}<br>
                                    Email: {{$client->email}}
                                </address>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Facture N°</th>
                                        <th>Date</th>
                                        <th>Facture à</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>152F56CB</td>
                                        <td>18-09-2020</td>
                                        <td>Mr DRH Json drelo</td>
                                        <td>$646.50</td>
                                        <td>
                                            <a href="{{asset(route("client.show",["id"=>$client->id]))}}" class="danger">
                                                <i class="fas fa-eye" style="color: #1d2124"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>152F56CB</td>
                                        <td>18-09-2020</td>
                                        <td>Mr DRH Json drelo</td>
                                        <td>$646.50</td>
                                        <td>
                                            <a href="{{asset(route("client.show",["id"=>$client->id]))}}" class="danger">
                                                <i class="fas fa-eye" style="color: #1d2124"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>152F56CB</td>
                                        <td>18-09-2020</td>
                                        <td>Mr DRH Json drelo</td>
                                        <td>$646.50</td>
                                        <td>
                                            <a href="{{asset(route("client.show",["id"=>$client->id]))}}" class="danger">
                                                <i class="fas fa-eye" style="color: #1d2124"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection()