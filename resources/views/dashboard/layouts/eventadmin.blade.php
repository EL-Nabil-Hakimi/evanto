@extends('dashboard.index')

@section('content')

<style>
    #addbtn{
        position: fixed;
        right: 2em;
        bottom: 2em;
        z-index: 2;
    }
    #addbtn img{
        width: 4em;
        height: 4em;
        border-radius: 50%;
        box-shadow: 0px 0px 5px 2px black;
        transition: 0.3s;
        opacity: 0.7;
        cursor: pointer;
        
    }

    #addbtn img:hover{
        opacity: 1;
        transform: scale(1.1);
    }

    #event1{
        background-color: rgb(255, 255, 255);
        box-shadow: 2px 2px 5px .5px black;

        transition: 0.3s;
    }
    #event1:hover{
        background-color: rgb(241, 245, 255);   
    }

    #msgtop{
        font-size: 15px;
        text-align: center;
        color: white;
        width: 30%;
        margin-left: 1em;
        border-radius: 10px 10px 0px 0px;
    }

</style>

    <!--  Header End -->
    <div class="container-fluid">
        <div class="card">
            

            @if (session('msg'))
                <div class="alert alert-success" style="color: black">{{ session('msg') }}</div>
            @endif
            @if (session('delmsg'))
                <div class="alert alert-danger" style="color: black">{{ session('delmsg') }}</div>
            @endif

            <section>
                <div class="container py-5">

                @forelse ($events as $event)
                    
                  
                  <div class="row justify-content-center mb-3" >
                      <div class="col-md-12 col-xl-10">
                        @if($event->status == 0)
                        <div  id="msgtop" style="background-color: rgb(66, 95, 210);">Panding</div>
                        @elseif($event->status == 1 || $event->status == 4)
                        <div  id="msgtop" style="background-color: rgb(190, 16, 132);" > Archeved</div>
                        @elseif($event->status == 2)
                        <div  id="msgtop" style="background-color: rgb(74, 175, 15);">Actif</div>
                        @elseif($event->status == 3)
                        <div  id="msgtop" style="background-color: rgb(233, 34, 34);">Regected</div>
                        @endif

                      <div class="card shadow-0 border rounded-3" id="event1">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                              <div class="bg-image hover-zoom ripple rounded ripple-surface">
                                <img src="assets/images/{{ $event->image }}"
                                  class="w-100" />
                                <a href="#!">
                                  <div class="hover-overlay">
                                    <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                  </div>
                                </a>
                              </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-6">
                              <h5>{{$event->title}}</h5>
                              <div class="d-flex flex-row">
                                <div class="text-danger mb-1 me-2">
                                  <i class="fa fa-star"></i>
                                  <i class="fa fa-star"></i>
                                  <i class="fa fa-star"></i>
                                  <i class="fa fa-star"></i>
                                </div>
                              </div>
                              
                              <p class="text-truncate mb-4 mb-md-0 " style="font-size: 1.2em ; color :black">
                                {{ Str::limit($event->description, 120, '...') }}
                            </p>
                              <div class="mt-1 mb-0 text-muted small">
                                <span>Location: {{$event->location}}</span>
                                <br>
                                <span>Date : {{$event->date}} </span>
                                <br>                                
                                <span>Time : {{ date( 'H:i' ,strtotime($event->time)) }} </span>
                                <br> 
                                <span>duration : {{$event->duration}} min</span>
                                <br>    
                                <span>Total places:{{$event->total_places}} </span>
                                <br>
                                <span>Total reservations : {{$event->total_reservations}}</span>
                                <br>                                
                                <span>Total Places Available: : {{$event->total_places - $event->total_reservations}}</span>
                                <br>  
                                
                                @if($event->acceptation == 1)
                                    <span>Acceptation : validation manuelle</span>
                                    <br>  
                                @else                                                            
                                    <span>Acceptation : automatique des réservations</span>
                                @endif
                                                               
                              </div>
                             
                           
                            </div>
                            <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                              <div class="d-flex flex-row align-items-center mb-1">
                                @if($event->price == 0)
                                    <h4 class="text-secondary mb-1 me-1">Free</h4>

                                    @else
                                    <h4 class="text-secondary mb-1 me-1">{{$event->price}} DH</h4>
                                    @endif
                            </div>
                            
                            
                              <h6 class="text-success"></h6>
                              <div class="d-flex flex-column mt-4">
                                <button class="btn btn-outline-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#detailEmail{{ $event->id }}">Details</button>
                                
                                @if($event->status != 4)
                                <button class="btn btn-warning btn-sm mt-2" type="button" data-bs-toggle="modal" 
                                        data-bs-target="#DeleteEmail" 
                                        data-category-id="{{ $event->id }}"
                                        data-category-name="{{ $event->title }}">Archive</button>
                                @endif
                              </div>

                            
                              <div class="d-flex justify-content-end mt-6">
                                <a  href="/acceptevent/{{$event->id}}" class="btn btn-success btn-circle me-2" type="button" >
                                    <i class="bi bi-check-circle"></i>
                                </a>
                                <a href="/rejectevent/{{$event->id}}" class="btn btn-danger btn-circle" type="button" >
                                    <i class="bi bi-x-circle"></i>
                                </a>
                            </div>
                              
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>



                  <div class="modal fade" id="detailEmail{{ $event->id }}" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Event Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            @if($event->image)
                            <div class="modal-body" style="border-radius: 2px;">
                                <div class="mb-3 text-center">
                                    <img src="{{ asset('assets/images/' . $event->image) }}" alt="Event Image" class="img-fluid rounded">
                                </div>
                            </div>
                            @endif
                            <div class="modal-body">
                                <div class="mb-3">
                                    <strong>Title:</strong> {{ $event->title }}
                                </div>
                                <div class="mb-3">
                                    <strong>Description:</strong> <br>{{ $event->description }}
                                </div>
                                <div class="mb-3">
                                    <strong>Location:</strong> {{ $event->location }}
                                </div>
                                <div class="mb-3">
                                    <strong>Date:</strong> {{ $event->date }} 
                                </div>
                                <div class="mb-3">

                                    <strong>Time:</strong> {{ date('H:i', strtotime($event->time)) }}
                                </div>
                                <div class="mb-3">
                                    <strong>Duration (min):</strong> {{ $event->duration }}
                                </div>
                                <div class="mb-3">
                                    @if($event->price == 0)
                                     <strong>Price:</strong> Free
                                    @else
                                    <strong>Price:</strong> {{ $event->price }} DH
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <strong>Total Places Available:</strong> {{ $event->total_places - $event->total_reservations }}
                                </div>
                                <div class="mb-3">
                                    <strong>Category:</strong> {{ $event->category->name }} 
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                


                  @empty
                  <div
                    style="display: flex; justify-content: center; align-items: center; flex-direction: column; width: 100%; padding:3em ; opacity:0.4">
                    <img src="https://static.vecteezy.com/system/resources/previews/021/745/881/original/sad-face-icon-sad-emotion-face-symbol-icon-unhappy-icon-vector.jpg"
                        alt="" style="width: 20%;" srcset="">
                    <h3 style="margin-top: 2em">User List is empty</h3>
                </div>
                @endforelse 
                </div>
        </section>

                <div style="padding: 20px ; ">{{ $events->links('pagination::bootstrap-5') }}</div>
            </div>
        </div>
        </div>
        </div>



           <div class="modal fade" id="DeleteEmail" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Archive Event</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Display the received data -->
                        <div class="mb-3">
                            <h3 class="text-danger" style="text-align: center">Are You Sure?</h3>
                            <p style="text-align: center">Archive: <span id="categoryName"></span></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="#" id="deleteCategoryLink" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Button trigger modal -->
 

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var modal = document.getElementById('DeleteEmail');
                modal.addEventListener('show.bs.modal', function (event) {
                    var button = event.relatedTarget;
                    var categoryId = button.getAttribute('data-category-id');
                    var categoryName = button.getAttribute('data-category-name');
                    var deleteLink = '/ArchivEvent/' + categoryId;
                    
                    modal.querySelector('#categoryName').innerText = categoryName;
                    modal.querySelector('#deleteCategoryLink').setAttribute('href', deleteLink);
                });
            });
        </script>
        

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
@endsection