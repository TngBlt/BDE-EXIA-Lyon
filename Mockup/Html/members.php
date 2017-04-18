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
        <h2 class="section-title">Student Union Team</h2>
    </div>

    <div class="row members">
        <?php
        $membersJSON = json_decode($members);

        foreach ($membersJSON->members as $member): ?>
                <div class="col-lg-4 col-md-6 widgets">
                    <div class="widget widget-primary member">
                        <?php if (isset($member->avatar)): ?>
                            <div class="member-avatar">
                                <img src="/static/img/members/<?php echo $member->avatar; ?>" alt="member-avatar" width="65%">
                            </div>
                        <?php endif; ?>
                        <div class="member-info">
                            <p class="member-name"><?php echo $member->name; ?></p>
                            <p class="member-role"><?php echo $member->role; ?></p>
                            <p class="member-class"><?php echo $member->prom; ?></p>
                        </div>
                        <div class="member-icons">
                            <a href="mailto:<?php echo $member->email; ?>"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                            <a href="<?php echo $member->facebook; ?>" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                            <a href="profil.php"><i class="fa fa-user" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
        <?php endforeach; ?>
    </div>


    <div class="content-title other-members-title">
        <h2 class="section-title">Other members</h2>
    </div>

    <div class="row other-members">
        <?php
        $otherMembersJSON = json_decode($otherMembers);

        foreach ($otherMembersJSON->members as $otherMember):?>
                <div class="col-lg-3 col-md-3 col-sm-3 col-3">
                    <div class="others widgets">
                       <div class="widget widget-primary other-member row">
                        <?php if (isset($otherMember->avatar)): ?>
                            <div class="other-member-avatar col-xs-3 col-md-3 col-lg-3">
                                <img src="/static/img/members/<?php echo $otherMember->avatar; ?>" alt="member-avatar">
                            </div>
                        <?php endif; ?>
                        <div class="other-member-info col-xs-4 col-md-4 col-lg-4">
                            <p class="member-name"><?php echo $otherMember->name; ?></p>
                            <p class="member-class"><?php echo $otherMember->prom; ?></p>
                        </div>
                        <div class="other-member-icons col-xs-2 col-md-2 col-lg-2">
                            <a href="mailto:<?php echo $otherMember->email; ?>"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                            <a href="<?php echo $otherMember->facebook; ?>" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                            <a href="profil.php"><i class="fa fa-user" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    </div>
                </div>
        <?php endforeach; ?>
        <?php foreach ($otherMembersJSON->members as $otherMember):?>
        <div class="col-lg-3 col-md-3 col-sm-3 col-3">
            <div class="others widgets">
                <div class="widget widget-primary other-member row">
                    <?php if (isset($otherMember->avatar)): ?>
                        <div class="other-member-avatar col-xs-3 col-md-3 col-lg-3">
                            <img src="/static/img/members/<?php echo $otherMember->avatar; ?>" alt="member-avatar">
                        </div>
                    <?php endif; ?>
                    <div class="other-member-info col-xs-4 col-md-4 col-lg-4">
                        <p class="member-name"><?php echo $otherMember->name; ?></p>
                        <p class="member-class"><?php echo $otherMember->prom; ?></p>
                    </div>
                    <div class="other-member-icons col-xs-2 col-md-2 col-lg-2">
                        <a href="mailto:<?php echo $otherMember->email; ?>"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                        <a href="<?php echo $otherMember->facebook; ?>" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                        <a href="profil.php"><i class="fa fa-user" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
    <?php include "includes/footer.php"; ?>
