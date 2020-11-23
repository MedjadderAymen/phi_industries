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
                                {{$quote->user->company}} <br>
                                {{$quote->user->description}} <br>
                                {{$quote->user->address}} <br>
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
                                Code: {{$quote->client->code}}<br>
                                Raison social: {{$quote->client->social_reason}}<br>
                                N° RC: {{$quote->client->rc}}<br>
                                NIF: {{$quote->client->nif}}<br>
                                AI: {{$quote->client->ai}}<br>
                                NIS: {{$quote->client->nis}}<br>
                                Adresse: {{$quote->client->address}}<br>
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6 invoice-col" style="float: right">
                            <strong>Devis</strong>
                            <address>
                                N° Devis: {{$quote->quote_id}}<br>
                                Date: {{\Carbon\Carbon::parse($quote->created_at,'GMT')->locale('fr')->isoFormat('MMM Do YYYY')}}<br>
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
                                @foreach($quote->medications as $medication)
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
                                        <td>{{$quote->total_ht}}</td>
                                    </tr>
                                    <tr>
                                        <th>Total PPC</th>
                                        <td>{{$quote->total_ppc}}</td>
                                    </tr>
                                    <tr>
                                        <th>TVA</th>
                                        <td>{{$quote->tva}}</td>
                                    </tr>
                                    <tr>
                                        <th>Total TTC</th>
                                        <td>{{$quote->total_ttc}}</td>
                                    </tr>
                                    <tr>
                                        <th>Remise client:</th>
                                        <td>{{$quote->discount}}%</td>
                                    </tr>
                                    <tr>
                                        <th>Net à payer:</th>
                                        <td>{{$quote->total_to_pay}}</td>
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
                                    **RC {{$quote->user->rc}} ** NIF
                                    {{$quote->user->nif}} ** AI
                                    {{$quote->user->ai}} ** NIS {{$quote->user->nis}} <br>
                                    NB: aucune réclamation ne sera acceptée après le délai de 7 jours de la date de livraison<br>
                                </address>
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-12">
                            <a href="{{route("quote.print",["id"=>$quote->id])}}" target="_blank" class="btn btn-success"><i class="fas fa-print"></i> Print</a>
                            <a href="{{route("quote.transfer",["id"=>$quote->id])}}" target="_blank" class="btn btn-info" onclick="event.preventDefault();
                                                     document.getElementById('transfer-form').submit();"><i class="fas fa-file-invoice"></i> Facturiser</a>
                            <form id="transfer-form" action="{{route("quote.transfer",["id"=>$quote->id])}}" method="POST" class="d-none">
                                @csrf
                            </form>
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