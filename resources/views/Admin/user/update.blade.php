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
                            <h3 class="card-title">Modifier profil</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- general form elements -->
                        <div >
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="post" action="{{route('user.update',["id"=>$user->id])}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <!-- SELECT2 EXAMPLE -->
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nom entreprise</label>
                                                <input type="text" name="company" class="form-control" value="{{$user->company}}" id="exampleInputEmail1" placeholder="Entrer nom" required>
                                            </div>
                                            <!-- /.form-group -->
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Déscription :</label>
                                                <input type="text" name="description" class="form-control" value="{{$user->description}}" id="exampleInputEmail1" required placeholder="Entrer déscription">
                                            </div>
                                            <!-- /.form-group -->
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">NIF :</label>
                                                <input type="text" name="nif" class="form-control" id="exampleInputEmail1" value="{{$user->nif}}" required placeholder="Entrer NIF">
                                            </div>
                                            <!-- /.form-group -->
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">RC :</label>
                                                <input type="text" name="rc" class="form-control" id="exampleInputEmail1" value="{{$user->rc}}" required placeholder="Entrer RC">
                                            </div>
                                            <!-- /.form-group -->
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">AI :</label>
                                                <input type="text" name="ai" class="form-control" id="exampleInputEmail1" value="{{$user->ai}}" required placeholder="Entrer AI">
                                            </div>
                                            <!-- /.form-group -->
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">NIS :</label>
                                                <input type="text" name="nis" class="form-control" id="exampleInputEmail1" value="{{$user->nis}}" required placeholder="Entrer NIS">
                                            </div>
                                            <!-- /.form-group -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email :</label>
                                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="{{$user->email}}" required placeholder="Entrer email">
                                            </div>
                                            <!-- /.form-group -->
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Mot de passe :</label>
                                                <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="Changer mot de passe?">
                                            </div>
                                            <!-- /.form-group -->
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Adresse :</label>
                                                <input type="text" name="address" class="form-control" id="exampleInputEmail1" value="{{$user->address}}" required placeholder="Entrer adresse">
                                            </div>
                                            <!-- /.form-group -->
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Numéro télephone :</label>
                                                <input type="number" name="phone_number" class="form-control" id="exampleInputEmail1" value="{{$user->phone_number}}" required placeholder="Entrer numéro téléphone">
                                            </div>
                                            <!-- /.form-group -->
                                        </div>
                                        <!-- /.col -->
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