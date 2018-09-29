@extends('layouts.front')

@section('content')
  <main id="main">
  <div class="container">
        <div class="form">
          <!-- <div id="sendmessage">Your message has been sent. Thank you!</div> -->
          <div id="errormessage"></div>
         
        </div>
    <!--==========================
      Booking Section
    ============================-->
    <section id="booking" style="padding:100px 0px;">
      <div class="container">
        <div class="section-header" align="center">
          <h2> <i class="fa fa-folder-open-o"></i> Request Booking</h2>
          <p>Sed tamen tempor magna labore dolore dolor sint tempor duis magna elit veniam aliqua esse amet veniam enim export quid quid veniam aliqua eram noster malis nulla duis fugiat culpa esse aute nulla ipsum velit export irure minim illum fore</p>
        </div>
        @if (session('success'))
				<div class="alert alert-success">
					{{ session('success') }} 
          <p>We will send further details to your email <strong>{{ session('email') }}</strong>. </p>
				</div>
			  @endif
        @if (session('error'))
				<div class="alert alert-warning">
					{{ session('error') }} 
				</div>
			  @endif
        <form action="{{ route('submitbooking') }}" method="post" role="form" class="contactForm">
        {{ csrf_field() }}
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter Your Name at least 4 chars" 
                @isset($username)
                value="{{ $username }}" 
                readonly="readonly"
                @endisset 
                />
                <div class="validation"></div>
                <br>
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" 
                @isset($username)
                value="{{ $useremail }}" 
                readonly="readonly"
                @endisset 
                />
                <div class="validation"></div>
                <br>
                <input type="text" name="companyname" class="form-control" id="companyname" placeholder="Company Name" data-rule="minlen:4" data-msg="Please enter Company Name at least 4 chars" 
                @isset($company)
                value="{{ $company }}" 
                readonly="readonly"
                @endisset 
                />
                <div class="validation"></div>
                <br>
                <input type="text" name="contactnum" class="form-control" id="contactnum" placeholder="Contact Number" data-rule="minlen:11" data-msg="Please enter Contact Number" 
                @isset($contactnum)
                value="{{ $contactnum }}" 
                readonly="readonly"
                @endisset 
                />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="text" name="origin" class="form-control" id="name" placeholder="Place of Origin" data-rule="minlen:4" data-msg="Please enter Place of Origin at least 4 chars" />
                <div class="validation"></div>
                <br>
                <input type="text" name="destination" class="form-control" id="name" placeholder="Delivery Point" data-rule="minlen:4" data-msg="Please enter Delivery Point at least 4 chars" />
                <div class="validation"></div>
                <br>
                <input type="number" name="weight" class="form-control" id="name" placeholder="Weight (Please put in Tons)"  data-rule="minlen:1" data-msg="Please enter weight" />
                <div class="validation"></div>
                <label for="dateofpickup">Date of Pickup</label>
                <input type="date" class="form-control" name="dateofpickup" id="datepickup" placeholder="" data-rule="date" data-msg="Please enter a valid date" />
              </div>
            </div>
           
            <div class="form-group">
            <label for="cargotype">Cargo Type</label>
                <select name="cargotype" id="cargotype" class="form-control">
                    <option value="20FT Container Size">20FT Container Size</option>
                    <option value="40FT Container Size">40FT Container Size</option>
                    <option value="Bulk Cargo">Bulk Cargo</option>
                    <option value="Agricultural Products">Agricultural Products</option>
                    <option value="Hardware Products">Hardware Products</option>
                    <option value="Special Equipments">Special Equipments</option>
                </select>
              <div class="validation"></div>
            </div>
            <div class="form-group">
            <label for="details">Additional Details</label>
              <textarea class="form-control" name="details" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Please write something for us"></textarea>
              <div class="validation"></div>
            </div>
            <div class="text-center"><button type="submit" class="btn-get-booking">Send Request</button></div>
        </form>
      </div>
    </section><!-- #products -->
  </main>
@endsection
