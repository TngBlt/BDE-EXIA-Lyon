<?php

$customTitle = "Members";


include "includes/header.php"; ?>

<div class="content container">

        <?php $members ='{
  "members": {
    "1": {
      "name":"TngBlt",
      "prom":"EXIA A2",
      "facebook":"www.facebokk.com",
      "email":"tanguy.blochet@viacesi.fr",
      "avatar":"tngblt.png"
      },
    "2": {
      "name":"Juncaaa",
      "prom":"EXIA A2",
      "facebook":"www.facebook.com",
      "email":"romain.junca@viacesi.fr",
      "avatar":"juncaaa.jpg"
      },
      "3": {
      "name":"Epickiwi",
      "prom":"EXIA A2",
      "facebook":"www.facebook.com",
      "email":"baptiste.saclier@viacesi.fr",
      "avatar":"epickiwi.jpg"
      },
       "4": {
      "name":"Paul Manuel",
      "class":"EI A2",
      "facebook":"www.facebook.com",
      "email":"paul.manuel@viacesi.fr",
      "avatar":"paulmanuel.jpg"
      }
  }
} ';

    ?>
        <div class="content-title">
            <h2>Student Union Team</h2>
        </div>
    <div class="row">
        <?php
        $membersJSON = json_decode($members);

         foreach ($membersJSON->members as $member):

        ?>

        <div class="col-lg-4 widgets">
            <div class="widget widget-primary">
                <?php if (isset($member->avatar)): ?>
                <div class="member-avatar">
                    <img src="/static/img/members/<?php echo $member->avatar?>" alt="member-avatar" width="65%">
                </div>
                <?php endif; ?>
                <div class="member-info">
                    <p class="member-name"><?php     echo $member->name; ?></p>
                    <p class="member-class"><?php     echo $member->prom; ?></p>
                </div>
                <div class="member-icons">
                    <a href="mailto:<?php $member->email ?>"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                    <a href="<?php $member->facebook ?>" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-user" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="content-title">
        <h2>Other members</h2>
    </div>

</div>


<?php include "includes/footer.php"; ?>
