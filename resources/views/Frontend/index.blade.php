<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,             initial-scale=1">
	<title>Dhago ko Chura</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');
  /* public/css/styles.css */

/* Style for the "Add to Cart" button */
button.addToCart {
    padding: 10px 15px;
    background-color: #3490dc;
    color: #ffffff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

/* Hover effect */
button.addToCart:hover {
    background-color: #2779bd;
}

  </style>

</head>



<body>
      <header>
        	<a id="titledesign" style="text-decoration: none; color: black; font-size: 20px;" href="#" class="logo">
      	 	  <img src="/images/Dhago.PNG" alt="" width="100px">
              <span>DhagoKoChura</span>
        	</a>

        	<nav class="navbar">
      		  <a style="text-decoration: none; font-family:'Times New Roman', Times, serif;" href="#home">Home</a>
      		  <a style="text-decoration: none;font-family:'Times New Roman', Times, serif" href="#about">About</a>
      		  <a style="text-decoration: none;font-family:'Times New Roman', Times, serif" href="#products">Products</a>
      		  <a style="text-decoration: none;font-family:'Times New Roman', Times, serif" href="#review">Review</a>
      		  <a style="text-decoration: none;font-family:'Times New Roman', Times, serif" href="#contact">Contact</a>
              @if(auth()->user())
              <a style="color: red; font-size:20px">
                <span style="color: black; font-size:10px; margin-top:-10px">signed in as</span><br>
                {{auth()->user()->email}}
            </a>
              @else
      		  <a style="text-decoration: none;font-family:'Times New Roman', Times, serif; font-weight: 100;" href="/login">Login</a>
      		  <a style="text-decoration: none;font-family:'Times New Roman', Times, serif" href="/register">Register</a>
                @endif
            </nav>
      </header>

      <div style="margin-top: 2px;" class="home" id="home">
            <div class="content">
            <img src="images/1.JPG" >
            <div class="overlapped-text">
                <span> Handmade with Love </span>
                <p>Beautiful handmade silk thread <br>bangles customized as per your <br> requirement.</p>
                <a  href="#products"><button style="height: 50px; width: 100px;" type="button" class="btn btn-dark">Shop Now</button></a>
            </div>
            </div>

      </div>



      <section class="about container-fluid" id="about">
         <h1 class="heading"> About Us </h1>
          <div style="align-items: revert; margin-left: 30px;margin-right: 30px;" class="row">
          <div  style="align-items: revert; height: 450px;" class="video-container">
                 <video height="30px" width="3px" src="images/6.MOV" loop autoplay muted></video>
                 <h3>Our Best Seller</h3>
              </div>
            <div class="content">
               <p style="color: brown;">Dhago ko Chura is a small family business started by a Manandhar Family in 2076 B.S. It is an attempt to help pick up that gorgeous eco-friendly jewellery that has been handcrafted with love for the special you and your loved ones. Dhago ko Chura offers you with different colours, sizes, designs and work in silk thread bangles at the best price. You can simply pick the best piece for yourself and enhance the beauty of your outfit. </p>

            </div>
          </div>
      </section>

      <section class="icons-container">

    <div class="icons">
        <img src="imagDhago.png" alt="">
        <div class="info">
            <h3>Delivery Worldwide</h3>
            <span>Express delivery service in Nepal</span>
        </div>
    </div>

    <div class="icons">
        <img src="images/ii.png" alt="">
        <div class="info">
            <h3>Secured Payment</h3>
            <span>Payments via e-Sewa or Bank Transfer</span>
        </div>
    </div>


    <div class="icons">
        <img src="images/iv.png" alt="">
        <div class="info">
            <h3>Pre-order System</h3>
            <span>Making time 7-10 days</span>
        </div>
    </div>

</section>


      <section class="products" id="products">

    <h1 class="heading">Products</h1>

    <div class="box-container">

        @foreach( $products as $product)
        <div class="box">
            <div class="image">
                <img src="/images/products/{{$product->image}}" alt="">
                <div class="icons">
                    <a style="text-decoration: none" href="/like/{{$product->id}}" class="fas fa-heart"> {{$product->likes}}</a>
                    <a style="text-decoration: none" href="/order/{{$product->id}}" class="cart-btn">order</a>
                    <!-- resources/views/your-view.blade.php -->



                    <a style="text-decoration: none" href="#" class="fas fa-share"></a>
                </div>
            </div>
            <div class="content">
                <h3>{{ $product->name }}</h3>
                <div class="price">{{ $product->price }}/-</div>
            </div>
            <form action="/addtocart/{{$product->id}}" method="get">
    <button class="btn btn-primary" type="submit">Add to Cart</button>
</form>
        </div>

        @endforeach

    </div>

</section>


<section class="review" id="review">

<h1 class="heading"> Customer's Review</span> </h1>

<div class="box-container">

    <div class="box">
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <p>I really liked the finishing of the product. The service is very genuine as the product displayed was as same as the product I received.</p>
        <div class="user">
            <img src="images/2.jpg" alt="">
            <div class="user-info">
                <h3>Sumikshya Poudel</h3>
                <span>Happy Customer</span>
            </div>
        </div>
    </div>

    <div class="box">
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <p>The delivery service was quite fast.My order was delivered 2 days before. And also they have a simple and safe packaging.</p>
        <div class="user">
            <img src="images/3.jpg" alt="">
            <div class="user-info">
                <h3>Jyotika Aryal</h3>
                <span>Happy Customer</span>
            </div>
        </div>
    </div>

    <div class="box">
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <p>What I love about this online page is their customer service. Their politeness help them stand out. Absolutely would love to shop more!</p>
        <div class="user">
            <img src="images/4.jpg" alt="">
            <div class="user-info">
                <h3>Sajiva Shakya</h3>
                <span>Happy Customer</span>
            </div>
        </div>
    </div>

</div>

</section>

<section class="contact" id="contact">

    <h1 class="heading">Contact Us </h1>

    <div class="row">

        <form action="">
            <input type="text" placeholder="Name" class="box">
            <input type="email" placeholder="example@email.com" class="box">
            <input type="number" placeholder="**********" class="box">
            <textarea name="" class="box" placeholder="Message" id="" cols="30" rows="10"></textarea>
            <label for="country">Country</label>
            <select id="country" name="country">
            <option value="Kathmandu">Kathmandu</option>
            <option value="Lalitpur">Lalitpur</option>
            <option value="Bhaktapur">Bhaktapur</option>
            <option value="Outside Valley">Outside Valley</option>
            <option value="Outside Nepal">Outside Nepal</option>
            <input type="Submit" value="Send Message" class="btn">
        </form>

        <div class="image">
            <img src="images/5.jpg" alt="">
        </div>

    </div>

</section>


<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>Quick Links</h3>
            <a href="#home">home</a>
            <a href="#about">about</a>
            <a href="#products">products</a>
            <a href="#review">review</a>
            <a href="#contact">contact</a>
        </div>

        <div class="box">
            <h3>Extra Links</h3>
            <a href="#" src="www.facebook.com">Facebook</a>
            <a href="#">Instagram</a>
            <a href="#">Tiktok</a>
        </div>

        <div class="box">
            <h3>Contact Info</h3>
            <a >+977 9803940200</a>
            <a >dhagokochura@gmail.com</a>
            <a >Basantapur, Kathmandu, Nepal</a>
        </div>

    </div>
    <div class="credit"> Created by <span title="dhagokochura" id="cc" style="color: lime;}">Dhago ko Chura </span> | All Rights Reserved </div> </div>
</section>
<script src="/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
