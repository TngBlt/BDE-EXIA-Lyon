<?php
$customTitle = "Calendar of events";

$customHead = "<link rel=\"stylesheet\" type=\"text/css\" href=\"/static/css/articles.css\"/>
<link rel=\"stylesheet\" type=\"text/css\" href=\"/static/css/events.css\"/>
<link rel=\"stylesheet\" type=\"text/css\" href=\"/static/css/calendar-widget.css\"/>";

$customActions = "<li class=\"admin-toolbar-dropdown-item\"><a href=\"#\">Participations</a></li>
                <li class=\"admin-toolbar-dropdown-item\"><a href=\"#\">Idea 1</a></li>
                <li class=\"admin-toolbar-dropdown-item\"><a href=\"#\">Idea 2</a></li>
                <li class=\"admin-toolbar-dropdown-item\"><a href=\"#\">Idea 3</a></li>";

include "includes/header.php"; ?>

<h2 class="section-title">Events</h2>

<nav class="time-travel row">
    <div class="col-6 time-travel-past">
        <a href="#"><i class="fa fa-arrow-left" aria-hidden="true"></i> Past events</a>
    </div>
    <div class="col-6 time-travel-next">
        <a href="#">Next events <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
    </div>
</nav>

<div class="events-section row">

    <section class="events-section col-12 col-lg-8">

        <article class="event">
            <div class="event-background-container">
                <div class="event-background">
                    <img src="/static/img/photo.jpg" alt=""/>
                </div>
                <div class="container-fluid">
                    <div class="event-header row">
                        <h3 class="event-header-title col-11">
                            <a href="/event.php">
                                <span class="event-header-icon">
                                    <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                </span>
                                Title event 1</a>
                        </h3>
                        <a href="#" class="event-header-sharebtn col-1"><i class="fa fa-share" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="event-content row align-items-center justify-content-center">
                        <h4 class="event-content-main col-12">Monday 7 July</h4>
                        <h5 class="event-content-offset col-12">In 3 days</h5>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <nav class="event-footer row">
                    <a href="#" class="event-footer-item event-commentbtn col-4">
                        <div class="event-footer-item-icon"><i class="fa fa-picture-o" aria-hidden="true"></i></div>
                        <div class="event-footer-item-title">5 Pictures</div>
                    </a>
                    <a href="#" class="event-footer-item event-participatebtn col-4">
                        <div class="event-footer-item-icon"><i class="fa fa-check" aria-hidden="true"></i></div>
                        <div class="event-footer-item-title">Participate</div>
                    </a>
                    <a href="#" class="event-footer-item event-morebtn col-4">
                        <div class="event-footer-item-title">More info</div>
                        <div class="event-footer-item-icon"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
                    </a>
                </nav>
            </div>
        </article>

        <article class="event">
            <div class="event-background-container">
                <div class="event-background">
                    <img src="/static/img/stone.jpg" alt=""/>
                </div>
                <div class="container-fluid">
                    <div class="event-header row">
                        <h3 class="event-header-title col-11">
                            <a href="#">
                                <span class="event-header-icon">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                </span>
                                Title event 2</a>
                        </h3>
                        <a href="#" class="event-header-sharebtn col-1"><i class="fa fa-share" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="event-content row align-items-center justify-content-center">
                        <h4 class="event-content-main col-12">Saturday 8 April 15h25</h4>
                        <h5 class="event-content-offset col-12">In 1 Day</h5>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <nav class="event-footer row">
                    <a href="#" class="event-footer-item event-commentbtn col-4">
                        <div class="event-footer-item-icon"><i class="fa fa-picture-o" aria-hidden="true"></i></div>
                        <div class="event-footer-item-title">2 Pictures</div>
                    </a>
                    <a href="#" class="event-footer-item event-participatebtn col-4">
                        <div class="event-footer-item-icon"><i class="fa fa-check" aria-hidden="true"></i></div>
                        <div class="event-footer-item-title">Participate</div>
                    </a>
                    <a href="#" class="event-footer-item event-morebtn col-4">
                        <div class="event-footer-item-title">More info</div>
                        <div class="event-footer-item-icon"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
                    </a>
                </nav>
            </div>
        </article>

    </section>

    <aside class="widgets col-12 col-lg-4">

<?php include "includes/calendar-widget.php"; ?>

        <div class="widget vote-widget">
            <h4 class="widget-title widget-offset">Vote !</h4>
            <p class="widget-offset vote-widget-text">Vote for the next event you want to see in this list !</p>
            <div class="row justify-content-center widget-offset">
                <a href="/vote.php" class="button button-primary col-auto">Vote now</a>
            </div>
        </div>

    </aside>

</div>

<?php include "includes/footer.php"; ?>
