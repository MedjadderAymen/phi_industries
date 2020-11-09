<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Invoice Print</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset("plugins/fontawesome-free/css/all.min.css")}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset("dist/css/adminlte.min.css")}}">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
<div class="wrapper">
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
            <br>
            <br>
            <br>
            <br>
            <br>
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

            <br>
            <br>
            <br>
            <br>
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
</div>
<!-- ./wrapper -->

<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
</body>
</html>
