<section id="hero" class="d-flex align-items-center">
  <div class="container">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="assets/img/bg1.jpg" alt="First slide">
          <div class="carousel-caption d-md-block text-right">
            <br>
            <br>
            <br>
            <br>
            <h5>Popular This Week</h5>
            <p>Dhaka’s changing nightlife</p>
            <button class="btn btn-read-now"><a href="http://localhost/Blog/index.php?page=preview_post&id=8">Read Now</a></button>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="assets/img/gen.jpg" alt="Second slide">
          <div class="carousel-caption d-md-block text-right">
            <br>
            <br>
            <br>
            <br>
            <h5>Popular This Week</h5>
            <p>How to apply design thinking in data science.</p>
            <button class="btn btn-read-now"><a href="http://localhost/Blog/index.php?page=preview_post&id=15">Read Now</a></button>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="assets/img/bg6.jpg" alt="Third slide">
          <div class="carousel-caption d-md-block text-right">
            <br>
            <br>
            <br>
            <br>
            <h5>Popular This Week</h5>
            <p>Singapore Data Platform Raises $105M, Revenue Surges Sevenfold.</p>
            <button class="btn btn-read-now"><a href="http://localhost/Blog/index.php?page=preview_post&id=14">Read Now</a></button>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</section>
<section class="d-flex align-items-center">
  <div class="container">
    <?php
      $qry = $conn->query("SELECT p.*,c.name as category from posts p inner join category c on c.id = p.category_id where p.status = 1 order by date(p.date_published) desc limit 5");
      while($row=$qry->fetch_assoc()){
    ?>
    <div class="card col-md-12 list-items"  data-id="<?php echo $row['id'] ?>">
      <div class="card-body">
        <div class="row">
          <div class="col-md-4">
            <center><img src="assets/img/<?php echo $row['img_path'] ?>" alt="" class='col-sm-10'></center>
          </div>
          <div class="col-md-8 truncate">
            <h3><b><?php echo $row['title'] ?></b></h3>
            <p class="text-truncate">
              <?php echo html_entity_decode($row['post']) ?>
            </p>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</section>
<footer class="d-flex justify-content-center">©copyright 2024. All right reserved.</footer>
<style type="text/css">
  .list-items p {
    text-align: left !important;
  }
  .list-items {
    cursor: pointer;
  }
  .truncate {
    max-height: 10vw;
    overflow: hidden;
  }
  .carousel-caption {
    padding: 15px;
    top: 15px;
    right: 15px;
    bottom: auto;
    left: auto;
    transform: none;
    text-align: right;
  }
  .carousel-caption h5,
  .carousel-caption p,
  .carousel-caption .btn-read-now {
    margin-bottom: 15px;
  }
  .btn-read-now {
    background: linear-gradient(to right, tomato, yellow);
    border: none;
    padding: 10px 20px;
  }
  .btn-read-now a {
    color: white;
    text-decoration: none;
  }
  .btn-read-now a:hover {
    color: black;
    text-decoration: none;
  }
  .carousel-inner {
    padding-bottom: 100px;
  }
</style>
<script>
  $(document).ready(function(){
    $('.list-items').click(function(){
      location.replace('index.php?page=preview_post&id='+$(this).attr('data-id'))
    })
  })
</script>
