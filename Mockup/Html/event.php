<?php
$customTitle = "Event";

$customHead = "<link rel=\"stylesheet\" type=\"text/css\" href=\"/static/css/articles.css\"/>
<link rel=\"stylesheet\" type=\"text/css\" href=\"/static/css/events.css\"/>";

$customActions = "<li class=\"admin-toolbar-dropdown-item\"><a href=\"#\">Remove</a></li>
<li class=\"admin-toolbar-dropdown-item\"><a href=\"#\">Edit</a></li>";

$image_dir = "gallery";

include "includes/header.php"; ?>

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
        </article>
        <article class="widget widget-primary">
            <h4 class="widget-title widget-offset">Description</h4>

            <p>Eligendi recusandae sed et quo et. Non repellendus in qui voluptas. Quidem qui qui officiis odio ut.</p>

            <p>Ut quibusdam harum quas vel veniam dolores. Reiciendis et modi et consequatur dicta est. Veritatis veritatis maxime reprehenderit. Velit cum sed voluptatem voluptates. Dolor iusto suscipit distinctio.</p>

            <p>Aspernatur autem et et eum nihil esse consequatur excepturi. Voluptatum quidem nesciunt alias tempora dolorem beatae. Debitis soluta consequuntur ipsa nesciunt blanditiis quaerat quos velit. Quo ad unde enim repellat dolorum. Minima officiis aut veritatis omnis.</p>
        </article>

        <h2 class="section-title">Gallery</h2>

        <?php include "includes/gallery-items.php" ?>

    </section>

    <aside class="widgets col-12 col-lg-4">

        <div class="widgets-participation widget">

            <h4 class="widget-title widget-offset">Participate</h4>

            <form>
                <div class="form-group">
                    <label for="customField1">Custom field 1</label>
                    <input type="text" name="customField1" class="form-control" />
                    <small class="text-muted form-text">Tooltip of the custom field 1</small>
                </div>
                <div class="form-group">
                    <label for="customField2">Custom field 2</label>
                    <input type="text" name="customField2" class="form-control" />
                    <small class="text-muted form-text">Tooltip of the custom field 2</small>
                </div>
                <div class="form-group">
                    <label for="customField3">Custom field</label>
                    <input type="text" name="customField3" class="form-control" />
                    <small class="text-muted form-text">Tooltip of the custom field 3</small>
                </div>
                <button class="button button-primary">Participate</button>
            </form>

        </div>

    </aside>

</div>

<?php include "includes/footer.php"; ?>
