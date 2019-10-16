@extends('layouts.fixed')

@section('title','Attendance | Monthly Report')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Monthly Attendance Report </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Attendance </a></li>
                        <li class="breadcrumb-item active">Monthly Report</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- ***/Monthly Report page inner Content Start-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card" style="padding: 15px 0px;">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">User*</label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <select id="inputState" class="form-control" style="height: 35px !important;">
                                                    <option selected>Student</option>
                                                    <option>Teacher</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Class*</label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <select id="inputState" class="form-control" style="height: 35px !important;">
                                                    <option selected>Nursery-Shapla</option>
                                                    <option>Nursery-Beli</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Month*</label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <select id="inputState" class="form-control" style="height: 35px !important;">
                                                    <option selected>January</option>
                                                    <option>February</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <ul style="list-style: none">
                                            <li> <i class="fas fa-circle" style="color: #008000"></i> <span> P - Present </span></li>
                                            <li> <i class="fas fa-circle" style="color: #00bfff"></i> <span> L - Late </span></li>
                                            <li> <i class="fas fa-circle" style="color: #ffa500"></i> <span> R - Left without completing the day </span></li>
                                            <li> <i class="fas fa-circle" style="color: #ff0000"></i> <span> A - Absent </span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">Month: Month Name  </div>
                                <div class="col-md-3">Year: 2109</div>
                                <div class="col-md-3">
                                    <div style="text-align: center">
                                        <button type="button" class="btn btn-success" > <i class="fas fa-cogs"></i> Generate</button>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-info  btn-sm" style="float: right; padding: .25rem 0.9rem;"> <i class="fas fa-cloud-download-alt"></i></button>
                                </div>
                            </div>
                        </div>


                        <div class="card-body">
                            <div class="col-md-12">
                                <table id="example2" class="table table-responsive table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Roll</th>
                                        <th>Student Name</th>
                                        <th>1</th>
                                        <th>2</th>
                                        <th>3</th>
                                        <th>4</th>
                                        <th>5</th>
                                        <th>6</th>
                                        <th>7</th>
                                        <th>8</th>
                                        <th>9</th>
                                        <th>10</th>
                                        <th>11</th>
                                        <th>12</th>
                                        <th>13</th>
                                        <th>14</th>
                                        <th>15</th>
                                        <th>16</th>
                                        <th>17</th>
                                        <th>18</th>
                                        <th>19</th>
                                        <th>20</th>
                                        <th>21</th>
                                        <th>22</th>
                                        <th>23</th>
                                        <th>24</th>
                                        <th>25</th>
                                        <th>26</th>
                                        <th>27</th>
                                        <th>28</th>
                                        <th>29</th>
                                        <th>30</th>
                                        <th>31</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>robin</td>
                                        <td>P</td>
                                        <td>L</td>
                                        <td>R</td>
                                        <td>P</td>
                                        <td>P</td>
                                        <td>L</td>
                                        <td>A</td>
                                        <td>P</td>
                                        <td>L</td>
                                        <td>P</td>
                                        <td>P</td>
                                        <td>L</td>
                                        <td>R</td>
                                        <td>P</td>
                                        <td>P</td>
                                        <td>L</td>
                                        <td>R</td>
                                        <td>A</td>
                                        <td>P</td>
                                        <td>R</td>
                                        <td>P</td>
                                        <td>P</td>
                                        <td>P</td>
                                        <td>P</td>
                                        <td>R</td>
                                        <td>A</td>
                                        <td>R</td>
                                        <td>P</td>
                                        <td>P</td>
                                        <td>R</td>
                                        <td>A</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                </div>
            </div>
        </div>
    </section>



@stop

