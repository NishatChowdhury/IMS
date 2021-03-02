<div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Journals/create</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Institution Mgnt</a></li>
                        <li class="breadcrumb-item active">Journals/create</li>
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
                        <div class="card-header" style="border-bottom: none !important;">
                            @if($error_message)
                            <div class="alert alert-danger" role="alert">
                                <h3 class="text-danger bg-">Alert!</h3>
                                <p>{{$error_message}}</p>
                              </div>
                            @endif
                            <div class="row">
                                <div>
                                <a href="{{route('journals.create')}}" class="btn btn-info btn-sm"  style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i> Create New Journal</a>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>COA</th>
                                    <th>Credit/Credit</th>
                                    <th>Journal No</th>
                                    <th>Debit</th>
                                    <th>Credit</th>
                                </tr>
                                </thead>
                                <tbody>

                                    @forelse($allJournals as $index => $journal)
                                    <tr>
                                        <td>{{dateToRead($journal->created_at)}}</td>
                                        <td>{{$journal->description}}</td>
                                        <td><a href="{{route('journals.edit', $journal->id)}}">{{$journal->coa->name}} <i class="fa fa-pen text-info"></i></a></td>
                                        <td>{{$journal->debit_credit == 0 ? "Debit" : "Credit"}}</td>
                                        <td class="text-center"> {{$journal->journal_no}}</td>
                                        <td class="text-right">{{number_format($journal->debit_credit == 0 ? $journal->amount : 0 ,2)}}</td>
                                        <td class="text-right">{{number_format($journal->debit_credit == 1 ? $journal->amount : 0 ,2)}}</td>
                                    </tr>
                                    @empty

                                    @endforelse
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td class="text-right" colspan="5">Total Amount</td>
                                        <td class="text-right">{{number_format($total_debit, 2)}}</td>
                                        <td class="text-right">{{number_format($total_credit, 2)}}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
