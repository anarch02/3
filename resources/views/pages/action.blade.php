@extends('layouts.app')

@section('content')
    
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Form Validation</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Validation</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"> {{isset($object)?  $object->name : "Create"}} </h5>
              <!-- Custom Styled Validation with Tooltips -->
              <form class="row g-3 needs-validation" action="{{isset($object)? route($info['route'], $object->id) : route($info['route'])}}" novalidate>
                @foreach ($info['inputs'] as $key => $item)
                <div class="position-relative">
                  <label for="validationTooltip01" class="form-label">{{$item['label']}}</label>
                  <input type="{{$item['type']}}" class="form-control" id="validationTooltip01" name="{{$info['name']}}" {{isset($object)? 'value="'.$object[$item['name']].'"'  : 'placeholder='.$item['name'].''}}   required>
                  <div class="valid-tooltip">
                    Looks good!
                  </div>
                </div>
                @endforeach
                
          
                <div class="col-12">
                  <button class="btn btn-primary" type="submit">Submit form</button>
                </div>
              </form><!-- End Custom Styled Validation with Tooltips -->

            </div>
          </div>

        </div>

        <div class="col-lg-4">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title text-center">
                {{__('Info')}}
              </h5>
            </div>
            <div class="card-body">
              <p class="p-2"> 
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus rerum iure et illum iste recusandae dolore, expedita quo obcaecati rem inventore eveniet, deleniti reprehenderit fugiat dolores repudiandae alias laudantium pariatur tenetur modi. Eius quos laboriosam, placeat esse nulla explicabo voluptatum facilis laborum! Deserunt corporis, consectetur totam, tempore maiores, quibusdam doloremque natus obcaecati tenetur quaerat cumque quas iure consequuntur ad eius distinctio nemo quis. Nemo odio placeat officiis natus! Aliquam adipisci assumenda voluptates corporis cum repellat veniam, in molestiae sed amet voluptatem ipsa atque autem, obcaecati ullam ut voluptatibus id animi qui suscipit dolor. Veritatis sapiente, exercitationem minima commodi harum vitae?
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->   
@endsection