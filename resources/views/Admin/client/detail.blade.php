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
                                    Code: {{$client->code}}<br>
                                    Raison social: {{$client->social_reason}}<br>
                                    N° RC: {{$client->rc}}<br>
                                    NIF: {{$client->nif}}<br>
                                </address>
                            </div>

                            <div class="col-sm-4 invoice-col">
                                <address>
                                    AI: {{$client->ai}}<br>
                                    NIS: {{$client->nis}}<br>
                                    Adresse: {{$client->address}}<br>
                                    Phone: {{$client->phone_number}}
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
                                        <th>facturisé à</th>
                                        <th>Total HT</th>
                                        <th>Total TTC</th>
                                        <th>Net à payer</th>
                                        <th>Date</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($client->invoice as $invoice)

                                        <tr>
                                            <td>{{$invoice->invoice_id}}</td>
                                            <td>{{$invoice->to}}</td>
                                            <td>{{$invoice->total_ht}} Da</td>
                                            <td>{{$invoice->total_ttc}} Da</td>
                                            <td>{{$invoice->total_to_pay}} Da</td>
                                            <td>{{ \Carbon\Carbon::parse($invoice->address,'GMT')->locale('fr')->isoFormat('MMM Do YYYY')}}</td>
                                            <td>
                                                <a href="{{asset(route("invoice.show",["id"=>$invoice->id]))}}" class="danger">
                                                    <i class="fas fa-eye" style="color: #1d2124"></i>
                                                </a>
                                            </td>
                                        </tr>

                                    @endforeach
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