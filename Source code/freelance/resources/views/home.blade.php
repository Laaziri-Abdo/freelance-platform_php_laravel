@extends('layouts.app')
@section('content')


        <a href="/freelancer/login"> <button class="btn btn-outline-success ml-4">Freelancer</button></a>
        <a href="/client/login"> <button class="btn btn-outline-success ml-4">Client</button></a>
      </div>
    </div>
  </nav>
  @if(Session::get('success'))
  <div class="alert text-center alert-success">
     {{ Session::get('success') }}
  </div>
@endif
<header class="py-5">
    <div class="container-fluid px-5">
        <div class="row gx-5 align-items-center justify-content-center">
            <div class="col-lg-8 col-xl-7 col-xxl-6">
                <div class="my-5 text-center text-xl-start">
                    <h1 class="display-5 fw-bolder text-success mb-2">Find The Perfect Freelance Services For 
                        Your Business</h1>
                    <h3 class=" text-muted mb-4">Join the world's
                        work marketplace</h3>
                    <div class="d-grid gap-3 mt-5 d-sm-flex justify-content-sm-center justify-content-xl-start">
                        <a class="btn btn-success btn-lg mr-5 rounded-pill" href="freelancer/login">I'm Freelancer</a>
                        <a class="btn btn-outline-success btn-lg rounded-pill " href="client/login">I'm Client</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded my-5" src="img/5.jpeg" alt="..." /></div>
        </div>
    </div>
</header>
<hr>
        <!-- Features section-->
        <section class="border-bottom" id="features">
            <h1 class="text-center fw-bold text-success">Guides</h1>
            <div class="container-fluid px-5 my-5">
              
                <div class="row gx-5">
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <div ><img src="img/1.jpg" class="w-100 rounded mb-3 " style="height: 200px" alt=""></div>
                        <h2 class="h4 fw-bolder">Start an online business and work from home</h2>
                        <p class="text-muted">A complete guide to starting a small business online</p>
                        <a class="text-decoration-none" target="_blank" href="https://en.wikipedia.org/wiki/Home_business">
                           Read more..
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <div><img src="img/2.jpg" class="w-100 rounded mb-3 " style="height: 200px" alt=""></i></div>
                        <h2 class="h4 fw-bolder"> Digital marketing made easy</h2>
                        <p class="text-muted">A practical guide to understand what is digital marketing</p>
                        <a class="text-decoration-none" target="_blank" href="https://en.wikipedia.org/wiki/Digital_marketing">
                            Read more..
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <div ><img src="img/3.jpeg" class="w-100 rounded mb-3 "style="height: 200px" alt=""></i></div>
                        <h2 class="h4 fw-bolder">Create a logo for your business</h2>
                        <p class="text-muted">A step-by-step guide to create a memorable business logo.</p>
                        <a class="text-decoration-none" target="_blank" href="https://en.wikipedia.org/wiki/Logo">
                            Read more..
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        
       
        <!-- Testimonials section-->
        <section class=" border-bottom">
            <div class="container-fluid px-5 my-5 px-5">
                <div class="text-center mb-3">
                    <h2 class="fw-bolder text-success">We've got what you need!</h2>
                    <p class="lead mb-0 text-muted">Our customers love working with us</p>
                </div>

                        <!-- Testimonial 1-->
                        <div class="card mb-3">
                            <div class="card-body p-4">
                                <div class="d-flex">
                                    <div class="flex-shrink-0"><i class="bi bi-chat-right-quote-fill text-primary fs-1"></i></div>
                                    <div class="ms-4">
                                        <p class="mb-1">Thank you for putting together such a great product. We loved working with you and the whole team, and we will be recommending you to others!</p>
                                        <div class="small text-muted">- Client Name, Location</div>
                                    </div>
                                </div>
                            </div>
                                
                </div>
                            <!-- Testimonial 1-->
                        <div class="card mb-3">
                            <div class="card-body p-4">
                                <div class="d-flex">
                                    <div class="flex-shrink-0"><i class="bi bi-chat-right-quote-fill text-primary fs-1"></i></div>
                                    <div class="ms-4">
                                        <p class="mb-1">The whole team was a huge help with putting things together for our company and brand. We will be hiring them again in the near future for additional work!</p>
                                        <div class="small text-muted">- Client Name, Location</div>
                                    </div>
                                </div>
                       
               
            </div>
        </section>
     
        <!-- Contact section-->
        <section class="bg-light mb-4 mt-4">
            <div class="container-fluid ">
                <div class="row gx-5">
                    <div class="col-7 p-4">
                <div class="text-center mb-2">

                    <h2 class="fw-bolder text-success">Get in touch</h2>
                    <p class="lead mb-0 text-muted">We'd love to hear from you</p>
                </div>
                <form action="/contact"  method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <input type="text" placeholder="Name" id="name" class="form-control" name="name"
                            required >
                       
                    </div>

                    <div class="form-group mb-3">
                        <input type="text" placeholder="Email" id="email_address" class="form-control"
                            name="email" required >
                        
                    </div>
                    <div class="form-group mb-3">
                        <input type="number" placeholder="Phone Number"  class="form-control"
                            name="phone" required >
                        
                    </div>

                    <div class="form-group mb-3">
                            <textarea name="messege" id="" placeholder="Messege" class="form-control" cols="10" rows="5" required></textarea>     
                    </div>
                    <div class="d-grid mx-auto">
                        <button type="submit" class="btn btn-success btn-block">Send</button>
                    </div>
                </form>

            </div>
            <div class="col p-4 ">
                <section class="resume-section " id="skills">
                    <div class="resume-section-content ">
                        <h2 class="mb-4 text-center  text-success">personal details</h2>
                        <div class="subheading text-muted mb-4">Programming Languages & Tools</div>
                        <ul class="list-inline dev-icons pl-4">
                            <li class="list-inline-item"><i class="fab fa-html5"></i></li>
                            <li class="list-inline-item"><i class="fab fa-css3-alt"></i></li>
                            <li class="list-inline-item"><i class="fab fa-js-square"></i></li>
                            <li class="list-inline-item"><i class="fab fa-php"></i></li>
                            <li class="list-inline-item"><i class="fab fa-sass"></i></li>
                            <li class="list-inline-item"><i class="fab fa-bootstrap"></i></li>
                            <li class="list-inline-item"><i class="fab fa-vuejs"></i></li>
                            <li class="list-inline-item"><i class="fab fa-laravel"></i></li>
                        </ul>
                        <h3 class="subheading text-muted mb-3">Contact details</h3>
                          <div class="ml-2 text-muted ">
                              <h6><i class="fas fa-phone-square-alt"></i> +212 661 018 901</h6>
                              <h6><i class="fas fa-envelope-square"></i> hamza.elglaoui00@gmail.com</h6>
                              <h6><i class="fas fa-map-marker"></i> Ait ourir,Marrakech Maroc</h6>
                    
                          </div>
                               
                              
                    </div>
                </section>

            </div>
        </div>
        </div>
        </section>
        

@endsection
