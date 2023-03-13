@extends('layouts.fixed')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/testimonial.css') }}">
  <!-- font awesome cdn -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans&family=Montserrat&family=Satisfy&display=swap" rel="stylesheet"> 
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans&family=Montserrat&family=Satisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

@stop

@section('content')


    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Testimonial</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Student</a></li>
                        <li class="breadcrumb-item active">Design Student ID</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

   <!-- /.content-header -->
 <section class="content">
        <div class="container-fluid" id="fo">
            <div class="row " >
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card" style="margin: 10px;">
                                <!-- form start -->
                                <form  method="GET" action="">
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="">Student ID</label>
                                                <div class="input-group">
                                                    <input class="form-control" placeholder="Student ID" name="studentId" type="text">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label for="">Name</label>
                                                <div class="input-group">
                                                    <input class="form-control" placeholder="Name" name="name" type="text">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label for="">Class</label>
                                                <div class="input-group">
                                                    <select class="form-control" name="class_id"><option selected="selected" value="">Select Class</option><option value="1">Eleven</option><option value="2">Tweleve</option></select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label for="">Section</label>
                                                <div class="input-group">
                                                    <select class="form-control" name="section_id"><option selected="selected" value="">Select Section</option></select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label for="">Group</label>
                                                <div class="input-group">
                                                    <select class="form-control" name="group_id"><option selected="selected" value="">Select Group</option><option value="1">Science</option><option value="2">Business Study</option><option value="3">Humanities</option></select>
                                                </div>
                                            </div>

                                            <div class="col-1" style="padding-top: 32px;">
                                                <div class="input-group">
                                                    <button style="padding: 6px 20px;" type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- navbar  -->
    
    <div class="container-fluid ">
 
        <div class="back m-0 p-0 ">
            <div class="nomoneny">
      <!-- -----navv -->
      <div class="d-flex bg-dark  mt-5 ">
  <!-- <div class="p-2">Flex item</div> -->
        <div class="p-2 ml-4">EIIN: 138418</div>
        <div class="ml-auto p-2 mr-4">
        <i>Office Copy</i></div>
         </div>
        <!-- --- -->
        
        <div class="stud ">
      <div class="navbaar  mt-3 ml-2">
                <div class="navv-logo col-2 ">
                    <img style="height: 75px; width: 75px;" class=" img d-block m-auto border img-fluid rounded" src="{{ asset('assets/img/testimonial/p.jpeg') }}" alt="logo">
                </div>
                <div class="nave-heading col-8 mt-1">
                    <h1 class="mt-3 mb-0">Oxford Modern School & College</h1>
                </div>
                <div ><button onclick="window.print()" id="printBtn" class="btn btn-success btn-sm shadow mx-auto col-auto">
                    print
                </button></div>
            </div>
      </div>
            <div class="m-0 p-0">
                <div class=" d-flex justify-content-center mt-1 ">
                <p class="m-0">Campus: 1 # Motierpool, Pathantuli Road, Doublemooring,Chittagong.</p>
                </div>
                <div  style="margin-bottom: 0px;" class="cam d-flex justify-content-center m-0">
                    <p class="m-0">Phone: 031-2518963</p>
                </div>
                <div  style="margin-bottom: 0px;" class="cam d-flex justify-content-center m-0">
                <p class="m-0">Campus: 2 # Boropool, Halishahar, Chittagong. Phone: 031-713491</p>
                </div>
                <div style="margin-top: 0px;" class="mac d-flex justify-content-center m-0">
                    <p>www.oxfordctg.com</p>

                </div>
            </div>
            </div>
             

            <div style="position:relative;display:block; height:10px; width: 60px;">
    <div class="status d-flex">
        <div class="inner-point">
            <div class="inner nowrap">
                <span>Money Receipt</span>
            </div>
        </div>
    </div>
</div>
          
     <div class="SL d-flex justify-content-center mt-0">
                <div class="col-4 "> 
                <label for="inputPassword4" class="form-label">SL. No :  1310</label>
                <!-- <input type="text" id="name" class="form-control-inline " placeholder=" SL.  1310" /> -->
                </div>
                <div class=" col-4 mt-1">
                    <!-- <b class="tes"> Transfer Certificate</b> -->
                   </div>
                   <div class="col-4 mt-1">
                <p class="ml-0 mt-0 text-left"><b>Date :1/12/2022</b> </p>
                       </div>
    
   
                     
