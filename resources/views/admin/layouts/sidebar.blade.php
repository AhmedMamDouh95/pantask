   <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
               <ul class="nav metismenu" id="side-menu">
                  <li class="nav-header">
                     <div class=" profile-element"> 
                        <span>
                        <img alt="image" class="img-circle" src="{{ asset('img/logo.jpg') }}" style="max-width: 50px; max-height: 50px;" />
                        </span>
                        <a>
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Pan Arab Media</strong>
                        </span> <span class="text-muted text-xs block">@Company</span> </span> </a>
                     </div>
                     <div class="logo-element">
                        PAN ARAB MEDIA
                     </div>
                  </li>


                  <li>
                     <a href="{{ route('admin.index') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span> <span class="fa arrow"></span></a>
                     <ul class="nav nav-second-level collapse">
                        <li class="active"><a  href="{{ route('admin.index') }}">home</a></li>
                     </ul>
                  </li>

                   <li>
                     <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Sets</span> <span class="fa arrow"></span></a>
                     <ul class="nav nav-second-level collapse">
                        <!-- <li><a href="add-department.html">Add Depatment</a></li> -->
                        <li><a href="{{ route('set.create') }}">Add Set</a></li>
                        <li><a href="{{ route('sets.index') }}">All Sets</a></li>
<!--                         <li><a href="{{ route('sets.active') }}">Activated Sets</a></li>
 -->

                     </ul>
                  </li>


                   <li>
                     <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Movies</span> <span class="fa arrow"></span></a>
                     <ul class="nav nav-second-level collapse">
                        <!-- <li><a href="add-department.html">Add Depatment</a></li> -->
                        <li><a href="{{ route('movie.index') }}">All Movies</a></li>
                        <li><a href="{{ route('movie.create') }}">Add Movie</a></li>
<!--                         <li><a href="{{ route('movie.active') }}">Activated Movies</a></li>
 -->                     </ul>
                  </li>


               </ul>
            </div>
         </nav>