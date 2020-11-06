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
                            <h3 class="card-title">{{$medication->name}}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- Post -->
                            <div class="post">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg" alt="User Image">
                                    <span class="username">
                          <a href="#">{{$medication->user->name}}</a>
                          <a href="{{route("delete",["id"=>$medication->id])}}" class="float-right btn-tool"><i class="fas fa-trash" style="color: #a71d2a"></i></a>
                        </span>
                                    <span class="description">{{$medication->created_at}}</span>
                                </div>
                                <!-- /.user-block -->
                                <div class="row mb-3">
                                    <div class="col-sm-6">
                                        <img class="img-fluid" src="{{$medication->image}}" alt="Photo">
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-6">

                                        <!-- general form elements -->
                                        <div class="card card-primary">
                                            <!-- /.card-header -->
                                            <!-- form start -->
                                            <form role="form" method="post" action="{{route("update",["id"=>$medication->id])}}">
                                                {{csrf_field()}}
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Nom</label>
                                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="nom" required name="name" value="{{$medication->name}} ">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Déscription</label>
                                                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Déscription" name="description" value="{{$medication->description}} " required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Quantité</label>
                                                        <input type="number" class="form-control" id="exampleInputPassword1" placeholder="{{$medication->quantity}} boites dans le stock" name="quantity">
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->

                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.card -->

                                        <!-- /.row -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.post -->
                        </div>
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