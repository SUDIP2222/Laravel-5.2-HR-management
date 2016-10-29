@extends('adminlayouts.master')
@section('content')
    <div id="page-wrapper">

        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Leave Applications</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row" >
                <div class="col-lg-12" >
                    <a href="{{ url('admin/leaves/create') }}" class="btn btn-emp btn-info" role="button"> <i class="fa fa-plus"></i>
                        <b>New Leave Type</b></a>
                    <div/>
                </div>

                <br/>

                <div class="row">

                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th><span>EmployeeID</span></th>
                                    <th><span>Name</span></th>
                                    <th><span>Date</span></th>
                                    <th><span>Leave Type</span></th>
                                    <th><span>Reason</span></th>
                                    <th><span>Applied Date</span></th>
                                    <th class="text-center"><span>Status</span></th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        1239870
                                    </td>
                                    <td>Sadiqur Rahman</td>
                                    <td>30/7/2016</td>
                                    <td>personal</td>
                                    <td>Family</td>
                                    <td>22/7/2016</td>
                                    <td class="text-center">
                                        <span class="label label-default">active</span>
                                    </td>
                                    <td class="text-center" style="width: 20%;">
                                        <a href="#" class="table-link">
               <span class="fa-stack">
                   <i class="fa fa-square fa-stack-2x"></i>
                   <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
               </span>
                                        </a>
                                        <a href="#" class="table-link">
                 <span class="fa-stack">
                     <i class="fa fa-square fa-stack-2x"></i>
                     <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                 </span>
                                        </a>
                                        <a href="#" class="table-link danger">
                       <span class="fa-stack">
                           <i class="fa fa-square fa-stack-2x"></i>
                           <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                       </span>
                                        </a>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
@endsection