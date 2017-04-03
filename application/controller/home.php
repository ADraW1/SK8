<?php

class Home extends Controller
{

  public function index()
  {
    include APP."view/_templates/header.php";
    include APP."view/home/index.php";
    include APP."view/_templates/footer.php";
  }
}

 ?>
