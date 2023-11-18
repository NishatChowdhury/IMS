@extends('layouts.front_gold')

@section('title','Online Admission')

@section('content')

    <div class="py-3 bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-white">
                    <h2 style='color:white'>Online Admission</h2>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end bg-transparent">

                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="padding-y-100 border-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">

                    <div class="row col-12 justify-content-center mx-auto p-4" style="border: 4px dotted yellowgreen;">
                        <div class="table-responsive my-4">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col" class="font-weight-semiBold">Name</th>
                                    <th class="text-center">Expire Date</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>One </td>
                                    <td class="text-center">
                                        From <b>01 April 2022</b> To
                                        <b>21 October 2022</b>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-danger">Expired</span>

                                    </td>
                                </tr>
                                <tr>
                                    <td>One </td>
                                    <td class="text-center">
                                        From <b>09 August 2022</b> To
                                        <b>31 August 2022</b>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-danger">Expired</span>

                                    </td>
                                </tr>
                                <tr>
                                    <td>Five </td>
                                    <td class="text-center">
                                        From <b>04 November 2022</b> To
                                        <b>10 November 2022</b>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-danger">Expired</span>

                                    </td>
                                </tr>
                                <tr>
                                    <td>Eleven </td>
                                    <td class="text-center">
                                        From <b>07 November 2022</b> To
                                        <b>31 December 2022</b>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-danger">Expired</span>

                                    </td>
                                </tr>
                                <tr>
                                    <td>Nine </td>
                                    <td class="text-center">
                                        From <b>07 November 2022</b> To
                                        <b>31 December 2022</b>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-danger">Expired</span>

                                    </td>
                                </tr>
                                <tr>
                                    <td>Ten </td>
                                    <td class="text-center">
                                        From <b>04 November 2022</b> To
                                        <b>08 November 2022</b>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-danger">Expired</span>

                                    </td>
                                </tr>
                                <tr>
                                    <td>Ten </td>
                                    <td class="text-center">
                                        From <b>16 November 2022</b> To
                                        <b>31 March 2023</b>
                                    </td>
                                    <td class="text-center">
                                        <a href="https://demo.webpointbd.com/online-apply/20"
                                           class="btn btn-link bg-warning">Apply Now</a>

                                    </td>
                                </tr>
                                <tr>
                                    <td>Twelve </td>
                                    <td class="text-center">
                                        From <b>08 December 2022</b> To
                                        <b>20 December 2022</b>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-danger">Expired</span>

                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- <a href="#" class="btn btn-primary w-25" data-toggle="modal" data-target="myModal"
                            data-whatever="@mdo">View Application</a> -->


                        <!-- <button type="button" class="btn   btn-outline-warning " data-bs-toggle="modal" data-bs-target="#myModal">

                              </button> -->
                        <button type="button" class="btn   btn-outline-warning" data-toggle="modal"
                                data-target="#ModalExample">
                            <a href="#">
                                Open Application
                            </a>
                        </button>

                    </div>
                </div>
            </div> <!-- END row-->
        </div> <!-- END container-->
    </section>


    <div id="ModalExample" class="modal ">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Download Your Application Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="downloadForm" method="get">
                        <input type="hidden" name="_token" value="ADVTxT97GxjYWl2HBeMT3YY15tiFKZo72nDuc1x0">
                        <div class="modal-body row">
                            <div class="form-group col-12">
                                <label for="">Application ID</label>
                                <input type="text" id="applcationID" name="id" class="form-control"
                                       placeholder="Enter Application ID">
                                <hr>
                                <button type="submit" class="btn btn-primary btn-sm">Download</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
@stop

@section('script')
<script>

    $('#applcationID').keyup(function(){
        let id = $('#applcationID').val();
         let action = "{{ url('download-school-pdf') }}/"+id;
         $('#downloadForm').attr('action', action);
    });


</script>
@endsection