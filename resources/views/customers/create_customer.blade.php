@extends('index_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>


        <div class="container-full">

            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Add Customer </h4>



                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="post" action="{{ route('customers.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">


                                            <div class="row"> <!--1st row-->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Fisrt Name<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="Firstname"   class="form-control" required="" >
                                                        </div>
                                                    </div>
                                                </div> <!--End Col md 4-->


                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Last Name<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="Lastname"   class="form-control" required="" >
                                                        </div>
                                                    </div>
                                                </div> <!--End Col md 4-->



                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Date Of Birth<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="date" name="dob"   class="form-control" required="" >
                                                        </div>
                                                    </div>
                                                </div> <!--End Col md 4-->

                                            </div> <!--End 1st Row-->

                                            <div class="row"> <!--2nd row-->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Phone Number<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="phone"   class="form-control" required="" >
                                                            @error('phone')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div> <!--End Col md 4-->


                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Email<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="email" class="form-control"  required="" >
                                                            @error('email')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div> <!--End Col md 4-->





                                            </div> <!--End 2ndRow-->



                                            <div class="row"> <!--3rd row-->







                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <h5>Bank Account<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="bankaccount"   class="form-control" required="" >
                                                            @error('bankaccount')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>







                                            <div class="text-xs-right">
                                                <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">
                                            </div>





                                        </DIV>


                                    </div>



                                </form>

                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </section>





        </div>





@endsection
