<!DOCTYPE html>
<html lang="en">
@include('includes.header')
<style>
  body {
  background-color: #fbfbfb;
}
@media (min-width: 991.98px) {
  main {
    padding-left: 240px;
  }
}

/* Sidebar */
.sidebar {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  padding: 58px 0 0; /* Height of navbar */
  box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
  width: 240px;
  z-index: 600;
}

@media (max-width: 991.98px) {
  .sidebar {
    width: 100%;
  }
}
.sidebar .active {
  border-radius: 5px;
  box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
}

.sidebar-sticky {
  position: relative;
  top: 0;
  height: calc(100vh - 48px);
  padding-top: 0.5rem;
  overflow-x: hidden;
  overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
}
</style>
<body>
  
  <!--Main Navigation-->
<header>
  
<?php 
       $label = [];
        $data = [];
        foreach ($totalCase_by_day as $row) {
            $label[] = $row->caseByDay;
            $data[] =  $row->totalCase;
        }
?>

 @include('includes.sidebar')

  <!-- Navbar -->
  <nav
       id="main-navbar"
       class="navbar navbar-expand-lg navbar-light bg-white fixed-top"
       >
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Toggle button -->
      <button
              class="navbar-toggler"
              type="button"
              data-mdb-toggle="collapse"
              data-mdb-target="#sidebarMenu"
              aria-controls="sidebarMenu"
              aria-expanded="false"
              aria-label="Toggle navigation"
              >
        <i class="fas fa-bars"></i>
      </button>

      <!-- Brand -->
      <a class="navbar-brand" href="#">
        Covid-19 Tracker
      </a>
  
      <!-- Right links -->
      <ul class="navbar-nav ms-auto d-flex flex-row">
        <!-- Notification dropdown -->
        <li class="nav-item dropdown">
          <a
             class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow"
             href="#"
             id="navbarDropdownMenuLink"
             role="button"
             data-mdb-toggle="dropdown"
             aria-expanded="false"
             >
            <i class="fas fa-bell"></i>
            <span class="badge rounded-pill badge-notification bg-danger"
                  >1</span
              >
          </a>
          <ul
              class="dropdown-menu dropdown-menu-end"
              aria-labelledby="navbarDropdownMenuLink"
              >
            <li><a class="dropdown-item" href="#">Some news</a></li>
            <li><a class="dropdown-item" href="#">Another news</a></li>
            <li>
              <a class="dropdown-item" href="#">Something else here</a>
            </li>
          </ul>
        </li>

        <!-- Icon -->
        <li class="nav-item">
          <a class="nav-link me-3 me-lg-0" href="#">
            <i class="fas fa-fill-drip"></i>
          </a>
        </li>
        <!-- Icon -->
        <li class="nav-item me-3 me-lg-0">
          <a class="nav-link" href="#">
            <i class="fab fa-github"></i>
          </a>
        </li>

        <!-- Icon dropdown -->
        <li class="nav-item dropdown">
          <a
             class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow"
             href="#"
             id="navbarDropdown"
             role="button"
             data-mdb-toggle="dropdown"
             aria-expanded="false"
             >
            <i class="united kingdom flag m-0"></i>
          </a>
          <ul
              class="dropdown-menu dropdown-menu-end"
              aria-labelledby="navbarDropdown"
              >
            <li>
              <a class="dropdown-item" href="#"
                 ><i class="united kingdom flag"></i>English
                <i class="fa fa-check text-success ms-2"></i
                  ></a>
            </li>
            <li><hr class="dropdown-divider" /></li>
            <li>
              <a class="dropdown-item" href="#"
                 ><i class="poland flag"></i>Polski</a
                >
            </li>
            <li>
              <a class="dropdown-item" href="#"
                 ><i class="china flag"></i>中文</a
                >
            </li>
            <li>
              <a class="dropdown-item" href="#"
                 ><i class="japan flag"></i>日本語</a
                >
            </li>
            <li>
              <a class="dropdown-item" href="#"
                 ><i class="germany flag"></i>Deutsch</a
                >
            </li>
            <li>
              <a class="dropdown-item" href="#"
                 ><i class="france flag"></i>Français</a
                >
            </li>
            <li>
              <a class="dropdown-item" href="#"
                 ><i class="spain flag"></i>Español</a
                >
            </li>
            <li>
              <a class="dropdown-item" href="#"
                 ><i class="russia flag"></i>Русский</a
                >
            </li>
            <li>
              <a class="dropdown-item" href="#"
                 ><i class="portugal flag"></i>Português</a
                >
            </li>
          </ul>
        </li>

        <!-- Avatar -->
        <li class="nav-item dropdown">
          <a
             class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center"
             href="#"
             id="navbarDropdownMenuLink"
             role="button"
             data-mdb-toggle="dropdown"
             aria-expanded="false"
             >
            <img
                 src="https://mdbootstrap.com/img/Photos/Avatars/img (31).jpg"
                 class="rounded-circle"
                 height="22"
                 alt=""
                 loading="lazy"
                 />
          </a>
          <ul
              class="dropdown-menu dropdown-menu-end"
              aria-labelledby="navbarDropdownMenuLink"
              >
            <li><a class="dropdown-item" href="#">My profile</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->
</header>
<!--Main Navigation-->

