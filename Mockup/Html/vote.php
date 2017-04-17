<?php
$customTitle = "Propositions of events";

$topPadding = true;

$customHead = "<link rel=\"stylesheet\" type=\"text/css\" href=\"/static/css/vote.css\"/>
<link rel=\"stylesheet\" type=\"text/css\" href=\"/static/css/calendar-widget.css\"/>";

include "includes/header.php"; ?>

<h2 class="section-title">Propositions of events</h2>

<div class="votes row">

    <section class="votes-section col-12 col-lg-8">

        <?php for($i = 1; $i<random_int(5,20); $i++){ ?>
        <article class="proposition widget widget-primary">
            <h3 class="proposition-title widget-title widget-offset"><i class="fa fa-calendar-o"></i> My propostion <?= $i ?></h3>
            <div class="propostion-desc">
                <p>Eligendi recusandae sed et quo et. Non repellendus in qui voluptas. Quidem qui qui officiis odio ut.</p>

                <p>Ut quibusdam harum quas vel veniam dolores. Reiciendis et modi et consequatur dicta est. Veritatis veritatis maxime reprehenderit. Velit cum sed voluptatem voluptates. Dolor iusto suscipit distinctio.</p>
            </div>
            <nav class="proposition-toolbar row justify-content-end no-margin-row">
                <div class="proposition-like<?php if(random_int(0,1) == 1){echo ' is-checked'; }?>"><span class="proposition-like-content"><?= random_int(0,150) ?> <i class="fa fa-thumbs-up fa-lg"></i></span>
                    <form class="proposition-like-form widget">
                        <div class="form-group">
                            <label for="vote-date">Preferred date</label>
                            <input type="datetime" name="vote-date" id="vote-date" class="form-control"/>
                            <small class="form-text text-muted">The date you preffer the event takes place</small>
                        </div>
                        <div class="row justify-content-end no-margin-row">
                            <button class="button button-primary">Like this event</button>
                        </div>
                    </form>
                </div>
            </nav>
        </article>
        <?php } ?>

    </section>

    <aside class="widgets col-12 col-lg-4">

        <div class="widget proposition-widget">
            <h4 class="widget-title widget-offset">Add proposition</h4>
            <form>
                <div class="form-group">
                    <label for="prop-name">Name</label>
                    <input type="text" class="form-control" name="prop-name" id="prop-name"/>
                    <small class="text-muted form-text">The name of the future event</small>
                </div>
                <div class="form-group">
                    <label for="prop-desc">Description</label>
                    <textarea name="prop-desc" id="prop-desc" class="form-control"></textarea>
                    <small class="text-muted form-text">A description of the future event</small>
                </div>
                <div class="form-group">
                    <label for="prop-date">Preferred date</label>
                    <input type="datetime" class="form-control" name="prop-date" id="prop-date"/>
                    <small class="text-muted form-text">The date when you preffer to this event tekes place</small>
                </div>
                <div class="row justify-content-end button-row">
                    <button class="col-auto button button-primary">Propose</button>
                </div>
            </form>
        </div>
        
<?php include "includes/calendar-widget.php"; ?>

    </aside>

</div>

<?php include "includes/footer.php"; ?>
