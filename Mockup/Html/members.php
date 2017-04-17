<?php

$customTitle = "Members";

$customHead = "<link rel='stylesheet' href='static/css/members/base.css'/>";

include "includes/header.php"; ?>

<div class="content container">

        <?php
        $otherMembers = '{
    "members": {
        "1": {
          "name":"Clément Chabrier",
          "prom":"EXIA A2",
          "facebook":"www.facebook.com",
          "email":"clement.chabrier@viacesi.fr",
          "avatar":"clementchabrier.jpg",
          "role":"member"
        },
        "2": {
          "name":"Marie Chiaverini",
          "prom":"EXIA A2",
          "facebook":"www.facebook.com",
          "email":"marie.chiaverini@viacesi.fr",
          "avatar":"mariechiaverini.jpg",
          "role":"member"
         }
    }
}';

        $members ='{
  "members": {
    "1": {
      "name":"TngBlt",
      "prom":"EXIA A2",
      "facebook":"www.facebokk.com",
      "email":"tanguy.blochet@viacesi.fr",
      "avatar":"tngblt.jpg",
      "role":"Treasurer"
      },
    "2": {
      "name":"Juncaaa",
      "prom":"EXIA A2",
      "facebook":"www.facebook.com",
      "email":"romain.junca@viacesi.fr",
      "avatar":"juncaaa.jpg",
      "role":"President"
      },
      "3": {
      "name":"Epickiwi",
      "prom":"EXIA A2",
      "facebook":"www.facebook.com",
      "email":"baptiste.saclier@viacesi.fr",
      "avatar":"epickiwi.jpg",
      "role":"Secretary"
      },
       "4": {
      "name":"Paul Manuel",
      "prom":"EI A2",
      "facebook":"www.facebook.com",
      "email":"paul.manuel@viacesi.fr",
      "avatar":"paulmanuel.jpg",
      "role":"Event planner"
      }
  }
}';

    ?>
        <div class="content-title">
            <h2>Student Union Team</h2>
        </div>

        <div class="row members">
            <?php
            $membersJSON = json_decode($members);

             foreach ($membersJSON->members as $member):

            ?>
            <a href="<?php echo $member->name ?>">
            <div class="col-lg-4 widgets">
                <div class="widget widget-primary member">
                    <?php if (isset($member->avatar)): ?>
                    <div class="member-avatar">
                        <img src="/static/img/members/<?php echo $member->avatar?>" alt="member-avatar" width="65%">
                    </div>
                    <?php endif; ?>
                    <div class="member-info">
                        <p class="member-name"><?php echo $member->name; ?></p>
                        <p class="member-role"><?php echo $member->role; ?></p>
                        <p class="member-class"><?php echo $member->prom; ?></p>
                    </div>
                    <div class="member-icons">
                        <a href="mailto:<?php echo $member->email ?>"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                        <a href="<?php echo $member->facebook ?>" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-user" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </a>
            <?php endforeach; ?>
        </div>
    <div class="content-title other-members-title">
        <h2>Other members</h2>
    </div>

    <div class="row members">
        <?php
        $otherMembersJSON = json_decode($otherMembers);

        foreach ($otherMembersJSON->members as $member):

            ?>
        <a href="<?php echo $member->name ?>">
            <div class="col-lg-4 widgets">
                <div class="widget widget-primary member">
                    <?php if (isset($member->avatar)): ?>
                        <div class="member-avatar">
                            <img src="/static/img/members/<?php echo $member->avatar?>" alt="member-avatar" width="65%">
                        </div>
                    <?php endif; ?>
                    <div class="member-info">
                        <p class="member-name"><?php echo $member->name; ?></p>
                        <p class="member-class"><?php echo $member->prom; ?></p>
                    </div>
                    <div class="member-icons">
                        <a href="mailto:<?php echo $member->email; ?>"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                        <a href="<?php echo $member->facebook; ?>" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-user" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </a>
        <?php endforeach; ?>
    </div>

    <div class="content-title">
</div>


<?php include "includes/footer.php"; ?>
