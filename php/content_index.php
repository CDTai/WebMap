<div class="container-fluid">
  <div class="row">
    <div class="col-sm-8" style="background-color: red;">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>

          <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="img/slide3.jpg"  class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="img/slide2.jpg"  class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="img/silde1.png" class="d-block w-100" alt="...">
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
      <div id="noidung">
        <div>
          <h3>Tiêu đề bản tin</h3>
        </div>
        <div>
          Nội dung bản tin
        </div>
      </div>
    </div>
    <div class="col-sm-4" style="background-color: blue;">
      <div class="well">
        <h4>Search</h4>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <button class="btn btn-outline-secondary" style="width: 40px; height: 38px; margin-top: 10px;" type="button"><i class="fas fa-search"></i></button>
            </div>
                 <input type="text" class="form-control" placeholder="Tìm kiếm tin" aria-label="" aria-describedby="basic-addon1" wight="100px;">
            </div>
      </div>
      <div class="well">
        <h4>Thông tin</h4>
        <div>
          <p>Nội dung thông tin</p>
        </div>
      </div>
      <div class="well">
         <div id="calendar-container">
            <div id="calendar-header">
                <span id="calendar-month-year"></span>
            </div>
            <div id="calendar-dates">
            </div>
        </div>
      </div>
    </div>
  </div>
</div>