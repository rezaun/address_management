@extends('backend.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Upazila</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Upazila</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->

                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-12">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card">
                            <div class="card-header">
                                <h3>

                                    @if (isset($editData))
                                        Edit Upazila
                                    @else
                                        Add Upazila
                                    @endif
                                    <a class="btn btn-success float-right" href="{{route('upazilas.view')}}"><i class="fa fa-list"> Upazila List</i></a>
                                </h3>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <form method="POST" action="{{(@$editData)?route('upazilas.update', $editData->id):route('upazilas.store')}}">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name">Division Name</label>
                                            <select type="text" name="division_id" class="form-control" id="division_id">
                                                <option value="">Select Division</option>
                                                @foreach($divisions as $division)
                                                    <option value="{{$division->id}}" {{(@$editData->division_id==$division->id)?"selected":""}}>{{$division->name}}</option>
                                                @endforeach
                                            </select>
                                            <small style="color:red;">{{($errors->has('name'))?($errors->first('name')):''}}</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">District Name</label>
                                            <select name="district_id" class="form-control" id="district_id">
                                                <option value="">Select District</option>
                                            </select>
                                            <small style="color:red;">{{($errors->has('name'))?($errors->first('name')):''}}</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Upazila Name</label>
                                            <input type="text" name="name" class="form-control" id="name" value="{{ @$editData->name }}" placeholder="Enter Upazila Name" >
                                            <small style="color:red;">{{($errors->has('name'))?($errors->first('name')):''}}</small>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">{{(@$editData)?"Update":"Submit"}}</button>
                                    </div>
                                </form>
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </section>
                    <!-- /.Left col -->
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script>
        $(function () {
            $(document).on('change','#division_id',function () {
                var division_id = $(this).val();
                $.ajax({
                    type:"GET",
                    url:"{{route('default.get-district')}}",
                    data:{division_id:division_id},
                    success:function (data) {
                        var html = '<option value="">Select District</option>';
                        $.each(data,function(key,v){
                            html +='<option value="'+v.id+'">'+v.name+'</option>'
                        });
                        $('#district_id').html(html);
                        var district_id = "{{@$editData->district_id}}";
                        if(district_id !=''){
                            $('#district_id').val(district_id);
                        }
                    }
                })
            })
        })
    </script>
    <script type="text/javascript">
        $(function () {
            var division_id = "{{@$editData->division_id}}";
            if (division_id){
                $('#division_id').val(division_id).trigger('change');
            }
        })
    </script>
@endsection