<!-- inside section -->
<div class="container">
    
<div class="row gutters">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="card">
				<div class="card-body p-0">
					<div class="invoice-container">
						<div class="invoice-body">
							<!-- Row start -->
							<div class="row gutters">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="table-responsive">
										<table class="table custom-table m-0">
											<thead>
												<tr>
													<th>Class</th>
													<th>Student ID</th>
													<th>Term</th>
													<th>Sub Total</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>
														Exam Fee 
														
													</td>
													<td>50000981</td>
													<td>9</td>
													<td>৳5000.00</td>
												</tr>
												<tr>
													<td>
														Sports Fee
														
													</td>
													<td>50000126</td>
													<td>5</td>
													<td>৳100.00</td>
												</tr>
												<tr>
													<td>
														Monthly Fee
														
													</td>
													<td>50000821</td>
													<td>6</td>
													<td>৳49.99</td>
												</tr>
												<tr>
													<td>&nbsp;</td>
													<td colspan="2">
														<p>
															Subtotal<br>
															Discount&amp;<br>
															Tax<br>
														</p>
														<h5 class="text-success"><strong>Grand Total</strong></h5>
													</td>			
													<td>
														<p>
                                                        ৳5000.00<br>
                                                        ৳100.00<br>
                                                        ৳49.00<br>
														</p>
														<h5 class="text-success"><strong>৳5150.99</strong></h5>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- Row end -->
						</div>
						<div class="invoice-footer d-flex justify-content-between">
                        <div >
            <p class="m-4" >  <b><hr class="bg-dark m-0">  Signature of Student/Parenty</b></p>
            </div> 
                            
            <div >
            <p class="m-4" >  <b><hr class="bg-dark m-0"> Receiver Signature</b></p>
            </div> 
      
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    </div>
</div>

           
        </div> 
       
    </div>
    

    <!-- navbar -->
    <div class="container-fluid ">
 
 <div class="back m-0 p-0 ">
     <div>

 <!-- --- -->
     </div>
     <div class="nomoneny">
        <!-- -----navv -->
<div class="d-flex bg-dark  mt-5 ">
<!-- <div class="p-2">Flex item</div> -->
 <div class="p-2 ml-4">EIIN: 138418</div>
 <div class="ml-auto p-2 mr-4">
 <i>Student Copy</i></div>
  </div>
     <div class="stud ">
      <div class="navbaar  mt-3 ml-2">
                <div class="navv-logo col-2 ">
                    <img style="height: 75px; width: 75px;" class=" img d-block m-auto border img-fluid rounded" src="{{ asset('assets/img/testimonial/p.jpeg') }}" alt="logo">
                </div>
                <div class="nave-heading col-8 mt-1">
                    <h1 class="mt-3 mb-0">Oxford Modern School & College</h1>
                </div>
                <div ><button onclick="window.print()" id="printBtn" class="btn btn-success btn-sm shadow mx-auto col-auto">
                    print
                </button></div>
            </div>
      </div>
    
     <div class="m-0 p-0">
         <div class=" d-flex justify-content-center mt-1 ml-5 mr-0">
         <p class="m-0">Campus: 1 # Motierpool, Pathantuli Road, Doublemooring,Chittagong.</p>
         </div>
         <div  style="margin-bottom: 0px;" class="cam d-flex justify-content-center m-0">
             <p class="m-0">Phone: 031-2518963</p>
         </div>
         <div  style="margin-bottom: 0px;" class="cam d-flex justify-content-center m-0">
         <p class="m-0">Campus: 2 # Boropool, Halishahar, Chittagong. Phone: 031-713491</p>
         </div>
         <div style="margin-top: 0px;" class="mac d-flex justify-content-center m-0">
             <p>www.oxfordctg.com</p>

         </div>
     </div>
     </div>
      

     <div class="SL d-flex justify-content-center mt-0">
                <div class="col-4 "> 
                <label for="inputPassword4" class="form-label">SL. No :  1310</label>
                <!-- <input type="text" id="name" class="form-control-inline " placeholder=" SL.  1310" /> -->
                </div>
                <div class=" col-4 mt-1">
                    <!-- <b class="tes"> Transfer Certificate</b> -->
                   </div>
                   <div class="col-4 mt-1">
                <p class="ml-0 mt-0 text-left"><b>Date :1/12/2022</b> </p>
                       </div>
    
                       
