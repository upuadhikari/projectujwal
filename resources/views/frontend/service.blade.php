
@extends('layouts.master')

@section('content')

        <!-- Service Start -->
        <div class="service">
        <div class="container">
                <div class="section-header">
                    <p>Consulting Services</p>
                    <h2>Our Best Consulting Services</h2>
                </div>
                <div class="row">
                @foreach($data as $programdetail)
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <img src="{{asset('assetts/img/icon-8.png')}}" alt="Icon">
                            <h3>{{$programdetail->name}}</h3>
                            <p>
                                Lorem ipsum dolor sit amet elit. Phasellus nec pretium ornare velit non
                            </p>
                            <a href="{{url('homeviewprograms/view-program/'.$programdetail->id)}}">Get Started</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        </div>
    
      
    </body>
</html>
@stop