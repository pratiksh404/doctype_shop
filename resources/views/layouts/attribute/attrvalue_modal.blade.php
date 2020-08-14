@if (!empty($attribute))
<div class="modal fade" id="attribute-value-{{$attribute->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Product Attribute Value</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="datatable" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Value</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($attribute->attrvalues))
                        @foreach ($attribute->attrvalues as $value)
                        <tr>
                            <td>{{ $value->value }}</td>
                            <td class="d-flex justify-content-around">
                                <form
                                    action="{{url(config('landing.prefix','admin/shop').'/'.'attrvalue').'/'.$value->id}}"
                                    method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                            {{--  @include('blog::layouts.Attribute.confirm_delete') --}}
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Value</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="modal-footer">
                <a href="{{url(config('setting.prefix', 'admin/shop') . '/attrvalue/create')}}"><button
                        class="btn btn-primary">Add Value</button></a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endif