<!-- inside section -->
<div class="container">
    
<div class="row gutters">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="card">
				<div class="card-body p-0">
					<div class="invoice-container">
						<div class="invoice-body">
							<!-- Row start -->
							<div class="row gutters">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="table-responsive">
										<table class="table custom-table m-0">
											<thead>
												<tr>
													<th>Class</th>
													<th>Student ID</th>
													<th>Term</th>
													<th>Sub Total</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>
														Exam Fee 
														
													</td>
													<td>50000981</td>
													<td>9</td>
													<td>৳5000.00</td>
												</tr>
												<tr>
													<td>
														Sports Fee
														
													</td>
													<td>50000126</td>
													<td>5</td>
													<td>৳100.00</td>
												</tr>
												<tr>
													<td>
														Monthly Fee
														
													</td>
													<td>50000821</td>
													<td>6</td>
													<td>৳49.99</td>
												</tr>
												<tr>
													<td>&nbsp;</td>
													<td colspan="2">
														<p>
															Subtotal<br>
															Discount&amp;<br>
															Tax<br>
														</p>
														<h5 class="text-success"><strong>Grand Total</strong></h5>
													</td>			
													<td>
														<p>
                                                        ৳5000.00<br>
                                                        ৳100.00<br>
                                                        ৳49.00<br>
														</p>
														<h5 class="text-success"><strong>৳5150.99</strong></h5>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- Row end -->
						</div>
						<div class="invoice-footer d-flex justify-content-between">
                        <div >
            <p class="m-4" >  <b><hr class="bg-dark m-0">  Signature of Student/Parenty</b></p>
            </div> 
                            
            <div >
            <p class="m-4" >  <b><hr class="bg-dark m-0"> Receiver Signature</b></p>
            </div> 
      
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    </div>
</div>

<!-- <div class="container" style="position:relative; height:00px; ">       
         <div class="status d-flex">
     <div class="inner-point">
     <div class="inner nowrap">
         <span>Money Receipt</span>
     </div>
 </div>
</div>

</div> -->
   

<!-- end- -->
            </div>
  

  

 </div> 

 




<section>
    <!-- navbar -->
    <div class="container-fluid m-1" >
 
 <div class=" row m-0" >
    
     <div class="col" style="border: 1px solid black;">
     <div class="nomoneny">
        <!-- -----navv -->
<div class="d-flex bg-dark  mt-5 ">
<!-- <div class="p-2">Flex item</div> -->
 <div class="p-2 ml-4">EIIN: 138418</div>
 <div class="ml-auto p-2 mr-4">
 <i>Office Copy</i></div>
  </div>
     <div class="stud ">
      <div class="navbaar  mt-3 ml-2">
                <div class="navv-logo col-2 ">
                    <img style="height: 50px; width: 50px;" class=" img d-block m-auto border img-fluid rounded" src="{{ asset('assets/img/testimonial/p.jpeg') }}" alt="logo">
                </div>
                <div class="nave-heading col-8 mt-2">
                    <h1 class="mt-3 mb-0" style="font-size: medium;">Oxford Modern School & College</h1>
                </div>
                <div ><button onclick="window.print()" id="printBtn" class="btn btn-success btn-sm shadow mx-auto col-auto">
                    print
                </button></div>
            </div>
      </div>
    
     <div class="m-0 p-0">
         <div class=" d-flex justify-content-center mt-1 ml-5 mr-0" style="font-size: small;">
         <p class="m-0">Campus: 1 # Motierpool, Pathantuli Road, Doublemooring,Chittagong.</p>
         </div>
         <div  style="margin-bottom: 0px; font-size:small" class="cam d-flex justify-content-center m-0" >
             <p class="m-0">Phone: 031-2518963</p>
         </div>
         <div class=" d-flex justify-content-center mt-1 ml-5 mr-0" style="font-size: small;">
         <p class="m-0">Campus: 2 # Boropool, Halishahar, Chittagong. Phone: 031-713491</p>
         </div>
         <div style="margin-top: 0px; font-size:small" class="mac d-flex justify-content-center m-0">
             <p>www.oxfordctg.com</p>

         </div>
     </div>
     </div>
 <!-- --- -->
 <div style="position:relative;display:block; height:10px; width: 60px;">
    <div class="status d-flex">
        <div class="inner-point">
            <div class="inner nowrap">
                <span>Money Receipt</span>
            </div>
        </div>
    </div>
