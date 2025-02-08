@extends('welcome')
@section('content')

<div id="main-content">
    <div class="block-header">
        <div class="row clearfix">

        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Add User</h2>
                        <ul class="header-dropdown dropdown dropdown-animated scale-left">
                            <li> <a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="pulse"><i class="icon-refresh"></i></a></li>
                            <li><a href="javascript:void(0);" class="full-screen"><i class="icon-size-fullscreen"></i></a></li>
                        </ul>
                    </div>
                    <form class="form-control" id="uploadForm" enctype="multipart/form-data">
                        @csrf
                        <input class="form-control" type="file" name="csv_file">
                        <button class="btn mt-3 mb-3 float-right" style="background-color: #002E63; color: white;" type="submit">Upload CSV</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var token = "{{ session('token') }}";
        $('#uploadForm').submit(function(e) {
            e.preventDefault();
            var headers = {
                'Authorization': 'Bearer ' + token
            };
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{env('APP_URL_API')}}api/user/storecsv",
                data: formData,
                headers: headers,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status == 1) {
                        toastr.info(response.message);
                    } else {
                        for (let i = 0; i < response.data.length; i++) {
                            toastr.warning(response.data[i].email, response.data[i].errors[0]);
                        }

                    }
                },
                error: function(xhr, status, error) {
                    toastr.warning('Error', error);
                }
            });
        });
    });
</script>
@endsection