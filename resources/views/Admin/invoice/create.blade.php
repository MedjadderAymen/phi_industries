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

                                                                <option value="{{$client->id}}">{{$client->name}}</option>

                                                                @endforeach
                                                        </select>
                                                    </div>
                                                    <!-- /.form-group -->
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <div class="row" id="my_row">
                                                <div class="col-md-12" id="my-button">
                                                    <div class="form-group">
                                                        <a type="button" class="btn btn-block btn-outline-primary btn-sm" onclick="ajouter()">
                                                            Ajouter
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" id="my_row">
                                                <div class="col-md-6" id="my-button">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Remise :</label>
                                                        <input type="number" class="form-control" id="exampleInputEmail1" required placeholder="Remise à">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>



        ////////////////////////js//////////////////////////////////////

        var medications;
        jQuery .get( "/medication/get", function( data ) {
            medications=data;
        }).done(function(){
                $.each(medications, function (index,medication) {
                    $(".options").append("<option value=\""+medication.id+"\">"+medication.name+"</option>")
                })
            }

        );


        $("#my_row").prepend("    <div class=\"col-md-6\"> \n" +
            "        <div class=\"form-group options-div\">\n" +
            "            <label>Médicament :</label>\n" +
            "            <select class=\"form-control select2bs4 options\" style=\"width: 100%;\">\n" +
            "                \n" +
            "            </select>\n" +
            "        </div>\n" +
            "    </div>\n" +
            "    <div class=\"col-md-6\">\n" +
            "        <div class=\"form-group\">\n" +
            "            <label for=\"exampleInputEmail1\">Quantité :</label>\n" +
            "            <input type=\"number\" class=\"form-control\" id=\"exampleInputEmail1\" required placeholder=\"Entrer quantité\">\n" +
            "        </div>\n" +
            "    </div>");


        function ajouter() {
            $("#my-button").before("<div class=\"col-md-6\"> \n" +
                "        <div class=\"form-group options-div\">\n" +
                "            <label>Médicament :</label>\n" +
                "            <select class=\"form-control select2bs4 options\" style=\"width: 100%;\">\n" +
                "                \n" +
                "            </select>\n" +
                "        </div>\n" +
                "    </div>\n" +
                "    <div class=\"col-md-6\">\n" +
                "        <div class=\"form-group\">\n" +
                "            <label for=\"exampleInputEmail1\">Quantité :</label>\n" +
                "            <input type=\"number\" class=\"form-control\" id=\"exampleInputEmail1\" required placeholder=\"Entrer quantité\">\n" +
                "        </div>\n" +
                "    </div>")
            $.each(medications, function (index,medication) {
                $(".options-div").last().children(".options").append("<option value=\""+medication.id+"\">"+medication.name+"</option>")
            })
        }
    </script>

@endsection()