</div>
<div class="tabb ">
 <div class="SL d-flex justify-content-center mt-0" style="font-size: small;">
                <div class="col-4 "> 
                <label for="inputPassword4" class="form-label" >SL. No :  1310</label>
                <!-- <input type="text" id="name" class="form-control-inline " placeholder=" SL.  1310" /> -->
                </div>
                <div class=" col-4 mt-1">
                    <!-- <b class="tes"> Transfer Certificate</b> -->
                   </div>
                   <div class="col-4 mt-1">
                <p class="ml-0 mt-0 text-left"><b>Date :1/12/2022</b> </p>
                       </div>
    
                       

    <!-- inside section -->
<div class="container " >
    
    <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="invoice-container">
                            <div class="invoice-body">
                                <!-- Row start -->
                                <div class="row gutters">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table custom-table m-0">
                                                <thead>
                                                    <tr>
                                                        <th>Class</th>
                                                        <th>Student ID</th>
                                                        <th>Term</th>
                                                        <th>Sub Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            Exam Fee 
                                                            
                                                        </td>
                                                        <td>50000981</td>
                                                        <td>9</td>
                                                        <td>৳5000.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Sports Fee
                                                            
                                                        </td>
                                                        <td>50000126</td>
                                                        <td>5</td>
                                                        <td>৳100.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Monthly Fee
                                                            
                                                        </td>
                                                        <td>50000821</td>
                                                        <td>6</td>
                                                        <td>৳49.99</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td colspan="2">
                                                            <p>
                                                                Subtotal<br>
                                                                Discount&amp;<br>
                                                                Tax<br>
                                                            </p>
                                                            <h5 class="text-success"><strong>Grand Total</strong></h5>
                                                        </td>			
                                                        <td>
                                                            <p>
                                                            ৳5000.00<br>
                                                            ৳100.00<br>
                                                            ৳49.00<br>
                                                            </p>
                                                            <h5 class="text-success"><strong>৳5150.99</strong></h5>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Row end -->
                            </div>
                            <div class="invoice-footer d-flex justify-content-between">
                            <div >
                <p class="m-4" >  <b><hr class="bg-dark m-0">  Signature of Student/Parenty</b></p>
                </div> 
                                
                <div >
                <p class="m-4" >  <b><hr class="bg-dark m-0"> Receiver Signature</b></p>
                </div> 
          
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
</div>
</div>
     </div>
   
     <div class="col" style="border: 1px solid black;">
     <div class="nomoneny">
        <!-- -----navv -->
