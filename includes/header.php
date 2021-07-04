<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between">
    <a class="navbar-brand" style="margin-left:18px" href="/"><?php echo $config['title']; ?></a>
    <div class="navbar-nav navbar-right" style="margin-right:18px">
      <ul class="nav navbar-nav navbar-right">
        <li class="nav-item">
            <?php if(isset($_SESSION['logged_user'])){
                echo '<a class="nav-link" href="/profile.php">Профиль</a>';
            }else{
                echo '<a class="nav-link" href="/auth.php">Вход</a>';
            }
            ?>
                
            </li>
      </ul>
    </div>

 </nav>
<!--<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between">
    <a class="navbar-brand col-sm-2 text-center" href="/"><?php echo $config['title']; ?></a>
    <input class="form-control form-control-dark w-90 " type="text" placeholder="Поиск" aria-label="Search">
    <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div id="my-nav" class="collapse navbar-collapse">
        <ul class="navbar-nav navbar-right">
            <li class="nav-item">
                <a class="nav-link" href="cart.php">Корзина</a>
            </li>
            <li class="nav-item">
            <?php if(isset($_SESSION['logged_user'])){
                echo '<a class="nav-link" href="/profile.php">Профиль</a>';
            }else{
                echo '<a class="nav-link" href="/auth.php">Вход</a>';
            }
            ?>
                
            </li>
        </ul>
    </div>
</nav>-->
