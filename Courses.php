
<!DOCTYPE html>
<html>
<head>
    <title>Courses</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    
     <style>
        .card-title {
            color: rgb(10, 10, 10);
        }
        .rating {
            display: inline-block;
        }
        .rating i {
            color: gold;
            margin-right: 2px;
            margin-top: 5px; 
            line-height:1; 
            color: gold;
         
        line-height: 1; 
        font-size: 11px; 
        }

        .price {
            
            bottom: 0;
            right: 0;
            margin: 0.5rem;
            font-weight: bold;
            margin-top: 5px; 
            line-height: 1; 
            text-align: left;
        }

        
        .carousel {
        position: relative; 
    }

    
    .carousel-control-prev,
    .carousel-control-next {
        position: absolute; 
        top: 10%; 
        transform: translateY(-50%); 
        width: 50px; 
        height: 50px; 
        border-radius: 50%; 
        background-color: rgb(5, 5, 5); 
        border-color: black; 
        color: rgb(243, 238, 238); 
        font-size: 20px; 
        transition: background-color 0.3s; 
    }

    
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: transparent; 
        color: white; 
        font-size: 24px; 
    }

    
    .carousel-control-prev {
        left: -90px; 
    }

    .carousel-control-next {
        right: -90px; 
    }

    
    .carousel-control-prev:hover,
    .carousel-control-next:hover {
        background-color: rgb(8, 8, 8); 
         
    }

    .card {
        position: relative;
        overflow: hidden; 
        transition: opacity 0.3s; 
    }
    .card-title {
        margin-bottom: 5px; 
        line-height: 1; 
        font-weight: bold;
    }

    
    .card-text {
        margin-bottom: 5px; 
        line-height: 1; 
        font-size: 11px;
        color: rgb(83, 82, 82);
    }



    
    .card:hover {
        opacity: 0.7 
    }

    

    .add-to-cart-btn {
        position: absolute;
        bottom: 10px; 
        left: 10px;
        padding: 5px 15px;
        background-color: #44034d;
        color: white;
        border: none;
        cursor: pointer;
        opacity: 0; 
        transition: opacity 0.3s; 
        font-weight: bold;

    }
    .wishlist-btn {
        position: absolute;
        bottom: 10px; 
        right: 20px;
        padding: 0; 
        
        color: rgb(19, 18, 18); 
        border: 2px solid black; 
        cursor: pointer;
        opacity: 0; 
        transition: opacity 0.3s; 
        width: 40px; 
        height: 40px; 
        border-radius: 50%; 
        font-size: 20px; 
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
   

    
    .card:hover .wishlist-btn,
    .card:hover .add-to-cart-btn {
        opacity: 5; 
    }

    .carousel-item {
        width: 100%; 
        height: 400px; 
    }

    .carousel-inner {
        width: 110%; 
        right: 50px;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    
    .carousel-item .col-md-3 {
        flex: 0 0 20%; 
    }

        
    /* section 2 */


    .card-title-2 {
            color: rgb(14, 13, 13);
            line-height: 0; 
            margin-bottom: 0; 
            left: 100px;
            font-size: 18px; 
            font-weight: bold;
            
        }
        .rating-2 {
            display: inline-block;
        
           
        }
        .rating i {
            color: rgb(184, 136, 4);
           
            
            font-size: 11px; 
        }
        .price-2 {
            position: absolute;
            top: 0;
            right: 0;
            
            font-weight: bold;
            padding: 0.5rem;
            background-color: rgba(255, 255, 255, 0.8);
            border-bottom-left-radius: 5px;
        }
        .card-body-2 {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
            padding: 1rem; 
        }
        .card-text-1 {
            flex-grow: 1;
            line-height: 1; 
            margin-bottom: 0; 
            margin-right: 40px;
            font-size: 14px; 
            margin-top: 20px;
            color: rgb(39, 39, 38);
            
        }
        .card-text-2{
            color: rgb(129, 129, 127);
            margin-top: 10px;
            
            font-size: 13px; 
        }
        .card-text-3{
            color: rgb(129, 129, 127);
           
            line-height: 1; 
            font-size: 13px; 
        }
        .card-text-4{
            color: rgb(156, 156, 154);
           
            line-height: 1; 
            font-size: 11px; 
        }
        .card-2 {
            height: 140px;
            width: 990px;
            position: relative;
            overflow: hidden;
            transition: opacity 0.3s;
            display: flex;
            left: 90%; 
            border: none; 
            box-shadow: none; 
        }

        .card-img-2 {
            flex-shrink: 0; 
            width: 250px; 
            height: 90%; 
            object-fit: cover; 
            border: 1px solid #b4b2b2; 
            
        }
        .rating-container {
            display: flex;
            align-items: center;
            margin-top: -15px;
           
        }

        .rating-text {
            margin-left: 8px; 
            margin-bottom: 7px;
            font-weight: bold;
        }
        .rating-text-2 {
            
            margin-bottom: 7px;
            font-size: 13px; 
            color: rgb(156, 156, 154);
            
        }
        .row-1 {
            margin-bottom: 20px; 
            position: relative; 
            padding-bottom: 20px; 
        }

        .row-1::after {
            content: "";
            position: absolute;
            left: 65%;
            transform: translateX(-50%);
            bottom: 0;
            width:990px;
            border-bottom: 2px solid rgba(3, 3, 3, 0.1); 
        }
        .add-to-cart-btn-2 {
        position: absolute;
        bottom: 50px; 
        left:  30%;
        padding: 5px 15px;
        background-color: #44034d;
        color: white;
        border: none;
        cursor: pointer;
        opacity: 0; 
        transition: opacity 0.3s; 
        font-weight: bold;

    }
    .wishlist-btn-2 {
        position: absolute;
        bottom: 50px; 
        right: 40%;
        padding: 0; 
        
        color: rgb(19, 18, 18); 
        border: 2px solid black; 
        cursor: pointer;
        opacity: 0; 
        transition: opacity 0.3s; 
        width: 40px; 
        height: 40px; 
        border-radius: 50%; 
        font-size: 20px; 
        display: flex;
        align-items: center;
        justify-content: center;
    }
        .card-2:hover {
                opacity: 0.7 
            }

        .card-2:hover .wishlist-btn-2,
        .card-2:hover .add-to-cart-btn-2 {
            opacity: 5; 
        }
        .rating-section {
                    display: flex;
            flex-direction: column;
            align-items: flex-start; 
            margin: 10px 0;
        }

        .rating-title {
        font-size: 1.2em;
        margin-bottom: 5px;
        text-align: left; 
        font-weight: bold;
        }

        .rating-item {
        display: flex;
        align-items: center;
        margin-bottom: 5px;
        }

        .rating-stars {
        font-size: 1.5em;
        color: #f0ad4e;
        font-size: 11px; 
        }

        .rating-text {
        margin-left: 10px;
        }
        .rating-section{
            position: absolute;
            top: 90%;
            left: 0;
            transform: translateY(-50%);
            left: 4%;
        }

         input[type="radio"] {
        
        width: 17px;
        height: 17px;
        margin-right: 10px; 
        
        }
        .language-selection {
            position: absolute;
            left: 0;
            transform: translateY(-50%);
            left: 2%;
            margin-top: 325px;
        }

        .language-option {
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        line-height: 0.5;
        }

        .language-option input[type="radio"] {
        margin-right: 1rem;
        }

        .language-title {
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 1.2em;
        }

        .video-duration {
        position: absolute;
        left: 0;
        transform: translateY(-50%);
        left: 4.5%;
        margin-top: 550px;

        }

        .video-duration h3 {
            font-weight: bold;
            margin-bottom: 20px;
            font-size: 1.2em;
        }

        .video-duration-list {
        list-style: none;
        margin: 0;
        padding: 0;
        line-height: 0.5;
        }

        .video-duration-item {
        margin-bottom: 0.5rem;
        }

        section {
        margin-bottom: 20px; 
        }

        .container {
            max-width: 1100px;
            max-height: 400px; 
            margin: 0 auto;
        }
        .container-2 {
            max-width: 1200px; 
            margin: 0 auto; 
        }

        


        
     
    </style>

</head>
<body>

    <!--section 1-->
<section>
<div class="container">
    <h1 class="text-center mb-4">Recent Courses</h1>

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="false">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row">
                    
                    <div class="col-md-3">
                        <div class="card">
                            <img src="https://source.unsplash.com/random/1920x1080" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h8 class="card-title">Correct and Beautiful Design Interaction. </h8>
                                <p class="card-text">360 photos</p>
                                     <div class="rating ml-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <div class="price">$100</div>
                                
      
                                <button class="add-to-cart-btn"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                                <button class="wishlist-btn"><i class="fas fa-heart"></i> </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="https://source.unsplash.com/random/1920x1080" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h8 class="card-title">Correct and Beautiful Design Interaction. </h8>
                                <p class="card-text">360 photos</p>
                                
                                
                                <div class="rating ml-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <div class="price">$100</div>
                                <button class="wishlist-btn"><i class="fas fa-heart"></i> </button>
      
                                <button class="add-to-cart-btn"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <img src="https://source.unsplash.com/random/1920x1080" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h8 class="card-title">Correct and Beautiful Design Interaction. </h8>
                                <p class="card-text">360 photos</p>
                                
                                
                                <div class="rating ml-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <div class="price">$100</div>

                                <button class="wishlist-btn"><i class="fas fa-heart"></i> </button>
      
                                <button class="add-to-cart-btn"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                                
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <img src="https://source.unsplash.com/random/1920x1080" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h8 class="card-title">Correct and Beautiful Design Interaction. </h8>
                                <p class="card-text">360 photos</p>
                                
                                
                                <div class="rating ml-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <div class="price">$100</div>
                                <button class="wishlist-btn"><i class="fas fa-heart"></i> </button>
      
                                <button class="add-to-cart-btn"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <img src="https://source.unsplash.com/random/1920x1080" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h8 class="card-title">Correct and Beautiful Design Interaction. </h8>
                                <p class="card-text">360 photos</p>
                                
                                
                                <div class="rating ml-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <div class="price">$100</div>
                                <button class="wishlist-btn"><i class="fas fa-heart"></i> </button>
      
                                <button class="add-to-cart-btn"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    
                    
                
                </div>
            </div>
            <div class="carousel-item">
                <div class="row">
                    
                    <div class="col-md-3">
                        <div class="card">
                            <img src="https://source.unsplash.com/random/1920x1080" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h8 class="card-title">Correct and Beautiful Design Interaction. </h8>
                                <p class="card-text">360 photos</p>
                                
                                
                                <div class="rating ml-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <div class="price">$100</div>
                                <button class="wishlist-btn"><i class="fas fa-heart"></i> </button>
      
                                <button class="add-to-cart-btn"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <img src="https://source.unsplash.com/random/1920x1080" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h8 class="card-title">Correct and Beautiful Design Interaction. </h8>
                                <p class="card-text">360 photos</p>
                                
                      
                                <div class="rating ml-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <div class="price">$100</div>
                                <button class="wishlist-btn"><i class="fas fa-heart"></i> </button>
      
                                <button class="add-to-cart-btn"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <img src="https://source.unsplash.com/random/1920x1080" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h8 class="card-title">Correct and Beautiful Design Interaction. </h8>
                                <p class="card-text">360 photos</p>
                                
                                
                                <div class="rating ml-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <div class="price">$100</div>
                                <button class="wishlist-btn"><i class="fas fa-heart"></i> </button>
      
                                <button class="add-to-cart-btn"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <img src="https://source.unsplash.com/random/1920x1080" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h8 class="card-title">Correct and Beautiful Design Interaction. </h8>
                                <p class="card-text">360 photos</p>
                                
                                
                                <div class="rating ml-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <div class="price">$100</div>
                                <button class="wishlist-btn"><i class="fas fa-heart"></i> </button>
      
                                <button class="add-to-cart-btn"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="https://source.unsplash.com/random/1920x1080" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h8 class="card-title">Correct and Beautiful Design Interaction. </h8>
                                <p class="card-text">360 photos</p>
                                
                              
                                <div class="rating ml-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <div class="price">$100</div>
                                <button class="wishlist-btn"><i class="fas fa-heart"></i> </button>
      
                                <button class="add-to-cart-btn"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                            </div>
                        </div>
                    </div>


                    
                </div>
            </div>


            <div class="carousel-item">
                <div class="row">
                    
                    <div class="col-md-3">
                        <div class="card">
                            <img src="https://source.unsplash.com/random/1920x1080" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h8 class="card-title">Correct and Beautiful Design Interaction. </h8>
                                <p class="card-text">360 photos</p>
                                
                                
                                <div class="rating ml-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <div class="price">$100</div>
                                <button class="wishlist-btn"><i class="fas fa-heart"></i> </button>
      
                                <button class="add-to-cart-btn"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <img src="https://source.unsplash.com/random/1920x1080" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h8 class="card-title">Correct and Beautiful Design Interaction. </h8>
                                <p class="card-text">360 photos</p>
                                
                                
                                <div class="rating ml-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <div class="price">$100</div>
                                <button class="wishlist-btn"><i class="fas fa-heart"></i> </button>
      
                                <button class="add-to-cart-btn"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <img src="https://source.unsplash.com/random/1920x1080" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h8 class="card-title">Correct and Beautiful Design Interaction. </h8>
                                <p class="card-text">360 photos</p>
                                
                                
                                <div class="rating ml-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <div class="price">$100</div>
                                <button class="wishlist-btn"><i class="fas fa-heart"></i> </button>
      
                                <button class="add-to-cart-btn"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <img src="https://source.unsplash.com/random/1920x1080" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h8 class="card-title">Correct and Beautiful Design Interaction. </h8>
                                <p class="card-text">360 photos</p>
                                
                              
                                <div class="rating ml-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <div class="price">$100</div>
                                <button class="wishlist-btn"><i class="fas fa-heart"></i> </button>
      
                                <button class="add-to-cart-btn"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <img src="https://source.unsplash.com/random/1920x1080" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h8 class="card-title">Correct and Beautiful Design Interaction. </h8>
                                <p class="card-text">360 photos</p>
                                
                              
                                <div class="rating ml-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <div class="price">$100</div>
                                <button class="wishlist-btn"><i class="fas fa-heart"></i> </button>
      
                                <button class="add-to-cart-btn"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
            
            
            
            
            
        </div>
        <button class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </button>
    </div>

    
</div>
</section>
<!--section 2-->
<section>
<div class="container-2">
    <h1 class="text-center mb-4">Laravel Courses</h1>
   
    <section>
        <div class="rating-section">
            <span class="rating-title">Ratings</span>
            <div class="rating-item">
                <input type="radio" name="rating" id="rating5" class="rating-radio">
                <label for="rating5">
                    <span class="rating-stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </span>
                </label>
              <span class="rating-text">4.5 & up (1,114)</span>
            </div>
            <div class="rating-item">
                <input type="radio" name="rating" id="rating4" class="rating-radio">
                <label for="rating5">
                    <span class="rating-stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </span>
                </label>
              <span class="rating-text">4.0 & up (2,035)</span>
            </div>
            <div class="rating-item">
                <input type="radio" name="rating" id="rating3" class="rating-radio">
                <label for="rating5">
                    <span class="rating-stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </span>
                </label>
              <span class="rating-text">3.5 & up (2,461)</span>
            </div>
            <div class="rating-item">
                <input type="radio" name="rating" id="rating2" class="rating-radio">
                <label for="rating5">
                    <span class="rating-stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </span>
                </label>
              <span class="rating-text">3.0 & up (2,602)</span>
            </div>
            <div class="language-selection">
                <h4 class="language-title">Language</h4>

                <div class="language-option">
                  <input type="radio" id="english" name="language" value="english">
                  <label for="english">English</label>
                </div>
                <div class="language-option">
                  <input type="radio" id="spanish" name="language" value="spanish">
                  <label for="spanish">Español</label>
                </div>
                <div class="language-option">
                  <input type="radio" id="portuguese" name="language" value="portuguese">
                  <label for="portuguese">Português</label>
                </div>
                <div class="language-option">
                  <input type="radio" id="french" name="language" value="french">
                  <label for="french">Français</label>
                </div>
              </div>
          </div>
          
          <div class="video-duration">
            <h3>Video Duration</h3>
            <ul class="video-duration-list">
              <li class="video-duration-item">
                <input type="radio" id="duration-0-1" name="duration" value="0-1">
                <label for="duration-0-1">0-1 Hour (277)</label>
              </li>
              <li class="duration-video-item">
                <input type="radio" id="duration-1-3" name="duration" value="1-3">
                <label for="duration-1-3">1-3 Hours (801)</label>
              </li>
              <li class="video-duration-item">
                <input type="radio" id="duration-3-6" name="duration" value="3-6">
                <label for="duration-3-6">3-6 Hours (639)</label>
              </li>
              <li class="video-duration-item">
                <input type="radio" id="duration-6-17" name="duration" value="6-17">
                <label for="duration-6-17">6-17 Hours (755)</label>
              </li>
              <li class="video-duration-item">
                <input type="radio" id="duration-17+" name="duration" value="17+">
                <label for="duration-17+">17+ Hours (471)</label>
              </li>
            </ul>
          </div>
    </section>
    
    
    <div class="row-1 mb-4">
        <div class="col-md-3">
            <div class="card-2">
                <div class="row no-gutters">
                    <div class="col-md-3 ">
                        <img src="https://source.unsplash.com/random/1920x1080" class="card-img" alt="..." style="height: 140px; width: 250px;">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body-2">
                            <h8 class="card-title-2">Master Laravel for Beginners & Intermediate 2024 </h8>
                            <p class="card-text-1">Master Laravel 10: Build 5 Real-World Projects! Unlock Web Development Skills with In-Demand PHP Framework!</p>
                            <p class="card-text-2">Web solution US |50000+ Students</p>
                            <div class="rating-container">
                                <span class="rating-text">4.0</span>
                                <div class="rating ml-2 mb-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <span class="rating-text-2">(1526)</span>
                            </div>
                            <p class="card-text-3">141 total hours | 568 lectures | All Levels</p>
                            <div class="text-left">
                                
                                <div class="price-2">$100</div>
                            </div>
                            <button class="wishlist-btn-2"><i class="fas fa-heart"></i> </button>
      
                            <button class="add-to-cart-btn-2"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

        
       

        
        
        
        
    </div>
    <div class="row-1 mb-4">
        <div class="col-md-3">
            <div class="card-2">
                <div class="row no-gutters">
                    <div class="col-md-3">
                        <img src="https://source.unsplash.com/random/1920x1080" class="card-img" alt="..." style="height: 140px; width: 250px;">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body-2">
                            <h8 class="card-title-2">Master Laravel for Beginners & Intermediate 2024 </h8>
                            <p class="card-text-1">Master Laravel 10: Build 5 Real-World Projects! Unlock Web Development Skills with In-Demand PHP Framework!</p>
                            <p class="card-text-2">Web solution US |50000+ Students</p>
                            <div class="rating-container">
                                <span class="rating-text">4.0</span>
                                <div class="rating ml-2 mb-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <span class="rating-text-2">(1526)</span>
                            </div>
                            <p class="card-text-3">141 total hours | 568 lectures | All Levels</p>
                            <div class="text-left">
                                
                                <div class="price-2">$100</div>
                            </div>
                            <button class="wishlist-btn-2"><i class="fas fa-heart"></i> </button>
      
                            <button class="add-to-cart-btn-2"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                            
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

        
        
        
        
    </div>
    <div class="row-1 mb-4">
        <div class="col-md-3">
            <div class="card-2">
                <div class="row no-gutters">
                    <div class="col-md-3">
                        <img src="https://source.unsplash.com/random/1920x1080" class="card-img" alt="..." style="height: 140px; width: 250px;">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body-2">
                            <h8 class="card-title-2">Master Laravel for Beginners & Intermediate 2024 </h8>
                            <p class="card-text-1">Master Laravel 10: Build 5 Real-World Projects! Unlock Web Development Skills with In-Demand PHP Framework!</p>
                            <p class="card-text-2">Web solution US |50000+ Students</p>
                            <div class="rating-container">
                                <span class="rating-text">4.0</span>
                                <div class="rating ml-2 mb-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <span class="rating-text-2">(1526)</span>
                            </div>
                            <p class="card-text-3">141 total hours | 568 lectures | All Levels</p>
                            <div class="text-left">
                                
                                <div class="price-2">$100</div>
                            </div>
                            <button class="wishlist-btn-2"><i class="fas fa-heart"></i> </button>
      
                            <button class="add-to-cart-btn-2"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                            
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

        
        
        
        
    </div>
    <div class="row-1 mb-4">
        <div class="col-md-3">
            <div class="card-2">
                <div class="row no-gutters">
                    <div class="col-md-3">
                        <img src="https://source.unsplash.com/random/1920x1080" class="card-img" alt="..." style="height: 140px; width: 250px;">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body-2">
                            <h8 class="card-title-2">Master Laravel for Beginners & Intermediate 2024 </h8>
                            <p class="card-text-1">Master Laravel 10: Build 5 Real-World Projects! Unlock Web Development Skills with In-Demand PHP Framework!</p>
                            <p class="card-text-2">Web solution US |50000+ Students</p>
                            <div class="rating-container">
                                <span class="rating-text">4.0</span>
                                <div class="rating ml-2 mb-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <span class="rating-text-2">(1526)</span>
                            </div>
                            <p class="card-text-3">141 total hours | 568 lectures | All Levels</p>
                            <div class="text-left">
                                
                                <div class="price-2">$100</div>
                            </div>
                            <button class="wishlist-btn-2"><i class="fas fa-heart"></i> </button>
      
                            <button class="add-to-cart-btn-2"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                            
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

        
        
        
        
    </div>
    <div class="row-1 mb-4">
        <div class="col-md-3">
            <div class="card-2">
                <div class="row no-gutters">
                    <div class="col-md-3">
                        <img src="https://source.unsplash.com/random/1920x1080" class="card-img" alt="..." style="height: 140px; width: 250px;">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body-2">
                            <h8 class="card-title-2">Master Laravel for Beginners & Intermediate 2024 </h8>
                            <p class="card-text-1">Master Laravel 10: Build 5 Real-World Projects! Unlock Web Development Skills with In-Demand PHP Framework!</p>
                            <p class="card-text-2">Web solution US |50000+ Students</p>
                            <div class="rating-container">
                                <span class="rating-text">4.0</span>
                                <div class="rating ml-2 mb-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <span class="rating-text-2">(1526)</span>
                            </div>
                            <p class="card-text-3">141 total hours | 568 lectures | All Levels</p>
                            <div class="text-left">
                                
                                <div class="price-2">$100</div>
                            </div>
                            <button class="wishlist-btn-2"><i class="fas fa-heart"></i> </button>
      
                            <button class="add-to-cart-btn-2"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                            
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

        
        
        
        
    </div>
    
</div>

</div>
</section>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>


