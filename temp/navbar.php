<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>            
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
            Варианты
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="http://192.168.1.9:88/storage/">Главная</a></li>
            <li><a class="dropdown-item" href="http://192.168.1.9:88/storage/07">07</a></li>
            <li><a class="dropdown-item" href="http://192.168.1.9:88/storage/08">08</a></li>
            <li><a class="dropdown-item" href="http://192.168.1.9:88/storage/09">09</a></li>
            <li><a class="dropdown-item" href="http://192.168.1.9:88/storage/10">10</a></li>               
            </ul>
        </li>            
        </ul>          
    </div>
    <ul class="navbar-nav float-right mb-2 mb-lg-0">
        <li class="nav-item">
        <a class="nav-link btn btn-success text-white" href="#" id="view"tabindex="-1" aria-disabled="true">
            <i class="bi bi-list d-none"></i>
            <i class="bi bi-grid-3x3-gap"></i>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link btn btn-info text-white" href="?exit" id="exit" tabindex="-1" aria-disabled="true"><i class="bi bi-box-arrow-right"></i></a>
        </li>
    </ul>
    </div>
</nav>
<h3 class='text-center' style="margin-top: 65px;">Пользователь - <?= $array->name?></h3>