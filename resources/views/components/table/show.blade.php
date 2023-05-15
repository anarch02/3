<!-- Table with stripped rows -->
<table class="table datatable">
    <thead>
      <tr>
        @foreach ($array['thead'] as $key => $item)
            <th scope="col"> {{$item}} </th>
        @endforeach
      </tr>
    </thead>
    <tbody>
      {{-- @dump($array) --}}
      @foreach ($array['list'][0] as $item)
        <tr>
          @foreach ($array['tbody'] as $td)
            <td>{{$item[$td]}}</td>
          @endforeach 
        </tr>
      @endforeach
    </tbody>

  </table>
  <!-- End Table with stripped rows -->
