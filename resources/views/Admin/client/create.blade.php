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
                            <h3 class="card-title">Ajouter nouveau client</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- general form elements -->
                        <div >
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="post" action="{{route('client.store')}}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nom entreprise</label>
                                        <input type="text" required name="company_name" class="form-control" id="exampleInputEmail1" placeholder="Nom entreprise">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Numéro téléphone</label>
                                        <input type="number" required name="phone_number" class="form-control" id="exampleInputPassword1" placeholder="Numéro téléphone">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Email</label>
                                        <input type="email" required name="email" class="form-control" id="exampleInputPassword1" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Adresse</label>
                                        <input type="text" name="address" class="form-control" id="exampleFormControlFile1" placeholder="Adresse" required>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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