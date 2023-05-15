<div class="infotitle">
    <h1>{{$info['name']}} 
      @isset($info['create'])
        <x-button.create :btn="$info['create']"></x-button.create> 
      @endisset
    </h1>
    <nav>
      <ol class="breadcrumb">
        @foreach ($info['info_title'] as $key => $item)
          <li class="breadcrumb-item"><a href="{{route($key)}}">{{$item}}</a></li> 
        @endforeach
        <li class="breadcrumb-item active">{{$info['name']}}</li>
      </ol>
    </nav>
  </div>