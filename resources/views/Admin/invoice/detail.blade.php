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
                                <small class="float-right">Date: {{ \Carbon\Carbon::parse($invoice->created_at,'GMT')->locale('fr')->isoFormat('MMM Do YYYY')}}</small>
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
                                ElKhroub, Cons 25026<br>
                                Phone: (213) 698 281 556<br>
                                Email: admin@phiindustrie.com<br>
                                <strong>Résponsable :</strong> {{$invoice->user->name}}
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
                                    <th>Produit</th>
                                    <th>TVA</th>
                                    <th>Quantité</th>
                                    <th>Prix Unitaire</th>
                                    <th>Toatal HT</th>
                                    <th>PPC</th>
                                    <th>N° Lot</th>
                                    <th>SHP</th>
                                    <th>DDP</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($invoice->medications as $medication)
                                <tr>
                                    <td>{{$medication->name}}</td>
                                    <td>19%</td>
                                    <td>{{$medication->pivot->quantity}}</td>
                                    <td>{{$medication->price}}</td>
                                    <td>{{$medication->pivot->total_price}}</td>
                                    <td>{{$medication->ppc}}</td>
                                    <td>{{$medication->plot}}</td>
                                    <td>{{$medication->shp}}</td>
                                    <td>{{$medication->ddp}}</td>
                                </tr>
                                    @endforeach
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
                                        <th style="width:50%">Total HT</th>
                                        <td>{{$invoice->total_ht}}</td>
                                    </tr>
                                    <tr>
                                        <th>Total PPC</th>
                                        <td>{{$invoice->total_ppc}}</td>
                                    </tr>
                                    <tr>
                                        <th>TVA</th>
                                        <td>{{$invoice->tva}}</td>
                                    </tr>
                                    <tr>
                                        <th>Total TTC</th>
                                        <td>{{$invoice->total_ttc}}</td>
                                    </tr>
                                    <tr>
                                        <th>Remise client:</th>
                                        <td>{{$invoice->discount}}%</td>
                                    </tr>
                                    <tr>
                                        <th>Net à payer:</th>
                                        <td>{{$invoice->total_to_pay}}</td>
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