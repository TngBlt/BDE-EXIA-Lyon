<?php $customTitle = "Baptiste Saclier";
$topPadding = true;

$customHead =  "<link rel=\"stylesheet\" type=\"text/css\" href=\"/static/css/articles.css\"/>
                <link rel=\"stylesheet\" type=\"text/css\" href=\"/static/css/events.css\"/>
                <link rel='stylesheet' href='static/css/profil.css'/>";

include "includes/header.php"; ?>
	
	<section class="col-12 col-lg-10">

        <div class="widget widget-offset">
            <div class="row"> 
                <div class="col-lg-4 profil-image">                                                          
                        <div><img src="static\img\members\Bapt.png" alt="members"/></div>
                </div>

                <div class="col-lg-6">
                    <h2>Saclier Baptiste</h2>
                    <h4>Exia A2</h4>
                    <h5>About :</h5>
                    <p>Et interdum acciderat, ut siquid in penetrali secreto nullo citerioris vitae ministro praesente paterfamilias uxori susurrasset in aurem, velut Amphiarao referente aut Marcio, quondam vatibus inclitis, postridie disceret imperator. ideoque etiam parietes arcanorum soli conscii timebantur.</p>
                    <div class="profil-network">
                    <a href="#" target="_blank"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                    <a href="#" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                    <a href="#" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    <a href="#" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
                    </div>
                </div>

                <div class="col-lg-2">
                    Member of the BDE'staff
                </div>
            </div>
        </div>

    </section>

    <div class="row">
    <section class="col-12 col-md-6">
        <h2 class="section-title">Will participate to</h2>

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
                        <div class="event-footer-item-icon"><i class="fa fa-comment-o" aria-hidden="true"></i></i></div>
                        <div class="event-footer-item-title">Comment</div>
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
    

<section class="col-12 col-md-6">
        <h2 class="section-title">Has participated to</h2>

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
                                Title event 3</a>
                        </h3>
                        <a href="#" class="event-header-sharebtn col-1"><i class="fa fa-share" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="event-content row align-items-center justify-content-center">
                        <h4 class="event-content-main col-12">Saturday 12 March 12h00</h4>
                        <h5 class="event-content-offset col-12">1 month ago</h5>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <nav class="event-footer row">
                    <a href="#" class="event-footer-item event-commentbtn col-4">
                        <div class="event-footer-item-icon"><i class="fa fa-comment-o" aria-hidden="true"></i>
</div>
                        <div class="event-footer-item-title">Comment</div>
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

</div>

<?php include "includes/footer.php"; ?>