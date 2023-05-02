<form action="{{route($btn['route'], $id)}}" method="post">
    @csrf
    @method('DELETE')
        <button type="submit" class="btn {{$btn['class']}}"></button>
</form>