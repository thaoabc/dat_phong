<!DOCTYPE html>
<html>
    <head>
        <title>Live Search</title>
         <meta name="_token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
        <body>
            <div class="container">
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3>phong info </h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                            <input type="text" class="form-control" id="search" name="search"></input>
                            </div>
                            <div class="table-responsive">
                               <h3 align="center">Total data:<span id="total_records"></span></h3>
                            </div>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Product Name</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <script type="text/javascript">
            $(document).ready(function(){

                fetch_khach_hang_data();

                function fetch_khach_hang_data(query='')
            {
                $.ajax({
                    url: "{{route('search.action')}}",
                    method:'GET';
                    data: {
                        query:query
                    },
                    dataType:'json'
                    success:function(data){
                        $('tbody').html(data.table_data);
                        $('#total_records').text(data.total_data);
                    }
                });
                
            }
             $(document).on('keyup','#search',function(){
                var query = $(this).val();
                fetch_khach_hang_data(query);
            });
              });
           
        </script>
    </body>
</html>