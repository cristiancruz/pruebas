 <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><img src="{{asset('public/img/logo2.png')}}" class="logo2"></a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
                <li><a href="{{ route('admin.template.main')}}">Pagina principal</a></li>
                <li class="dropdown" style="float: right;" id="user">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>{{ Auth::user()->name }} <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Configuración</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{ route('admin.auth.logout') }}"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesión</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            
            </ul>

            <!-- /.navbar-top-links -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <form>
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Buscar Menu...">
                                    <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                                </div>
                            </form>
                        </li>

                        <?php $referencias = array(); ?>

                        @foreach($padres as $padres_)

                            <li>
                                 <a href="#"> {{$secciones[$padres_->padre]}}<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                            @foreach($permisos as $permiso)

                                    @if($permiso->reference != $padres_->padre && $permiso->padre == $padres_->padre)
                                        <?php if(!in_array($permiso->reference,$referencias)){
                                                array_push($referencias,$permiso->reference)?>

                                                <li>
                                                    <a href="#">{{$secciones[$permiso->reference]}}<span class="fa arrow"></span></a>
                                                    <ul class="nav nav-third-level">

                                            @foreach($permisos as $permiso_)
                                                @if($permiso->reference == $permiso_->reference)
                                                        <li>
                                                            @if($permiso_->url!=null)
                                                            <a href="{{ route($permiso_->url) }}">{{$permiso_->section}}</a>
                                                            @else
                                                                <a href="#">{{$permiso_->section}}</a>
                                                            @endif
                                                        </li>
                                                @endif
                                            @endforeach
                                                    </ul>
                                                </li>
                                        <?php } ?>
                                    @elseif($permiso->padre == $padres_->padre)
                                            <li>
                                                @if($permiso->url!=null)
                                                    <a href="{{ route($permiso->url) }}">{{$permiso->section}}</a>
                                                    @else
                                                    <a href="#">{{$permiso->section}}</a>
                                                @endif
                                            </li>

                                    @endif


                            @endforeach
                                </ul>
                            </li>

                        @endforeach

                    </ul>
                     <div class="col-lg-12 text-center">
                     </br>
                   		<img src="{{asset('public/img/apps.png')}}" class="logo3"></br>
                      <span class="text-uppercase" style="color:#fff;">Sistemas que impulsan</span></br></br>
                </div>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>