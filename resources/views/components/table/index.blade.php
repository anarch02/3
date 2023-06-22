<!-- Table with stripped rows -->
<table class="table  datatable">
    <thead>
      <tr>
        @foreach ($info['table']['thead'] as $key => $item)
            <th scope="col"> {{$item}} </th>
        @endforeach
      </tr>
    </thead>
    <tbody>
      @foreach ($array as $item)
          <tr>
            @foreach ($info['table']['tbody'] as $key => $td)
            @if ($td == 'startDate' || $td == 'finishDate')
            <td>
              {{ \Carbon\Carbon::createFromFormat('Y-m-d', $item[$td])->format('d M Y') }}
            </td>
            @else
            <td>
              {{-- @dump($td) --}}
              {{$item->$td}}
            </td>
            @endif
              
            @endforeach 
            <td class="d-flex"> 
              <x-button.edit :btn="$info['table']['show']" :id="$item->id"></x-button.edit>
              <x-button.edit :btn="$info['table']['edit']" :id="$item->id"></x-button.edit>
              <x-button.delete :btn="$info['table']['delete']" :id="$item->id"></x-button.delete>
            </td>
          </tr>
        @endforeach
    </tbody>

  </table>
  <!-- End Table with stripped rows -->
  {{ $array->links('pagination::bootstrap-5') }}