<div class="d-flex bg-dark  mt-5 ">
<!-- <div class="p-2">Flex item</div> -->
 <div class="p-2 ml-4">EIIN: 138418</div>
 <div class="ml-auto p-2 mr-4">
 <i>Student Copy</i></div>
  </div>
     <div class="stud ">
      <div class="navbaar  mt-3 ml-2">
                <div class="navv-logo col-2 ">
                    <img style="height: 50px; width: 50px;" class=" img d-block m-auto border img-fluid rounded" src="{{ asset('assets/img/testimonial/p.jpeg') }}" alt="logo">
                </div>
                <div class="nave-heading col-8 mt-2">
                    <h1 class="mt-3 mb-0" style="font-size: medium;">Oxford Modern School & College</h1>
                </div>
                <div ><button onclick="window.print()" id="printBtn" class="btn btn-success btn-sm shadow mx-auto col-auto">
                    print
                </button></div>
            </div>
      </div>
    
     <div class="m-0 p-0">
         <div class=" d-flex justify-content-center mt-1 ml-5 mr-0" style="font-size: small;">
         <p class="m-0">Campus: 1 # Motierpool, Pathantuli Road, Doublemooring,Chittagong.</p>
         </div>
         <div  style="margin-bottom: 0px; font-size:small" class="cam d-flex justify-content-center m-0" >
             <p class="m-0">Phone: 031-2518963</p>
         </div>
         <div class=" d-flex justify-content-center mt-1 ml-5 mr-0" style="font-size: small;">
         <p class="m-0">Campus: 2 # Boropool, Halishahar, Chittagong. Phone: 031-713491</p>
         </div>
         <div style="margin-top: 0px; font-size:small" class="mac d-flex justify-content-center m-0">
             <p>www.oxfordctg.com</p>

         </div>
     </div>
     </div>
 <!-- --- -->
 <div style="position:relative;display:block; height:10px; width: 60px;">
    <div class="status d-flex">
        <div class="inner-point">
            <div class="inner nowrap">
                <span>Money Receipt</span>
            </div>
        </div>
    </div>
</div>
<div class="tabb ">
 <div class="SL d-flex justify-content-center mt-0" style="font-size: small;">
                <div class="col-4 "> 
                <label for="inputPassword4" class="form-label" >SL. No :  1310</label>
                <!-- <input type="text" id="name" class="form-control-inline " placeholder=" SL.  1310" /> -->
                </div>
                <div class=" col-4 mt-1">
                    <!-- <b class="tes"> Transfer Certificate</b> -->
                   </div>
                   <div class="col-4 mt-1">
                <p class="ml-0 mt-0 text-left"><b>Date :1/12/2022</b> </p>
                       </div>
    
                       

    <!-- inside section -->
<div class="container " >
    
    <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="invoice-container">
                            <div class="invoice-body">
                                <!-- Row start -->
                                <div class="row gutters">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table custom-table m-0">
                                                <thead>
                                                    <tr>
                                                        <th>Class</th>
                                                        <th>Student ID</th>
                                                        <th>Term</th>
                                                        <th>Sub Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            Exam Fee 
                                                            
                                                        </td>
                                                        <td>50000981</td>
                                                        <td>9</td>
                                                        <td>৳5000.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Sports Fee
                                                            
                                                        </td>
                                                        <td>50000126</td>
                                                        <td>5</td>
                                                        <td>৳100.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Monthly Fee
                                                            
                                                        </td>
                                                        <td>50000821</td>
                                                        <td>6</td>
                                                        <td>৳49.99</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td colspan="2">
                                                            <p>
                                                                Subtotal<br>
                                                                Discount&amp;<br>
                                                                Tax<br>
                                                            </p>
                                                            <h5 class="text-success"><strong>Grand Total</strong></h5>
                                                        </td>			
                                                        <td>
                                                            <p>
                                                            ৳5000.00<br>
                                                            ৳100.00<br>
                                                            ৳49.00<br>
                                                            </p>
                                                            <h5 class="text-success"><strong>৳5150.99</strong></h5>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Row end -->
                            </div>
                            <div class="invoice-footer d-flex justify-content-between">
                            <div >
                <p class="m-4" >  <b><hr class="bg-dark m-0">  Signature of Student/Parenty</b></p>
                </div> 
                                
                <div >
                <p class="m-4" >  <b><hr class="bg-dark m-0"> Receiver Signature</b></p>
                </div> 
          
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
</div>
</div>

     </div>
   

     

  </div>

 </div> 

</section>
 
</section> 

</body>

</html>




@stop


@section('style')
    <style>
        .scl-dec p{
            text-align: center;
            color: #0E0EFF;
            font-size: 24px;
            font-family: Great Vibes;
            font-weight: 700;
            margin-bottom: 0px;
        }
        .scl-dec h1,.scl-dec h3{
            color: #0E0EFF;
            text-align: center;
            font-family: Great Vibes;
            font-weight: 900;
        }
        .dec p{
            padding: 10px;
            font-family: Great Vibes;
            font-size: 24px;
            font-weight: bold;
            color: #0E0EFF;
            text-align: justify;
            margin-bottom: 0px;
        }
       
    </style>
@endsection