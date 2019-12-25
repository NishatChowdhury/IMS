@extends('layouts.fixed')

@section('title','Exam Mgmt |Tabulation Sheet')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tabulation Sheet</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Exam Mgmt</a></li>
                        <li class="breadcrumb-item active">Tabulation Sheet</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                      <div class="row">
                          <div class="col-md-12">
                              <div class="scl-dec" style="padding-left: 300px;">
                                  <div class="logo" style="float: left">
                                      <img src="{{ asset('dist/img/user1-128x128.jpg') }}" alt="logo">
                                  </div>
                                  <div class="scl-name" style="float: left; padding-left:50px; padding-top: 20px; text-align: center;">
                                     <h2>Example School Name</h2>
                                      <h4>Result Sheet of Yearly</h4>
                                      <hr>
                                  </div>
                              </div>
                          </div>
                      </div>
                        <br>
                      <div class="row">
                         <div class="col-md-12">
                            <div class="head" style="text-align: center;">
                                <h3>Class Nursery(Shapla)</h3>
                            </div>
                             <div class="card-body">
                                 <table id="example2" class="table table-bordered table-hover">
                                     <thead>
                                     <tr>
                                         <th>Student ID</th>
                                         <th>Student Name</th>
                                         <th>Roll No</th>
                                         <th>Bangla</th>
                                         <th>English</th>
                                         <th>Mathematics</th>
                                         <th>Religion</th>
                                         <th>Drawing</th>
                                         <th>Total Mark</th>
                                         <th>GPA</th>
                                         <th>Rank</th>
                                     </tr>
                                     </thead>
                                     <tbody>
                                     <tr>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                     </tr>
                                     </tbody>
                                 </table>
                             </div>
                         </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@stop