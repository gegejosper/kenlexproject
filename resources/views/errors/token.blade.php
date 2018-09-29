@extends('layouts.front')

@section('content')
<main id="main">
<!--==========================
      About Section
    ============================-->
    <section id="about" class="wow fadeInUp" style="padding:100px 0px;">
      <div class="container">
        <div class="row">
         

            <div class="col-lg-12 content">
                <h2>Your session expired.</h2>   
				
				<div class="error-details">
					Sorry, an error has occured! Why not try going back to the <a href="{{ url('/') }}">Home page</a>!
					
				</div> <!-- /error-details -->
            </div>
        </div>    
      </div>
    </section><!-- #about -->
</main>
@endsection
