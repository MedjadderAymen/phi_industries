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
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <!-- form start -->
                    <form role="form" method="post" action="{{route("client.update",["id"=>$client->id])}}">
                        {{csrf_field()}}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nom d'entreprise</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="company_name" value="{{$client->company_name}}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Numéro téléphone</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="phone_number" value="{{$client->phone_number}}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="email" value="{{$client->email}}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Adresse</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="address" value="{{$client->address}}" required>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-outline-dark btn-sm">Sauvgarder</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

    @endsection