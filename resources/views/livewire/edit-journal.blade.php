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
                            <div class="row">
                                {{--<div class="col-md-12">--}}
                                    {{--<div class="dec-block">--}}
                                        {{--<div class="ec-block-icon" style="float:left;margin-right:6px;height: 50px; width:50px; color: #ffffff; background-color: #00AAAA; border-radius: 50%;" >--}}
                                            {{--<i class="far fa-check-circle fa-2x" style="padding: 9px;"></i>--}}
                                        {{--</div>--}}
                                        {{--<div class="dec-block-dec" style="float:left;">--}}
                                            {{--<h5 style="margin-bottom: 0px;">Total Found</h5>--}}
                                            {{--<p>{{ $sessions->count() }}</p>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            </div>
                            @if($error_message)
                            <div class="alert alert-danger" role="alert">
                                <h3 class="text-danger bg-">Alert!</h3>
                                <p>{{$error_message}}</p>
                              </div>
                            @endif
                            <div class="row">
                                <div>
                                    <button type="button" wire:click.prevent="addJournal" id="add_new_entry" class="btn btn-info btn-sm"  style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i>Add new Entry</button>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>COA</th>
                                    <th>Amount</th>
                                    <th>Credit/Credit</th>
                                    <th></th>
                                </tr>
                                </thead>
                            <form method="POST" wire:submit.prevent="store">
                                <tbody>
                                    @forelse($allJournals as $index => $journal)
                                    <tr>
                                        <td>
                                            <div class="input-group">
                                            <input wire:model.lazy="allJournals.{{$index}}.description" class="form-control" placeholder="Enter Journal Description" type="text" required>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                            <select wire:model.lazy="allJournals.{{$index}}.chart_of_account_id" class="form-control" required>
                                                    <option selected="selected" value="">Select COA</option>
                                                    @forelse($coas as $coa)
                                                        <option selected="selected" value="{{$coa->id}}">{{strtoupper($coa->name)}}</option>
                                                    @empty

                                                    @endforelse
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input wire:model.lazy="allJournals.{{$index}}.amount" class="form-control" type="number" required>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <select class="form-control" wire:model.lazy="allJournals.{{$index}}.debit_credit" required>
                                                <option value="" selected="selected" >Journal Type</option>
                                                    <option value="0">Debit</option>
                                                    <option value="1">Credit</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td><button wire:click.prevent="deleteJournal({{$index}})" class="btn btn-danger" >Remove Entry</button></td>
                                    </tr>
                                    @empty

                                    @endforelse
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5" class="text-right">
                                            <div class="card-body">
                                            <input class="btn btn-info" type="submit" value="Update Journals">
                                            <a href="{{route('journals.index')}}" class="btn btn-danger" >Cencel Update</a>
                                            </div>                                            
                                        </td>
                                    </tr>
                                </tfoot>
                                {{ Form::close() }}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