<!--Main layout-->
<main style="margin-top: 58px">
  <div class="container pt-4">
<h3 class="text-center text-primary mb-4"> Covid-19 Tracker </h3>
    <!--Section: Minimal statistics cards-->
    <section>
      <div class="row">
        <div class="col-xl-3 col-sm-6 col-12 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between px-md-1">
                <div>
                  <h3 class="text-primary"> {{ $sumPatient }} </h3>
                  <p class="mb-0">Total Case</p>
                </div>
                <div class="align-self-center">
                  <i class="fas fa-user text-primary fa-3x"></i>
                </div>
              </div>
              {{-- <div class="px-md-1 mt-2">
                <p class="text-warning"> ថ្មី  <span class="badge badge-warning"> 10</span></p>
              </div> --}}
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between px-md-1">
                <div>
                  <h3 class="text-warning"> {{ $sumPatient - ($sumRecover + $sumDead) }} </h3>
                  <p class="mb-0">Treatment Case</p>
                </div>
                <div class="align-self-center">
                  <i class="fas fa-user text-warning fa-3x"></i>
                </div>
              </div>
              {{-- <div class="px-md-1 mt-2">
                <p class="text-warning"> ថ្មី  <span class="badge badge-warning"> 10</span></p>
              </div> --}}
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between px-md-1">
                <div>
                  <h3 class="text-success"> {{ $sumRecover }} </h3>
                  <p class="mb-0">Recover Case</p>
                </div>
                <div class="align-self-center">
                  <i class="fas fa-user text-success fa-3x"></i>
                </div>
              </div>
              {{-- <div class="px-md-1 mt-2">
                <p class="text-success"> ថ្មី  <span class="badge badge-success"> 10</span></p>
              </div> --}}
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between px-md-1">
                <div>
                  <h3 class="text-danger"> {{ $sumDead }} </h3>
                  <p class="mb-0">Dead Case</p>
                </div>
                <div class="align-self-center">
                  <i class="fas fa-user text-danger fa-3x"></i>
                </div>
              </div>
              {{-- <div class="px-md-1 mt-2">
                <p class="text-danter"> ថ្មី  <span class="badge badge-danger"> 10</span></p>
              </div> --}}
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--Section: Minimal statistics cards-->

    <!-- Section: Main chart -->
    <section class="mb-4">
      <div class="card">
        <div class="card-header py-3">
          <h5 class="mb-0 text-center"><strong>  Daily Case By Day  </strong></h5>
        </div>
        <div class="card-body">
          <canvas class="my-4 w-100" id="myChart" height="380"></canvas>
        </div>
      </div>
    </section>
    <!-- Section: Main chart -->

    <!--Section: Sales Performance KPIs-->
    <section class="mb-4">
      <div class="card">
        <div class="card-header text-center py-3">
          <div class="d-flex justify-content-end">
            <form action="">
              <select  class="form-control" id="area">
                <option value="">-- Select Area --</option>
                @foreach($areaList as $row)
                <option value=" {{ $row->id }} ">  {{ $row->area_name }}  </option>
                @endforeach
              </select>
            </form>
          </div>
          <h5 class="mb-0 text-center">
            <strong> Daily Case By Area</strong>
          </h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th scope="col"></th>
                  <th scope="col" class="text-warning">Patient Case</th>
                  <th scope="col" class="text-warning">Treatment Case</th>
                  <th scope="col" class="text-success">Recover Case</th>
                  <th scope="col" class="text-danger">Dead Case</th>
                </tr>
              </thead>
              <tbody id="dailyAreaTable">
               @foreach($areaData as $row)
<tr>
  <th>{{ $row->area_name }}</th>
  <th> {{$row->tCase}} </th>
  <th> {{$row->tCase - ($row->tRecoverCase + $row->tDeadCase) }} </th>
  <th> {{ $row->tRecoverCase }} </th>
  <th> {{ $row->tDeadCase }} </th>
</tr>
               @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
    <!--Section: Sales Performance KPIs-->
  </div>
</main>
<!--Main layout-->
  @include('includes.footer')
  @include('includes.scripts')
  <script>
    // Graph
var ctx = document.getElementById("myChart");

var myChart = new Chart(ctx, {
  type: "line",
  data: {
    labels: <?php echo json_encode($label, JSON_NUMERIC_CHECK) ?>,
    datasets: [
      {
        data: <?php echo json_encode($data, JSON_NUMERIC_CHECK) ?>,
        lineTension: 0,
        backgroundColor: "transparent",
        borderColor: "#007bff",
        borderWidth: 4,
        pointBackgroundColor: "#007bff",
      },
    ],
  },
  options: {
    scales: {
      yAxes: [
        {
          ticks: {
            beginAtZero: false,
          },
        },
      ],
    },
    legend: {
      display: false,
    },
  },
});
  </script>

<script>

$(function(){

$(document).on('change','#area', function(){
var areaid  = $(this).val();
filterArea(areaid);
if(areaid == "")
{
  window.location.reload();
}
});

});


function filterArea(areaid)
{
  $.ajax({
    type: "GET",
    url:  "{{ route('filterArea') }}" ,
    data: { areaid : areaid },
    dataType: "JSON",
    success: function (response) {
      $('#dailyAreaTable').html(response);
    }
  });
}

</script>

</body>
</html>