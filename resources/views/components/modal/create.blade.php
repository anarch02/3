<!-- Modal Dialog Scrollable -->
<button type="button" class="btn btn-primary bi bi-plus" data-bs-toggle="modal" data-bs-target="#modalDialogCreateForm">
    {{$info['create']['name']}}
</button>
<div class="modal fade" id="modalDialogCreateForm" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
        <form id="add-form" action="{{route($info['create']['route'])}}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{$info['create']['name']}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @foreach ($info['create']['inputs'] as $key => $item)
                        <div class="mb-2 form-group">
                            <label for="{{$item['label']}}" class="form-label">{{$item['label']}}</label>
                            <input type="{{$item['type']}}" class="form-control" id="{{$item['id']}}" name="{{$info['name']}}" placeholder="{{$item['placeholder']}}"" required>
                        </div>
                    @endforeach
                    <div class="errorsMessage"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">{{$info['create']['submit']}}</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Modal Dialog Scrollable-->