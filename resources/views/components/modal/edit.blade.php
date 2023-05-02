<!-- Modal Dialog Scrollable -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDialogEditForm">
    {{$info['edit']['name']}}
</button>

<button 
    data-bs-toggle="modal"
    data-bs-target="#updateModel"
    data-id="{{$item->id}}"
    data-title="{{$item->title}}"
    id="update-model-button"
    class="btn">
    <i class="bi bi-pencil-square"></i>
</button>

<div class="modal fade" id="modalDialogEditForm" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
        <form id="edit-form" action="{{route($info['edit']['route'])}}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{$info['edit']['name']}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="errorsMessage p-3"></div>
                <div class="modal-body">
                    @foreach ($info['edit']['inputs'] as $key => $item)
                        <label for="{{$item['name']}}"> {{$item['label']}} </label>
                        <input type="{{$item['type']}}" id="{{$item['id']}}" name="{{$item['name']}}" placeholder="{{$item['placeholder']}}" class="form-control">
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">{{$info['edit']['submit']}}</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $('body').on('click', '#edit', function(){
    var id = $(this).data('id');
    var name = $(this).data('name');
    var email = $(this).data('email');

    $('#up_id').val(id);
    $('#up_name').val(name);
    $('#up_email').val(email);
});
</script>
<!-- End Modal Dialog Scrollable-->