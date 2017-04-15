<?php
$customTitle = "Calendar of events";

$customHead = "<link rel=\"stylesheet\" type=\"text/css\" href=\"/static/css/articles.css\"/>
<link rel=\"stylesheet\" type=\"text/css\" href=\"/static/css/events.css\"/>";

$customActions = "<li class=\"admin-toolbar-dropdown-item\"><a href=\"#\">Participations</a></li>
                <li class=\"admin-toolbar-dropdown-item\"><a href=\"#\">Idea 1</a></li>
                <li class=\"admin-toolbar-dropdown-item\"><a href=\"#\">Idea 2</a></li>
                <li class=\"admin-toolbar-dropdown-item\"><a href=\"#\">Idea 3</a></li>";

include "includes/header.php"; ?>

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
                            <a href="#">
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

        <div class="widgets-calendar widget">

            <h4 class="widget-title widget-offset">Calendar</h4>
            <div class="calendar-header widget-offset row">
                <a href="#" class="col-2"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                <h5 class="col-8">July 2013</h5>
                <a href="#" class="col-2"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
            <table class="calendar-table">
                <tr class="calendar-days">
                    <td>S</td>
                    <td>M</td>
                    <td>T</td>
                    <td>W</td>
                    <td>Th</td>
                    <td>F</td>
                    <td>S</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>5</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>7</td>
                    <td>8</td>
                    <td>9</td>
                    <td>10</td>
                    <td>11</td>
                    <td>12</td>
                </tr>
                <tr>
                    <td>13</td>
                    <td>14</td>
                    <td>15</td>
                    <td>16</td>
                    <td class="selected">17</td>
                    <td>18</td>
                    <td>19</td>
                </tr>
                <tr>
                    <td>20</td>
                    <td>21</td>
                    <td>22</td>
                    <td>23</td>
                    <td>24</td>
                    <td>25</td>
                    <td>26</td>
                </tr>
                <tr>
                    <td>27</td>
                    <td>28</td>
                    <td>29</td>
                    <td>30</td>
                    <td>31</td>
                    <td></td>
                    <td></td>
                </tr>
            </table>

        </div>

    </aside>

</div>

<?php include "includes/footer.php"; ?>
