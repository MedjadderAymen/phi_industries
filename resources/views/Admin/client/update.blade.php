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
                                <label for="exampleInputEmail1">Nom entreprise</label>
                                <input type="text" required name="company_name" value="{{$client->company_name}}" class="form-control" id="exampleInputEmail1" placeholder="Nom entreprise">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Code</label>
                                <input type="text" required name="code" value="{{$client->code}}" class="form-control" id="exampleInputPassword1" placeholder="Code">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Numéro téléphone</label>
                                <input type="number" required name="phone_number" value="{{$client->phone_number}}" class="form-control" id="exampleInputPassword1" placeholder="Numéro téléphone">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Adresse</label>
                                <input type="text" name="address" value="{{$client->address}}" class="form-control" id="exampleFormControlFile1" placeholder="Adresse" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlFile1">Raison social</label>
                                <input type="text" name="social_reason" value="{{$client->social_reason}}" class="form-control" id="exampleFormControlFile1" placeholder="Raison social" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlFile1">N° RC</label>
                                <input type="text" name="rc" class="form-control" value="{{$client->rc}}" id="exampleFormControlFile1" placeholder="N° RC" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlFile1">NIF</label>
                                <input type="text" name="nif" class="form-control" value="{{$client->nif}}" id="exampleFormControlFile1" placeholder="NIF" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlFile1">AI</label>
                                <input type="text" name="ai" class="form-control" value="{{$client->ai}}" id="exampleFormControlFile1" placeholder="AI" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlFile1">NIS</label>
                                <input type="text" name="nis" class="form-control" value="{{$client->nis}}" id="exampleFormControlFile1" placeholder="NIS" required>
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