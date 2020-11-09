@extends('Admin.admin_template')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="callout callout-info">
                    <h5><i class="fas fa-info"></i> Note:</h5>
                    Cette page a été améliorée pour l’impression. Cliquez sur le bouton d’impression au bas de la facture pour imprimer.
                </div>


                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <small class="float-right">Date: {{ \Carbon\Carbon::parse($invoice->address,'GMT')->locale('fr')->isoFormat('MMM Do YYYY')}}</small>
                                <b>Facture #{{$invoice->invoice_id}}</b>
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            De :
                            <address>
                                <strong>PhiIndustrie, Inc.</strong><br>
                                795 Djdour Ave, Suite 600<br>
                                ElKhroub, Cons 25026<br>
                                Phone: (213) 698 281 556<br>
                                Email: admin@phiindustrie.com
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            Pour :
                            <address>
                                <strong>{{$invoice->client->company_name}}</strong><br>
                                {{$invoice->client->address}}<br>
                                Phone: {{$invoice->client->phone_number}}<br>
                                Email: {{$invoice->client->email}}
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            Par :
                            <address>
                                <strong>{{$invoice->to}}</strong><br>
                                Phone: {{$invoice->phone_number}}<br>
                                Email: {{$invoice->email}}
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
                                    <th>Quantité</th>
                                    <th>Produit</th>
                                    <th>Prix Unitaire</th>
                                    <th>Prix total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>50</td>
                                    <td>Grown</td>
                                    <td>520 Da</td>
                                    <td>2600Da</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-6">

                        </div>
                        <!-- /.col -->
                        <div class="col-6">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="width:50%">SousTotal:</th>
                                        <td>58600.00 Da</td>
                                    </tr>
                                    <tr>
                                        <th>Tva (14%)</th>
                                        <td>65000.00 Da</td>
                                    </tr>
                                    <tr>
                                        <th>Remise :</th>
                                        <td>2%</td>
                                    </tr>
                                    <tr>
                                        <th>Total:</th>
                                        <td>62500.00 Da</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-12">
                            <a href="{{route("invoice.print",["id"=>$invoice->id])}}" target="_blank" class="btn btn-success"><i class="fas fa-print"></i> Print</a>
                        </div>
                    </div>
                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection()