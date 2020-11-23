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
                    <!-- info row -->
                    <div class="row invoice-title">
                        <div class="col-sm-12 text-center">
                            <address>
                                {{$invoice->user->company}} <br>
                                {{$invoice->user->description}} <br>
                                {{$invoice->user->address}} <br>
                            </address>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <!-- info row -->
                    <br>
                    <div class="row invoice-info" >
                        <div class="col-sm-6 invoice-col">
                            <address>
                                Code: {{$invoice->client->code}}<br>
                                Raison social: {{$invoice->client->social_reason}}<br>
                                N° RC: {{$invoice->client->rc}}<br>
                                NIF: {{$invoice->client->nif}}<br>
                                AI: {{$invoice->client->ai}}<br>
                                NIS: {{$invoice->client->nis}}<br>
                                Adresse: {{$invoice->client->address}}<br>
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6 invoice-col" style="float: right">
                            <strong>Facture</strong>
                            <address>
                                N° Facture: {{$invoice->invoice_id}}<br>
                                Date: {{\Carbon\Carbon::parse($invoice->created_at,'GMT')->locale('fr')->isoFormat('MMM Do YYYY')}}<br>
                                Commande: <br>
                                Paiement: <br>
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

                    <div class="row">
                        <div class="col-6">
                            <address>arreter la présente facture à la somme de:</address>
                            <strong></strong>
                        </div>
                    </div>
                    <br>

                    <div class="blockquote-footer">
                        <div class="row invoice-title">
                            <div class="col-sm-12 text-center">
                                <address>
                                    **RC {{$invoice->user->rc}} ** NIF
                                    {{$invoice->user->nif}} ** AI
                                    {{$invoice->user->ai}} ** NIS {{$invoice->user->nis}} <br>
                                    NB: aucune réclamation ne sera acceptée après le délai de 7 jours de la date de livraison<br>
                                </address>
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>

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