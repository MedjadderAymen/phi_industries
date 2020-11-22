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
                            <h3 class="card-title">Ajouter nouveau médicament</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- general form elements -->
                        <div >
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="post" action="{{route('store')}}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nom</label>
                                        <input type="text" required name="name" class="form-control" id="exampleInputEmail1" placeholder="nom médicament">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Déscription</label>
                                        <input type="text" required name="description" class="form-control" id="exampleInputPassword1" placeholder="Déscription">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Prix</label>
                                        <input type="number" step="0.001" required name="price" class="form-control" id="exampleInputPassword1" placeholder="Prix">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Lot</label>
                                        <input type="number" required name="plot" class="form-control" id="exampleInputPassword1" placeholder="Lot">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Quantité</label>
                                        <input type="number" required name="quantity" class="form-control" id="exampleInputPassword1" placeholder="Quantité">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Date de production</label>
                                        <input type="date" required name="ddp" class="form-control" id="exampleInputPassword1" placeholder="Date de production">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Image</label>
                                        <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
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