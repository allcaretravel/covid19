 <!-- Sidebar -->
 <nav
 id="sidebarMenu"
 class="collapse d-lg-block sidebar collapse bg-white"
 >
<div class="position-sticky">
<div class="list-group list-group-flush mx-3 mt-4">
  <a
     href="#"
     class="list-group-item list-group-item-action py-2 ripple"
     aria-current="true"
     >
    <i class="fas fa-tachometer-alt fa-fw me-3"></i
      ><span>Dashboard</span>
  </a>


  <a
  href=" {{ url('/sign_out') }} "
  class="list-group-item list-group-item-action py-2 ripple"
  aria-current="true"
  >
  <i class="fal fa-sign-out"></i><span>Logout</span>
</a>
  
</div>
</div>
</nav>
<!-- Sidebar -->