@extends('Admin.admin_template')

@section('content')

    <section class="content-header">
        <div class="container-fluid">

        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Ajouter nouvelle facture</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- general form elements -->
                        <div >
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="post" action="{{route('store')}}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <!-- SELECT2 EXAMPLE -->
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Au nom de :</label>
                                                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Entrer nom" required>
                                                    </div>
                                                    <!-- /.form-group -->
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Numéro téléphone :</label>
                                                        <input type="email" class="form-control" id="exampleInputEmail1" required placeholder="Entrer numéro téléphone">
                                                    </div>
                                                    <!-- /.form-group -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Adresse email :</label>
                                                        <input type="email" class="form-control" id="exampleInputEmail1" required placeholder="Entrer email">
                                                    </div>
                                                    <!-- /.form-group -->
                                                    <div class="form-group">
                                                        <label>Entreprise :</label>
                                                        <select class="form-control select2bs4" style="width: 100%;">

                                                            @foreach($clients as $client)

                                                                <option value="{{$client->id}}">{{$client->company_name}}</option>

                                                                @endforeach
                                                        </select>
                                                    </div>
                                                    <!-- /.form-group -->
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6"> {{--tet3ewed mena --}}
                                                    <div class="form-group">
                                                        <label>Médicament :</label>
                                                        <select class="form-control select2bs4" style="width: 100%;">

                                                            @foreach($medications as $medication)

                                                                <option value="{{$medication->id}}">{{$medication->name}}</option>

                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Quantité :</label>
                                                        <input type="number" class="form-control" id="exampleInputEmail1" required placeholder="Entrer quantité">
                                                    </div>
                                                </div>  {{--7eta hna--}}

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <a type="button" class="btn btn-block btn-outline-primary btn-sm" href="{{route('invoice.create')}}">
                                                            Ajouter {{--ki neteka 3la hedi yt3ewdou li lfoug --}}
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- /.row -->
                                        </div>
                                        <!-- /.card-body -->
                                    <!-- /.card -->
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary float-lg-right">Créer</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
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